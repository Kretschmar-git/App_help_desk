<?php // Inicia um bloco de código PHP

  // 'require_once' inclui o arquivo 'validador_acesso.php'.
  // Este script é executado primeiro e provavelmente verifica se o usuário está logado
  // (autenticado) olhando para a $_SESSION.
  // Se o usuário não estiver logado, o 'validador_acesso.php' deve redirecioná-lo
  // para a página de login e parar a execução deste script.
  require_once 'validador_acesso.php';

?> <!-- Fecha o primeiro bloco PHP -->
<?php // Inicia um segundo bloco de código PHP para lógica de negócios

  // Declara uma variável chamada '$chamados' e a inicializa como um array (lista) vazio.
  // Este array será usado para armazenar todas as linhas (chamados) lidas do arquivo.
  $chamados = array();


  // Define o caminho (localização) do arquivo de texto que armazena os chamados.
  // '../../../' significa "subir três níveis de diretório".
  // Isso é uma boa prática de segurança, sugerindo que o arquivo 'arquivo.hd'
  // está fora da pasta pública do site (acessível pela web).
  $caminho_arquivo = '../../../app_help_desk_P/arquivo.hd'; 

  // 'fopen()' é a função para "abrir um arquivo".
  // Ela recebe o caminho do arquivo ($caminho_arquivo) e o "modo" de abertura.
  // 'r' significa "read" (leitura). O arquivo é aberto apenas para ser lido.
  // A função retorna um "ponteiro" ou "identificador" do arquivo, que é armazenado na variável '$arquivo'.
  $arquivo = fopen($caminho_arquivo, 'r');

  // Inicia um loop 'while' (enquanto).
  // 'feof()' significa "File End-Of-File" (Fim do Arquivo).
  // '!feof($arquivo)' significa "enquanto NÃO (!) for o fim do arquivo ($arquivo)".
  // O loop continuará executando enquanto houver linhas para ler.
  while(!feof($arquivo)) {
    // 'fgets()' significa "File Get String" (Obter String do Arquivo).
    // Esta função lê UMA linha inteira do arquivo (até a quebra de linha)
    // e armazena essa linha (como uma string) na variável '$registro'.
    $registro = fgets($arquivo);
    
    // '$chamados[] = $registro;' é uma forma curta de adicionar um item ao final do array.
    // A linha que acabamos de ler ($registro) é adicionada ao array '$chamados'.
    $chamados[] = $registro; 
  }

  // 'fclose()' fecha o arquivo que foi aberto.
  // É importante fechar os arquivos após o uso para liberar recursos do servidor.
  fclose($arquivo); 

?> <!-- Fecha o segundo bloco PHP -->
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" xintegrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
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

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php // Inicia um bloco PHP dentro do HTML para exibir os chamados
              
                // Inicia um loop 'foreach' para iterar (passar por) cada item no array '$chamados'.
                // Em cada iteração, o item atual (uma linha do arquivo) será
                // colocado na variável '$chamado'.
                foreach ($chamados as $chamado) {
              ?> <!-- Fecha o PHP temporariamente para escrever HTML/PHP misturado -->
                
                <?php // Inicia outro bloco PHP para processar cada chamado individualmente
                
                  // 'explode()' "explode" (divide) uma string em um array, usando um delimitador.
                  // Aqui, ele pega a string '$chamado' (ex: "1|Impressora|Não imprime|...")
                  // e a divide usando o caractere '|' como separador.
                  // O resultado é um array, ex: $chamado_dados[0] = "1", $chamado_dados[1] = "Impressora", ...
                  $chamado_dados = explode('|', $chamado);

                  // Inicia uma verificação de permissão.
                  // '$_SESSION' é uma superglobal que armazena dados da sessão do usuário.
                  // Este 'if' verifica se o 'perfil_id' do usuário logado é '2' (provavelmente "usuário comum").
                  if($_SESSION['perfil_id'] == 2) {
                    // Se for um usuário comum, verifica se o ID do criador do chamado
                    // (armazenado em '$chamado_dados[0]') é DIFERENTE (!=) do ID do usuário logado
                    // (armazenado em '$_SESSION['id']').
                    if($chamado_dados[0] != $_SESSION['id']) {
                      // 'continue;' para imediatamente esta iteração do loop 'foreach'
                      // e pula para o próximo chamado. Isso impede que o chamado
                      // de outro usuário seja exibido para o usuário comum.
                      continue;
                    }
                  } // Fim do 'if' de perfil

                  // Verificação de integridade dos dados.
                  // 'count()' conta o número de elementos no array '$chamado_dados'.
                  // Se houver menos que 3 elementos (ex: uma linha mal formatada ou vazia),
                  // não teremos ID, Título e Categoria para exibir.
                  if(count($chamado_dados) < 3) {
                    // 'continue;' pula esta linha mal formatada e vai para o próximo chamado,
                    // evitando erros de "índice indefinido" (Undefined offset) abaixo.
                    continue;
                  }
                  
                  // Atribui os valores do array '$chamado_dados' a variáveis com nomes mais claros.
                  // (Índice 0 é o ID do usuário, já verificado)
                  $titulo = $chamado_dados[1];    // O segundo item (índice 1) é o Título.
                  $categoria = $chamado_dados[2]; // O terceiro item (índice 2) é a Categoria.
                  $descricao = $chamado_dados[3]; // O quarto item (índice 3) é a Descrição.
                  
                ?> <!-- Fecha o bloco de processamento PHP -->
                
                <!-- O HTML a seguir será repetido para cada chamado que passou pelos filtros -->
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <!-- Imprime o valor da variável $titulo dentro do <h5> -->
                    <h5 class="card-title"><?=$titulo?></h5>
                    <!-- Imprime o valor da variável $categoria dentro do <h6> -->
                    <h6 class="card-subtitle mb-2 text-muted"><?=$categoria?></h6>
                    <!-- Imprime o valor da variável $descricao dentro do <p> -->
                    <p class="card-text"><?=$descricao?></p>
                  </div>
                </div>
                
              <?php // Reabre o PHP
              
                } // Esta chave fecha o loop 'foreach' que começou lá em cima.
                
              ?> <!-- Fecha o bloco PHP -->

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block"  href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>
