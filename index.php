<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Advocaticio - Inicio</title>
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
            <li><a class="dropdown-item" href="gerarprocuracao.php">PROCURAÇÃO DECLARAÇÃO RENUNCIA E CONTRATO - INDIVIDUAL</a></li>
            <li><a class="dropdown-item" href="gerarprocuracao2.php">PROCURAÇÃO DECLARAÇÃO RENUNCIA E CONTRATO - FILHO REPRESENTADO PELO GENITOR</a></li>
<li><a class="dropdown-item" href="gerarprocuracao3.php">PROCURAÇÃO DECLARAÇÃO RENUNCIA E CONTRATO - INDIVIDUAL ROGO</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Controle Financeiro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="gerarfinanceiro.php">Cadastrar pessoa ao financeiro</a></li>
            <li><a class="dropdown-item" href="backend/display_with_payment.php">Controle Financeiro</a></li>
          </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Controle Clientes (EM DESENVOLVIMENTO)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="backend/senhasinss.php">Gerenciamento de Senhas INSS</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="arquivos/img/undraw_loginart.svg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Bem-Vindo(a) ao Sistema Advocaticio</h1>
        <p class="lead">Nesse sistema voce tem a facilidade de realizar cobranças e emitir contratos e muito mais</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2" href="backend/display_with_payment.php" >Ir ao Financeiro</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4" href="gerarprocuracao.php">Ir a Procuração</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

