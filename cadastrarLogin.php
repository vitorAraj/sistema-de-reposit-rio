<?php
include 'novoconexao.php';

if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome']) && isset($_POST['tipo'])) {

    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // CRIPTOGRAFIA
    $tipo = $conn->real_escape_string($_POST['tipo']); // Pega o tipo de usuário (user/admin)
    
    $sql =  "INSERT INTO cadastro (nome_login, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
    
    if (mysqli_query($conn, $sql)){ 
        $mensagem =  "Cadastrado do usuário realizado com sucesso!";
     
     } else {
       $mensagem =  "Erro ao cadastrar o usuário: " . mysqli_error($conn);
 }mysqli_close($conn);
    
}
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Caso o form seja enviado mas o campo tipo não seja marcado
    $mensagemErro = "Por favor, selecione o tipo de usuário.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastrar usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css\style.css">
  <style>
    html, body {
      height: 100%;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
     
    }

    .form-signin {
      width: 200%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
     
    }

    .form-signin .checkbox {
      font-weight: 400;
      
    }

    .form-signin .form-control {
      margin-bottom: -1px;
      border-radius: 0;
     
    }

    .form-signin .form-control:last-child {
      margin-bottom: 10px;

      border-radius: 10rem 0 .25rem .25rem;
    }

    .form-floating{ 
    margin-bottom: 10px;
}

.form-signin .form-control {
  margin-bottom: -1px;
  border-radius: 0;
  border: 1px solid rgb(158, 158, 158); 
  border-radius: 4px;
}

.bi-send-fill{
    margin: 2px;
    color: #f5f5f5;
}


    .logo {
      width: 72px;
      height: 72px;
      margin-bottom: 20px;
    }

    .form-check-input{
      border: 2px solid black;
    }
      a {
      color:rgb(43, 43, 43);
      text-decoration: none;
    }

    a:hover {
      color: rgb(63, 63, 63);
    }


    .payment-options {
      display: flex;
      justify-content: center;
      gap: 2rem;
     
    }

    .bi-exclamation-circle-fill{
      color:rgb(248, 74, 83);
    }
  </style>
</head>
<body class="text-center">

   <form  action="" method="POST">
<main class="form-signin">
  <img class="mb-4 logo" src="img\logo-removebg-preview.png" >
  <h1 class="h3 mb-3 fw-normal">Cadastro de usuário</h1>

  <?php if (!empty($mensagem)) : ?>
      <div class="alert alert-info">
        <?php echo $mensagem; ?>
      </div>
      <?php elseif (!empty($mensagemErro)) : ?>
  <div class="alert alert-danger text-center"> <i class="bi bi-exclamation-circle-fill"></i>
    <?php echo $mensagemErro; ?>
  </div> 
    <?php endif; ?>

 <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="nome" placeholder="seu nome" required>
      <label for="floatingInput">Nome</label>
    </div>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
      <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Password" required>
      <label for="floatingPassword">Senha</label>
    </div>

    
  <div class="payment-options">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="tipo" id="user" value="user">
      <label class="form-check-label" for="user">
        User
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="tipo" id="admin" value="admin">
      <label class="form-check-label" for="admin">
        Admin
      </label>
    </div>
  </div>


    <div class="checkbox mb-3 mt-2">
      <label>
         <a href="login.php">Voltar</a>
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit"><i class="bi bi-send-fill"></i> Cadastrar</button>
  </form>

</main>

</body>
</html>
