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

// Verifica se o ID foi fornecido na URL
if (isset($_GET['id'])) {
    $cliente_id = $_GET['id'];

    // Verifica se o valor devedor é zero
    $sql_check_dever = "SELECT dever FROM financeiro WHERE id = $cliente_id";
    $result_check_dever = $conn->query($sql_check_dever);

    if ($result_check_dever->num_rows > 0) {
        $row = $result_check_dever->fetch_assoc();
        $valor_dever = $row['dever'];

        // Se o valor devedor for zero, realiza a exclusão
        if ($valor_dever == 0) {
            $sql_delete = "DELETE FROM financeiro WHERE id = $cliente_id";

            if ($conn->query($sql_delete) === TRUE) {
                echo "Cliente excluído com sucesso!";
            } else {
                echo "Erro ao excluir o cliente: " . $conn->error;
            }
        } else {
            echo "Não é possível excluir o cliente. O valor devedor não é zero.";
        }
    } else {
        echo "Cliente não encontrado.";
    }
} else {
    echo "ID do cliente não fornecido.";
}

$conn->close();
?>
