<?php

    session_start();
    $_SESSION['x'] = 'teste';

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre><hr>';
    

    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcdef'),
    );
    
    $usuario_autenticado = false;
    

    foreach($usuarios_app as $user){
       echo "Usuario app: {$user['email']} - {$user['senha']}<br/>";
       echo "Usuario form: {$_POST['email']} - {$_POST['senha']}<hr/>";

       if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
       }
    }

    if($usuario_autenticado){
        echo 'usuario autenticado';
    }else{
        header('Location: index.php?login=erro');
    }

    
    
    
?>

