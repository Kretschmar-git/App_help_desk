<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" xintegrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
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
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <!-- post é mais seguro que get pois os dados não ficam na url --> 
              <!-- O formulário envia os dados para 'valida_login.php' usando o método 'post' -->
              <form action="valida_login.php" method="post"> 
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                
                <?php // Inicia um bloco de código PHP

                  // Comentário original: isset verifica se uma variável existe e retorna true ou false
                  // '$_GET' é uma superglobal que contém dados enviados pela URL (query string).
                  // 'isset($_GET['login'])' verifica se o parâmetro 'login' existe na URL
                  // (ex: http://.../index.php?login=erro)
                  // '&&' é o operador "E" lógico. Ambas as condições devem ser verdadeiras.
                  // '$_GET['login'] == 'erro'' verifica se o valor do parâmetro 'login' é 'erro'.
                  if(isset($_GET['login']) && $_GET['login'] == 'erro') {
                
                ?> <!-- Fecha o PHP temporariamente para poder escrever HTML puro -->

                  <!-- Este HTML só será exibido se o 'if' acima for verdadeiro -->
                  <div class="alert alert-danger" role="alert">
                    E-mail ou senha incorretos.
                  </div>

                <?php // Reabre o PHP
                
                  } // Fecha a chave do 'if'
                  
                ?> <!-- Fecha o bloco PHP -->

                <?php // Inicia outro bloco de código PHP
                
                  // Comentário original: isset verifica se uma variável existe e retorna true ou false
                  // Esta é uma segunda verificação, similar à primeira.
                  // 'isset($_GET['login'])' verifica se o parâmetro 'login' existe...
                  // '$_GET['login'] == 'erro2'' ...e verifica se o seu valor é 'erro2'.
                  // (ex: http://.../index.php?login=erro2)
                  if(isset($_GET['login']) && $_GET['login'] == 'erro2') {
                
                ?> <!-- Fecha o PHP para escrever HTML -->

                  <!-- Este HTML só será exibido se o 'if' acima for verdadeiro -->
                  <!-- Esta mensagem é provavelmente mostrada quando um usuário não logado
                       tenta acessar uma página protegida e é redirecionado de volta para o login. -->
                  <div class="alert alert-danger" role="alert">
                    Faça login antes de acessar as paginas da aplicação.
                  </div>

                <?php // Reabre o PHP
                
                  } // Fecha a chave do segundo 'if'
                  
                ?> <!-- Fecha o bloco PHP -->
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
