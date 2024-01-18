<?php
// Conexão com o banco de dados (substitua as informações conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$dever = $_POST['dever'];
$parcelas = $_POST['parcelas'];
$pagas = $_POST['pagas'];

// Insere os dados no banco de dados
$sql = "INSERT INTO financeiro (id, nome, valor, dever, parcelas, pagas) VALUES ('$id','$nome', '$valor', '$dever', '$parcelas', '$pagas')";

if ($conn->query($sql) === TRUE) {
    echo "Cliente cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o cliente: " . $conn->error;
}

$conn->close();
?>
