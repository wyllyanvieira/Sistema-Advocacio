<?php
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

// Dados do formulário
$clienteID = $_POST["clienteID"];
$telefone = $_POST["telefone"];
$valor = $_POST["valor"];
$dataPagamento = $_POST["dataPagamento"];
$NumParcelasPagas = $_POST["NumParcelasPagas"];

// Verificar se o pagamento da parcela anterior já foi efetuado
$parcela_anterior = $NumParcelasPagas - 1;
$sql_verificar_pagamento = "SELECT id FROM financeiro WHERE clienteID = '$clienteID' AND NumParcelasPagas = '$parcela_anterior'";
$result_verificar_pagamento = $conn->query($sql_verificar_pagamento);

if ($result_verificar_pagamento->num_rows > 0) {
    // O pagamento da parcela anterior já foi efetuado, pode adicionar novas informações financeiras
    // Instrução SQL de inserção na tabela financeira
    $sql_financeiro = "INSERT INTO financeiro (clienteID, telefone, valor, dataPagamento, NumParcelasPagas) VALUES ('$clienteID', '$telefone', '$valor', '$dataPagamento', '$NumParcelasPagas')";

    // Executar a instrução SQL
    if ($conn->query($sql_financeiro) === TRUE) {
        echo "Informações financeiras adicionadas com sucesso!";
    } else {
        echo "Erro ao adicionar informações financeiras: " . $conn->error;
    }
} else {
    // O pagamento da parcela anterior não foi efetuado
    echo "Erro: O pagamento da parcela anterior não foi efetuado.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
