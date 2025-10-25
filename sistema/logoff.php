<?php // Inicia um bloco de código PHP

  // 'session_start()' é essencial.
  // Ela deve ser chamada em qualquer script que manipule sessões.
  // Mesmo para destruir uma sessão, ela precisa ser iniciada primeiro
  // para que o PHP saiba qual sessão destruir (baseado no cookie do navegador).
  session_start();
  
  // --- OPÇÕES DE LIMPEZA DE SESSÃO ---

  // Opção 1: Remover índices específicos (exemplo comentado)
  // 'unset()' remove uma variável ou um índice específico de um array.
  // Se você quisesse, por exemplo, apenas remover a autenticação
  // mas manter um "carrinho de compras" na sessão, você usaria isso.
  // unset($_SESSION['id']); // Remove o ID do usuário da sessão
  // unset($_SESSION['autenticado']); // Remove o status de autenticação

  
  // Opção 2: Destruir toda a sessão (método usado aqui)
  // 'session_destroy()' destrói TODOS os dados associados à sessão atual.
  // O array $_SESSION se torna vazio.
  // Esta é a forma padrão e mais completa de fazer "logoff".
  session_destroy();
  
  // Após a sessão ser destruída, o usuário não está mais autenticado.
  // 'header()' envia um cabeçalho HTTP para o navegador.
  // 'Location: index.php' instrui o navegador a redirecionar
  // imediatamente o usuário para a página 'index.php' (a página de login).
  header('Location: index.php');

?>
