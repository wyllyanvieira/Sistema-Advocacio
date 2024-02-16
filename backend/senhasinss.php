<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sistema";

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Criar tabela se não existir
$sql = "CREATE TABLE IF NOT EXISTS senhas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
)";
$conn->query($sql);

// Adicionando nova senha
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar'])) {
    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha']; // Atenção: armazenar senhas em texto puro é uma prática insegura!

    $sql = "INSERT INTO senhas (nome, cpf, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $cpf, $senha);
    $stmt->execute();
    $stmt->close();
    header("Location: senhasinss.php"); // Evita reenvio do formulário
    exit();
}

// Removendo uma senha
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remover'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM senhas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: senhasinss.php"); // Evita reenvio do formulário
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Advocaticio</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
            <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastrar Cliente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../gerarprocuracao.php">PROCURAÇÃO DECLARAÇÃO RENUNCIA E CONTRATO - INDIVIDUAL</a></li>
            <li><a class="dropdown-item" href="../gerarprocuracao2.php">PROCURAÇÃO DECLARAÇÃO RENUNCIA E CONTRATO - FILHO REPRESENTADO PELO GENITOR</a></li>
<li><a class="dropdown-item" href="../gerarprocuracao3.php">PROCURAÇÃO DECLARAÇÃO RENUNCIA E CONTRATO - INDIVIDUAL ROGO</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Controle Financeiro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../gerarfinanceiro.php">Cadastrar pessoa ao financeiro</a></li>
            <li><a class="dropdown-item" href="./display_with_payment.php">Controle Financeiro</a></li>
          </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Controle Clientes (EM DESENVOLVIMENTO)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gerenciamento de Senhas INSS</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Gerenciador de Senhas</h2>
    <form action="senhasinss    .php" method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" name="cpf" id="cpf" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="text" class="form-control" name="senha" id="senha" required>
        </div>
        <button type="submit" name="adicionar" class="btn btn-primary">Adicionar</button>
    </form>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Senha</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, nome, cpf, senha FROM senhas";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["nome"]."</td>
                            <td>".$row["cpf"]."</td>
                            <td>".$row["senha"]."</td>
                            <td>
                                <form action='senhasinss.php' method='post'>
                                    <input type='hidden' name='id' value='".$row["id"]."'>
                                    <button type='submit' name='remover' class='btn btn-danger'>Remover</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhuma senha cadastrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>