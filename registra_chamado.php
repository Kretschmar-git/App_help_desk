<?php
session_start();

// 1. VALIDAÇÃO: Verificar se os dados foram enviados e não estão vazios.
if (empty($_POST['titulo']) || empty($_POST['categoria']) || empty($_POST['descricao'])) {
    echo "Todos os campos são obrigatórios.";
    // Redireciona de volta para o formulário após alguns segundos ou exibe um link.
    header('Location: formulario.php?erro=campos_vazios');
    exit(); // Encerra o script para não continuar a execução
}

// 2. TRATAMENTO: Usar o operador '??' como segurança extra e limpar os dados.
//    Trocar o caractere problemático por algo seguro.
$titulo = str_replace('|', '-', $_POST['titulo'] ?? '');
$categoria = str_replace('|', '-', $_POST['categoria'] ?? '');
$descricao = str_replace('|', '-', $_POST['descricao'] ?? '');

// 3. FORMATAÇÃO: Escolher um separador seguro que não existe nos dados.
//    O caractere '|' (pipe) é uma escolha comum.
$text = $_SESSION['id'] . '|' . $titulo . '|' . $categoria . '|' . $descricao . PHP_EOL; // Adiciona quebra de linha no final!

// Caminho para o arquivo (idealmente fora da pasta pública)
$caminho_arquivo = 'arquivo.hd'; 

// 4. MANIPULAÇÃO DE ARQUIVO com tratamento de erro.
$arquivo = fopen($caminho_arquivo, 'a'); // a = append (acrescentar)


if ($arquivo) {
    // Escreve no arquivo
    fwrite($arquivo, $text);
    // Fecha o arquivo
    fclose($arquivo);
    
    // Redireciona para uma página de sucesso
    header('Location: abrir_chamado.php?sucesso=true');
} else {
    echo "Erro: Não foi possível abrir o arquivo para escrita. Verifique as permissões da pasta.";
}

?>