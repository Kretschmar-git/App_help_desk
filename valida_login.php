<?php
////
    session_start();    

    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcdef'),
    );
    
    $usuario_autenticado = false;
    

    foreach($usuarios_app as $user){
       /*
        * $_POST é uma superglobal do PHP que contém os dados enviados para o script
        * através do método HTTP POST.
        * Aqui, estamos comparando o 'email' e a 'senha' do array de usuários
        * com os dados que vieram do formulário de login em index.php.
        */
       if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
       }
    }

    if($usuario_autenticado){
        echo 'usuario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        // Se a autenticação falhar, redireciona o usuário de volta para a página de login.
        // A instrução 'Location' envia um cabeçalho HTTP para o navegador.
        // Estamos adicionando um parâmetro GET na URL (?login=erro) para que a página index.php
        // saiba que ocorreu um erro e possa exibir uma mensagem para o usuário.
        header('Location: index.php?login=erro');
    }
    
?>
