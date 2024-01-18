<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pagamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>

<div class="container mt-5">
    <h2>Adicionar Pagamento</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
        $sql_clientes = "SELECT id, nome FROM financeiro";
        $result_clientes = $conn->query($sql_clientes);

        if ($result_clientes->num_rows > 0) {
            echo '<form action="backend/add_payment.php" method="post">';
            echo '<div class="form-group">';
            echo '<label for="cliente_id">Selecione o Cliente:</label>';
            echo '<select class="form-control" id="cliente_id" name="cliente_id" required>';
            while ($row = $result_clientes->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
            }
            echo '</select>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="valor_pago">Valor Pago:</label>';
            echo '<input type="number" class="form-control" id="valor_pago" name="valor_pago" required>';
            echo '</div>';
            echo '<button type="submit" class="btn btn-primary">Adicionar Pagamento</button>';
            echo '</form>';
        } else {
            echo 'Nenhum cliente cadastrado.';
        }

        $conn->close();
    } else {
        echo 'Método de requisição inválido.';
    }
    ?>
</div>

</body>
</html>
