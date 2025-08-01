<?php

include 'novoconexao.php';
session_start();
if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $_POST['senha']; 

        // Busca o usuário apenas pelo e-mail
        $sql_code = "SELECT * FROM cadastro WHERE email = '$email'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        if ($sql_query->num_rows == 1) {
            $cadastro = $sql_query->fetch_assoc();

            if (password_verify($senha, $cadastro['senha'])) {
                $_SESSION['id_login'] = $cadastro['id_login'];
                $_SESSION['nome_login'] = $cadastro['nome_login'];
                $_SESSION['email'] = $cadastro['email'];
                $_SESSION['tipo'] = $cadastro['tipo']; 

               
                if ($cadastro['tipo'] == 'admin') {
                    header('Location: administração.php');
                    exit;
                } else if ($cadastro['tipo'] == 'user') {
                    header('Location: adminUsuario.php');
                    exit;}  
            } else {
                 $mensagem = "Senha incorreta!";
            }
        } else {
             $mensagem = "E-mail não encontrado!";
        }
    }
}
?>
