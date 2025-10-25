<?php
  // 'session_start()' inicia ou retoma a sessão.
  // É obrigatório chamar isso antes de tentar acessar
  // qualquer variável global $_SESSION.
  session_start();
  
  // Esta é a verificação de segurança principal.
  // 'isset()' verifica se uma variável foi definida e não é nula.
  // '!isset(...)' significa "se NÃO estiver definida".
  // '||' é o operador lógico "OU".
  
  // A condição completa lê-se:
  // "Se a variável 'autenticado' NÃO existir na sessão
  // OU se a variável 'autenticado' existir MAS o seu valor for diferente de 'SIM'..."
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    
    // 'header()' envia um cabeçalho HTTP de redirecionamento.
    // Se o usuário não estiver autenticado (condição acima for verdadeira),
    // ele é forçado a voltar para 'index.php' (página de login).
    // 'login=erro2' é um parâmetro GET usado pela 'index.php'
    // para exibir a mensagem "Faça login antes de acessar...".
    header('Location: index.php?login=erro2');
  }

?>

