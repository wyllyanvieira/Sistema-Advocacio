<?php
require 'vendor/autoload.php'; // Carrega o autoload do Composer

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados (substitua os valores conforme necessário)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }


    // Obtém os dados do formulário
    $nome = $_POST["name"];
    $estadoCivil = isset($_POST["estadoCivil"]) ? $_POST["estadoCivil"] : "";
    $conjuge = isset($_POST["conjuge"]) ? $_POST["conjuge"] : "";

    if ($estadoCivil == "casado") {
        $mensagem = "Casado com $conjuge";
    } else {
        $mensagem = $estadoCivil;
    }
    $profissao = $_POST["profissao"];
    $identidade = $_POST["identidade"];
    $orgaoemissor = $_POST["orgaoemissor"];
    $CPF = $_POST["CPF"];
    $namep = $_POST["namep"];
    $namem = $_POST["namem"];
    $datanascimento = $_POST["datanascimento"];
    $cidadadenatal = $_POST["cidadadenatal"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $sc = $_POST["sc"];
    $pfinal = $_POST["pfinal"];
    $email = $_POST["email"]; 
    $fpagamento = $_POST["fpagamento"]; 
    $vservico = $_POST["vservico"]; 

    if ($email == NULL) {
        $email = "Não Possue";
    }
     
    // Instrução SQL de inserção
    $sql = "INSERT INTO clientes (nome, estadoCivil, conjuge, mensagem, profissao, identidade, orgaoemissor, CPF, namep, namem, datanascimento, cidadadenatal, endereco, telefone, sc, pfinal, email, fpagamento, vservico) VALUES ('$nome', '$estadoCivil', '$conjuge', '$mensagem', '$profissao', '$identidade', '$orgaoemissor', '$CPF', '$namep', '$namem', '$datanascimento', '$cidadadenatal', '$endereco', '$telefone', '$sc', '$pfinal', '$email', '$fpagamento', '$vservico')";

    // Carrega o modelo do documento do Word
    $templatePath = 'arquivos/modelos/proadj.docx';
    $templateProcessor = new TemplateProcessor($templatePath);

    // Substitui os marcadores no modelo pelos dados do formulário
    $templateProcessor->setValue('NOME', $nome);
    $templateProcessor->setValue('ESTADOCIVIL', $mensagem);
    $templateProcessor->setValue('PROFISSAO', $profissao);
    $templateProcessor->setValue('IDENTIDADE', $identidade);
    $templateProcessor->setValue('ORGAOEMISSOR', $orgaoemissor);
    $templateProcessor->setValue('CPF', $CPF);
    $templateProcessor->setValue('NAMEP', $namep);
    $templateProcessor->setValue('NAMEM', $namem);
    $templateProcessor->setValue('DATANASCIMENTO', $datanascimento);
    $templateProcessor->setValue('CIDADENATAL', $cidadadenatal);
    $templateProcessor->setValue('ENDERECO', $endereco);
    $templateProcessor->setValue('TELEFONE', $telefone);
    $templateProcessor->setValue('EMAIL', $email);
    $templateProcessor->setValue('SERVICOC', $sc);
    $templateProcessor->setValue('PONTOFINAL', $pfinal);
    $templateProcessor->setValue('VALORSERIVICO', $vservico);
    $templateProcessor->setValue('FPAGAMENTO', $fpagamento);
    

    // Gera um nome único para o novo documento
    $outputFileName = 'proc_' . strtolower(str_replace(' ', '_', $nome)) . '.docx';
    $outputPath = 'arquivos/downloads/' . $outputFileName;
    $templateProcessor->saveAs($outputPath);
    // Executar a instrução SQL
if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}
// Verifica se o arquivo existe
if (file_exists($outputPath)) {
    // Define os cabeçalhos para download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($outputPath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($outputPath));

    // Lê e exibe o arquivo
    readfile($outputPath);
    
        } else {
            // Se o arquivo não existir, redirecione ou exiba uma mensagem de erro
            echo "Arquivo não encontrado.";
            // ou redirecione para uma página de erro
            // header("Location: pagina_de_erro.php");
            exit;
        }
     exit;
}
?>