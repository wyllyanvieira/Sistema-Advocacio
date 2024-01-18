<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Ninth navbar example">
    <div class="container-xl">
      <a class="navbar-brand" href="#">Sistema Advocaticio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07XL">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastrar Cliente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">PROCURAÇÃO DECLARAÇÃO RENUNCIA E CONTRATO - INDIVIDUAL</a></li>
            <li><a class="dropdown-item" href="#">PROCURAÇÃO DECLARAÇÃO RENUNCIA E CONTRATO - FILHO REPRESENTADO PELO GENITOR</a></li>
            <li><a class="dropdown-item" href="#">PROCURAÇÃO DECLARAÇÃO RENUNCIA E CONTRATO - COM COUNJE</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Controle Financeiro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../gerarfinanceiro.php">Cadastrar pessoa ao financeiro</a></li>
            <li><a class="dropdown-item" href="display_with_payment.php">Controle Financeiro</a></li>
          </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Controle Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gerenciamento de Equipe</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="container mt-5">
    <h2>Clientes Cadastrados</h2>

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
    $sql = "SELECT * FROM financeiro";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-dark"><tr><th>ID</th><th>Nome</th><th>Valor</th><th>A Dever</th><th>Parcelas</th><th>Parcelas Pagas</th><th>Ação</th></tr></thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['valor'] . '</td>';
            echo '<td>' . $row['dever'] . '</td>';
            echo '<td>' . $row['parcelas'] . '</td>';
            echo '<td>' . $row['pagas'] . '</td>';
            echo '<td>';
            echo '<a href="../add_payment_form.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm">Adicionar Pagamento</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    } else {
        echo "Nenhum cliente cadastrado.";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
