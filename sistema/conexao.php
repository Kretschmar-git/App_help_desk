<?php // Inicia um bloco de código PHP

// Comentário original: Detalhes da conexão com o banco de dados
// DSN (Data Source Name): É uma string que informa ao PDO qual driver de banco de dados usar
// (mysql), onde o banco está (host=localhost) e qual o nome do banco de dados (dbname=DB_help_desk).
// Você deve alterar 'DB_help_desk' para o nome exato do seu banco de dados.
$dsn = 'mysql:host=localhost;dbname=DB_help_desk';

// Define o nome de usuário para se conectar ao banco de dados.
// 'root' é o usuário administrador padrão em muitas instalações locais (como XAMPP, WAMP, MAMP).
$usuario_db = 'root';

// Define a senha para o usuário do banco de dados.
// Por padrão, o usuário 'root' em instalações locais muitas vezes não tem senha (uma string vazia).
$senha_db = '';

// Inicia um bloco 'try'. O PHP tentará executar o código dentro deste bloco.
// Isso é usado para "tentar" uma operação que pode falhar (como uma conexão de rede).
try {
    // Tenta criar uma nova instância da classe PDO (PHP Data Objects).
    // O 'new PDO(...)' é o comando que efetivamente tenta se conectar ao banco de dados
    // usando o DSN, o usuário e a senha fornecidos.
    // Se a conexão for bem-sucedida, o objeto de conexão é armazenado na variável '$conexao'.
    $conexao = new PDO($dsn, $usuario_db, $senha_db);

    // Configura um atributo na conexão PDO que acabamos de criar.
    // PDO::ATTR_ERRMODE: Define qual modo de relatório de erros queremos.
    // PDO::ERRMODE_EXCEPTION: Diz ao PDO para "lançar exceções" (um tipo de erro especial)
    // sempre que algo der errado (ex: uma consulta SQL inválida). Isso permite
    // que o bloco 'catch' capture esses erros. É a forma recomendada de lidar com erros no PDO.
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// O bloco 'catch (PDOException $e)' só será executado se o bloco 'try' falhar
// e lançar uma exceção do tipo 'PDOException' (ex: senha errada, banco não existe).
// '$e' é uma variável que armazena o objeto da exceção, que contém detalhes sobre o erro.
} catch (PDOException $e) {
    // Exibe (imprime) uma mensagem de erro na tela.
    // '$e->getMessage()' é um método do objeto de exceção que retorna a mensagem
    // específica do erro que ocorreu (ex: "Access denied for user...").
    echo 'Erro de conexão: ' . $e->getMessage();

    // 'exit()' para completamente a execução do script PHP.
    // Isso é importante porque, se a conexão com o banco falhar,
    // o resto do script provavelmente não funcionará e não deve ser executado.
    exit();
}
?> <!-- Fecha o bloco de código PHP -->
