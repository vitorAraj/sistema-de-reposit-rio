<?php
include 'novoconexao.php';

if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome'])) {

    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // CRIPTOGRAFIA
    
    $sql =  "INSERT INTO cadastro (nome_login, email, senha) VALUES ('$nome', '$email', '$senha')";
    


    if (mysqli_query($conn, $sql)) {
        echo "cadastrado do usuário realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . mysqli_error($conn);
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <a href="login.php">Voltar</a>
        <h2>Cadastro de usuário</h2>
        <form action="" method="POST">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>

            <label for="data_publicação">senha:</label>
            <input type="password" id="senha" name="senha" required>

            <input type="submit" value="cadastrar">
            
        </form>
    </div>
    </div>
</body>
</html>
