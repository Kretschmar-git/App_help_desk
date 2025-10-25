<?php
  // 'require_once' é usado para incluir e executar um arquivo PHP.
  // A diferença entre 'require' e 'include' é que 'require'
  // causará um erro fatal (parando o script) se o arquivo não for encontrado.
  // O '_once' garante que o arquivo seja incluído apenas uma vez,
  // mesmo se for chamado várias vezes.

  // O caminho "../../../app_help_desk_P/valida_login.php" indica que
  // o arquivo de lógica de validação real está localizado três níveis
  // de diretório acima e, em seguida, dentro da pasta 'app_help_desk_P'.
  // Isso é uma prática de segurança (colocar lógica sensível fora da
  // pasta raiz do servidor web, como 'htdocs' ou 'www') para
  // impedir o acesso direto a ele pela URL.
  require_once "../../../app_help_desk_P/valida_login.php";
?>
