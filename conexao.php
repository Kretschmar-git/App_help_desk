<?php

// Detalhes da conexão com o banco de dados
$dsn = 'mysql:host=localhost;dbname=DB_help_desk'; // Lembre-se de trocar pelo nome do seu banco
$usuario_db = 'root';
$senha_db = '';

try {
    // Cria uma nova instância do PDO para conectar ao banco de dados
    $conexao = new PDO($dsn, $usuario_db, $senha_db);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
    exit();
}
?>