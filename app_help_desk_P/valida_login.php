<?php

session_start();

// Inclui o arquivo que faz a conexão com o banco de dados
require_once 'conexao.php';

// 1. Busca TODOS os usuários do banco de dados e coloca em um array
try {
    $query = "SELECT * FROM usuarios";
    $stmt = $conexao->query($query);
    
    // fetchAll() busca todas as linhas e as coloca em um array chamado $usuarios_db
    $usuarios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Erro ao buscar usuários: ' . $e->getMessage();
    exit();
}

$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(1 => 'Administrador', 2 => 'Usuário');


$email_formulario = $_POST['email'];
$senha_formulario = $_POST['senha'];
$hash_gerada = password_hash($senha_formulario, PASSWORD_DEFAULT);

// 2. Percorre o array de usuários vindo do banco de dados
foreach ($usuarios_db as $user) {
    
    // 3. Compara o email e VERIFICA a senha
    // A única grande diferença é usar password_verify() para a senha, que é a forma segura.
    if ($user['email'] == $email_formulario && password_verify($user['senha'], $hash_gerada)) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
        
        break; // Encontrou o usuário, pode parar o loop
    }
}

// 4. Redireciona com base no resultado da autenticação (exatamente como antes)
if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
    exit();
} else {
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
    exit();
}
?>
