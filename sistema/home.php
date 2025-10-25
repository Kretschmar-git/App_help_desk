<?php // Inicia um bloco de código PHP

  // 'require_once' inclui o arquivo 'validador_acesso.php'.
  // Este script é executado primeiro e, como nas outras páginas,
  // provavelmente verifica se o usuário está logado (autenticado) na $_SESSION.
  // Se não estiver, redireciona para a página de login e impede que esta
  // página de menu seja exibida.
  require_once 'validador_acesso.php';

?> <!-- Fecha o bloco de código PHP e passa para o HTML -->
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <!-- Carrega a folha de estilos do Bootstrap para estilização -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" xintegrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      /* Estilo CSS customizado para o card da "home" (menu) */
      .card-home {
        padding: 30px 0 0 0; /* Espaçamento interno (topo) de 30px */
        width: 100%; /* O card ocupa 100% da largura do container pai */
        margin: 0 auto; /* Centraliza o card horizontalmente */
      }
    </style>
  </head>

  <body>

    <!-- Barra de navegação superior, escura (bg-dark) -->
    <nav class="navbar navbar-dark bg-dark">
      <!-- Logo e título do app -->
      <a class="navbar-brand" href="#">
        <img src="../png/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <!-- Lista de navegação alinhada à direita (ml-auto) -->
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
          <!-- Link para "Sair" que leva ao script de logoff -->
          <a class="nav-link" href="logoff.php">Sair</a>
        </li>
      </ul>
    </nav>

    <!-- Container principal do Bootstrap para organizar o conteúdo -->
    <div class="container">    
      <!-- Linha do grid system do Bootstrap -->
      <div class="row">

        <!-- Div que usa o estilo .card-home para aplicar padding e centralização -->
        <div class="card-home">
          <!-- O componente "card" do Bootstrap -->
          <div class="card">
            <!-- Cabeçalho do card -->
            <div class="card-header">
              Menu
            </div>
            <!-- Corpo do card -->
            <div class="card-body">
              <!-- Outra linha do grid, dentro do corpo do card, para os ícones -->
              <div class="row">
                <!-- Coluna 1 (ocupa 6 de 12 colunas, ou seja, 50% da largura) -->
                <!-- 'd-flex' e 'justify-content-center' centralizam o conteúdo (o link/imagem) -->
                <div class="col-6 d-flex justify-content-center">
                  <!-- Link que leva o usuário para a página de abrir chamado -->
                  <a href="abrir_chamado.php">
                    <!-- Imagem-ícone para "Abrir Chamado" -->
                    <img src="../png/formulario_abrir_chamado.png" width="70" height="70">
                  </a>                  
                </div>
                <!-- Coluna 2 (também ocupa 6 de 12 colunas, 50%) -->
                <div class="col-6 d-flex justify-content-center">
                  <!-- Link que leva o usuário para a página de consultar chamado -->
                  <a href="consultar_chamado.php">
                    <!-- Imagem-ícone para "Consultar Chamado" -->
                    <img src="../png/formulario_consultar_chamado.png" width="70" height="70">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
