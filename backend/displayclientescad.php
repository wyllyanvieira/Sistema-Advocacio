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

// Obtém os dados dos clientes do banco de dados
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead><tr><th>N. Contrato</th><th>Nome</th><th>Telefone</th><th>Serviço Contratado</th><th>E-Mail</th><th>Valor do Serviço</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['nome'] . '</td>';
        echo '<td>' . $row['telefone'] . '</td>';
        echo '<td>' . $row['sc'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['vservico'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo "Nenhum cliente cadastrado.";
}

$conn->close();
?>
