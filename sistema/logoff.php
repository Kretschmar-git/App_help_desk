<?php
    session_start();
    
    //remover indices do array de sessao
    //unset()
    //unset($_SESSION['x']); //para remover o indice apenas se existir

    
    //destruir a variavel de sessao
    //session_destroy();
    session_destroy();
    //forçar um redirecionamento
    header('Location: index.php');

?>
