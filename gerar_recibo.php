<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visualizador de Clientes</title>
    <!-- Inclua o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Lista de Clientes</h2>

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

    // Configuração da paginação
    $registros_por_pagina = 10;
    $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $inicio = ($pagina_atual - 1) * $registros_por_pagina;

    // Consulta para obter os nomes dos clientes com paginação
    $sql_clientes = "SELECT id, nome FROM clientes LIMIT $inicio, $registros_por_pagina";
    $result_clientes = $conn->query($sql_clientes);

    if ($result_clientes->num_rows > 0) {
        echo '<table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>';

        while ($row = $result_clientes->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['nome']}</td></tr>";
        }

        echo '</tbody></table>';

        // Adicionando links de páginação
        $sql_total_registros = "SELECT COUNT(id) as total FROM clientes";
        $result_total_registros = $conn->query($sql_total_registros);
        $total_registros = $result_total_registros->fetch_assoc()['total'];
        $total_paginas = ceil($total_registros / $registros_por_pagina);

        echo '<nav aria-label="Paginação">
                <ul class="pagination">';

        for ($i = 1; $i <= $total_paginas; $i++) {
            echo "<li class='page-item'><a class='page-link' href='sua_pagina.php?pagina=$i'>$i</a></li>";
        }

        echo '</ul></nav>';
    } else {
        echo "Nenhum cliente encontrado.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>

    <h2>Cadastrar Pagamento Recebido</h2>
    <form action="processar_financeiro.php" method="post">
    <div class="mb-3">
            <label for="clienteID" class="form-label">Selecione o Cliente:</label>
            <select class="form-select" name="clienteID" required>
                <?php
                // Conectar novamente para obter os nomes dos clientes
                $conn = new mysqli($servername, $username, $password, $dbname);

                $result_clientes = $conn->query($sql_clientes);

                while ($row = $result_clientes->fetch_assoc()) {
                    echo "<option value=\"{$row['id']}\">{$row['nome']}</option>";
                }

                $conn->close();
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" name="telefone" required>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input type="text" class="form-control" name="valor" required>
        </div>
        <div class="mb-3">
            <label for="dataPagamento" class="form-label">Data de Pagamento:</label>
            <input type="date" class="form-control" name="dataPagamento" required>
        </div>
        <div class="mb-3">
            <label for="NumParcelasPagas" class="form-label">Número de Parcelas:</label>
            <input type="number" class="form-control" name="NumParcelasPagas" required>
        </div>
        <button type="submit" class="btn btn-primary">Adcionar Pagamento Recebido</button>
    </form>
</div>

<!-- Inclua o Bootstrap JS e Popper.js (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



