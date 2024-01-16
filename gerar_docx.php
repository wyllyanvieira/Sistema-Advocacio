<?php
require 'vendor/autoload.php'; // Carrega o autoload do Composer

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["name"];
    $estadocivil = $_POST["estadocivil"];
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

    // Carrega o modelo do documento do Word
    $templatePath = 'arquivos/modelos/proadj.docx';
    $templateProcessor = new TemplateProcessor($templatePath);

    // Substitui os marcadores no modelo pelos dados do formulário
    $templateProcessor->setValue('NOME', $nome);
    $templateProcessor->setValue('ESTADOCIVIL', $estadocivil);
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

    // Salva o novo documento gerado
    $templateProcessor->saveAs($outputPath);
    echo "var downloadToast = new bootstrap.Toast(document.getElementById('downloadToast'));";
    echo "downloadToast.show();";


    header('Location: http://localhost/advocateSys/arquivos/downloads/'. $outputFileName .'');
    exit;
}
?>