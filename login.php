<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Pagina de Login </title>
</head>

<body style="background-color: hsl(0, 0%, 96%)">
<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Bem-vindo(a) ao <br />
            <span class="text-primary">Sistema Advocaticio</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
                Sistema Integrado para Negócios Eficientes:
                Gerencie clientes, finanças e equipe de forma simplificada.
                Cadastre clientes, emita procurações e controle finanças, incluindo notas de pagamento.
                Acompanhe anotações, status do cliente e exclua registros.
                Gerencie a equipe adicionando ou removendo funcionários, com controle de login e senhas.
                Uma solução completa para otimizar sua administração.
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
            <form action="login.php" method="post">
              <h1 class="my-2 display-3 fw-bold ls-tight">
                    Entrar  <br />
                </h1>
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3"> Usuario </label>
                  <input type="text" name="username" id="form3Example3" class="form-control" />
                  
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Senha </label>
                  <input type="password" name="password" id="form3Example4" class="form-control" />
                  
                </div>
                <button type="submit" class="btn btn-outline-primary">Entrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2024 Wyllyan Vieira</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="https://github.com/wyllyanvieira">GitHub</a></li>
              <li class="list-inline-item"><a href="https://www.instagram.com/wyllyan.br">Instagram</a></li>
              <li class="list-inline-item"><a href="http://wa.me/65998126608">Suporte</a></li>
            </ul>
          </footer>
</section>
<!-- Section: Design Block -->
</body>

</html>


<?php
// Conexão com o banco de dados (substitua com suas próprias configurações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recuperando dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Proteção contra SQL injection (não é suficiente para ambientes de produção)
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Consulta SQL para verificar o login
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login bem-sucedido
    // Redirecionar para a página desejada
    header("Location: index.php");
    exit(); // Certifique-se de que o script é encerrado após o redirecionamento
} else {
    // Login falhou
    echo "Usuário ou senha incorretos.";
}

$conn->close();
?>

