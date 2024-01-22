<?php
// Conexão com o banco de dados (substitua as informações conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";;

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $cliente_id = $_POST['cliente_id'];
    $valor_pago = $_POST['valor_pago'];

    // Obtém as informações do cliente
    $sql_cliente = "SELECT * FROM financeiro WHERE id = $cliente_id";
    $result_cliente = $conn->query($sql_cliente);

    if ($result_cliente->num_rows > 0) {
        $row = $result_cliente->fetch_assoc();
        $valor_a_dever = $row['dever'];
        $parcelas = $row['parcelas'];
        $pagas = $row['pagas'];

        // Calcula o novo valor a dever
        $novo_valor_a_dever = $valor_a_dever - $valor_pago;

        // Atualiza o valor a dever na tabela
        $sql_update = "UPDATE financeiro SET dever = $novo_valor_a_dever WHERE id = $cliente_id";
        if ($conn->query($sql_update) === TRUE) {
            // Atualiza o número de parcelas pagas
            $novo_numero_pagas = $pagas + 1;
            $sql_update_pagas = "UPDATE financeiro SET pagas = $novo_numero_pagas WHERE id = $cliente_id";
            $conn->query($sql_update_pagas);

            // Calcula o valor da nova parcela
            $nova_parcela = $novo_valor_a_dever / ($parcelas - $pagas);

            // Atualiza o valor da próxima parcela na tabela
            $sql_update_parcela = "UPDATE financeiro SET valor_parcela = $nova_parcela WHERE id = $cliente_id";
            $conn->query($sql_update_parcela);

            echo "Pagamento adicionado com sucesso!";
        } else {
            echo "Erro ao atualizar o valor a dever: " . $conn->error;
        }
    } else {
        echo "Cliente não encontrado.";
    }
    
}
$conn->close();
?>
