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
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" >Gerar Procuração</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gerar Recibo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Verificar Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gerenciamento de Equipe</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<main>
        <div class="col-sm p-3 min-vh-100">
        <div class="py-5 text-center container">
            <img class="d-block mx-auto mb-4 " src="arquivos/img/icon.jpeg" alt="" width="57" height="57">
            <h2>Crie uma Procuração</h2>
            <p class="lead">Escreva aqui sua Procuração adjunticia de forma rápida e fácil. Apenas preencha o campo com os dados do cliente, não esqueça nenhum dado ou escreva errado, pois isso pode levar a complicações futuras.</p>
        </div>

        <div class="col container">
            <h4 class="mb-3">Dados do Cliente</h4>
            <form  method="post" action="gerar_docx.php" >
                <div class="row g-3">
                    <div class="col">
                        <label for="name" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="name" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            É necessário um nome válido.
                        </div>
                    </div>

                <div class="row g-3">
                <div class="col-sm-6">
                  <label for="estadocivil" class="form-label">Estado Civil</label>
                  <p></p>
                  <label for="casado">
                      <input type="radio" id="casado" name="estadoCivil" value="casado" onclick="mostrarCampo()"> Casado
                  </label>

                  <label for="solteiro">
                      <input type="radio" id="solteiro" name="estadoCivil" value="solteiro" onclick="mostrarCampo()"> Solteiro
                  </label>

                  <label for="viuvo">
                      <input type="radio" id="viuvo" name="estadoCivil" value="viuvo" onclick="mostrarCampo()"> Viúvo
                  </label>

                  <label for="divorciado">
                      <input type="radio" id="divorciado" name="estadoCivil" value="divorciado" onclick="mostrarCampo()"> Divorciado
                  </label>

                  <div id="campoExtra" style="display:none;">
                      <label for="campoInput">Nome do conje:
                          <input type="text" id="campoInput" class="form-control" name="conjuge" placeholder="" value="" required="">
                      </label>
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="profissao" class="form-label">Profissão</label>
                  <input type="text" class="form-control" name="profissao" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>

                <div class="col-sm-3">
                        <label for="identidade" class="form-label">Identidade</label>
                        <input type="text" class="form-control" name="identidade" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="orgaoemissor" class="form-label">Órgão Emissor</label>
                        <input type="text" class="form-control" name="orgaoemissor" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="text" class="form-control" name="CPF" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                <div class="col">
                  <label for="namep" class="form-label">Nome do Pai</label>
                  <input type="text" class="form-control" name="namep" placeholder="Insira o nome completo" value="" required="">
                  <div class="invalid-feedback">
                        É necessário um nome válido.
                  </div>
                </div>
                <div class="col">
                  <label for="namem" class="form-label">Nome da Mãe</label>
                  <input type="text" class="form-control" name="namem" placeholder="Insira o nome completo" value="" required="">
                  <div class="invalid-feedback">
                        É necessário um nome válido.
                  </div>
                </div>

                <div class="col">
                  <label for="datanascimento" class="form-label">Data de nascimento</label>
                  <div class="input-group has-validation">
                    <input type="date" class="form-control" name="datanascimento" placeholder="Insira em formato de Data dd/mm/aaaa" required="">
                  <div class="invalid-feedback">
                      Your username is required.
                    </div>
                  </div>
                </div>

                <div class="col">
                  <label for="cidadadenatal" class="form-label">Cidade natal </label>
                  <input type="text" class="form-control" name="cidadadenatal" placeholder="Nome da cidade onde nasceu">
                  <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                  </div>
                </div>

                <div class="col-12">
                  <label for="endereco" class="form-label">Endereço</label>
                  <input type="text" class="form-control" name="endereco" placeholder="Digite o endereço completo da pessoa com CEP e outras informações" required="">
                  <div class="invalid-feedback">
                    Por favor, revize as informações e tente novamente.
                  </div>
                </div>

                <div class="col">
                  <label for="telefone" class="form-label">Telefone</label>
                  <input type="text" class="form-control" name="telefone" placeholder="Digite o numero de telefone" required="">
                  <div class="invalid-feedback">
                    Por favor, revize as informações e tente novamente.
                  </div>
                </div>

                <div class="col">
                        <label for="email" class="form-label">Endereço Eletrônico</label>
                        <input type="email" class="form-control" name="email" placeholder="Digite o email " required="">
                        <div class="invalid-feedback">
                            Por favor, revise as informações e tente novamente.
                        </div>
                    </div>
                    <div class="col">
                        <label for="sc" class="form-label">Serviço contratado</label>
                        <input type="text" class="form-control" name="sc" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            É necessário um nome válido.
                        </div>
                    </div>
                    <div class="col">
                        <label for="pfinal" class="form-label">Ponto Final</label>
                        <input type="text" class="form-control" name="pfinal" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            É necessário um nome válido.
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                <div class="col-sm-6">
                  <label for="vservico" class="form-label">Valor do serviço</label>
                  <input type="text" class="form-control" name="vservico" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="fpagamento" class="form-label">Forma de Pagamento</label>
                  <input type="text" class="form-control" name="fpagamento" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>
                <button type="submit" class="btn btn-outline-info">Gerar Documento</button>
            </form>
        </div>

    </main>

          <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2024 Wyllyan Vieira</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="https://github.com/wyllyanvieira">GitHub</a></li>
              <li class="list-inline-item"><a href="https://www.instagram.com/wyllyan.br">Instagram</a></li>
              <li class="list-inline-item"><a href="http://wa.me/65998126608">Suporte</a></li>
            </ul>
          </footer>

        
</body>
<script>
        function mostrarCampo() {
            var campoExtra = document.getElementById("campoExtra");
            var campoInput = document.getElementById("campoInput");

            if (document.getElementById("casado").checked || document.getElementById("divorciado").checked) {
                campoExtra.style.display = "block";
                campoInput.required = true;
            } else {
                campoExtra.style.display = "none";
                campoInput.required = false;
            }
        }
    </script>
</html>


