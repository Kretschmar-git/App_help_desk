<?php // Inicia um bloco de código PHP

  // 'require_once' é uma instrução que inclui e executa um arquivo PHP.
  // '_once' garante que o arquivo 'validador_acesso.php' seja incluído apenas UMA VEZ,
  // mesmo que esta instrução seja encontrada outras vezes durante a execução.
  // Este arquivo ('validador_acesso.php') provavelmente contém código que verifica
  // se o usuário está autenticado (logado) na sessão.
  // Se o usuário não estiver logado, o script 'validador_acesso.php' geralmente
  // redireciona o usuário para a página de login e interrompe a execução desta página.
  // Se o arquivo não for encontrado, 'require_once' causa um erro fatal e para o script.
  require_once 'validador_acesso.php';

?> <!-- Fecha o bloco de código PHP e volta para o HTML -->
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" xintegrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="../png/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">Sair</a>
        </li>
      </ul>
    </nav>

    
    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form method="post" action="registra_chamado.php">
                    <div class="form-group">
                      <label>Título</label>
                      <input name="titulo" type="text" class="form-control" placeholder="Título" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Categoria</label>
                      <select name="categoria" class="form-control" required>
                        <option>Criação Usuário</option>
                        <option>Impressora</option>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Rede</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea name="descricao" class="form-control" rows="3" placeholder="Descrição" required></textarea>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-warning btn-block"  href="home.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                      </div>
                    </div>
                    <?php // Inicia um novo bloco de código PHP
                    
                      // O comentário original está correto:
                      // 'isset()' é uma função que verifica se uma variável foi definida e não é NULL.
                      // '$_GET' é uma "superglobal" do PHP que contém dados enviados pela URL (query string).
                      // Exemplo de URL: http://seusite.com/abrir_chamado.php?sucesso=true
                      
                      // Este 'if' verifica DUAS condições usando '&&' (E lógico):
                      // 1. (isset($_GET['sucesso'])): Verifica se o parâmetro 'sucesso' EXISTE na URL.
                      // 2. ($_GET['sucesso'] == 'true'): Verifica se o valor do parâmetro 'sucesso' é
                      //    exatamente igual à string 'true'.
                      // Ambas devem ser verdadeiras para o bloco 'if' ser executado.
                      if(isset($_GET['sucesso']) && $_GET['sucesso'] == 'true') {
                    ?> <!-- Fecha o PHP temporariamente para poder escrever HTML puro -->

                    <!-- Este bloco HTML (a div de alerta) só será renderizado e exibido
                         na página se a condição 'if' acima for verdadeira. -->
                    <div class="alert alert-success mt-5" role="alert">
                      Chamado cadastrado com sucesso!
                    </div>

                    <?php // Reabre o PHP
                    
                      } // Esta chave fecha o bloco 'if' que começou na linha 85.
                      
                    ?> <!-- Fecha o bloco final de PHP -->
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
