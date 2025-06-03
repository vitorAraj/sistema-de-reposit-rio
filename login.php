<?php
include 'autenticar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <style>
    html, body {
      height: 100%;
      margin: 0;
    }

    body {
      background-color: #212529; /* fundo escuro */
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
    }

    .form-floating {
      margin-bottom: 10px;
    }

    .form-control {
      background-color: #343a40;
      color: #fff;
      border-color: #495057;
    }

    .form-control:focus {
      background-color: #343a40;
      color: #fff;
      border-color: #0d6efd;
      box-shadow: none;
    }

    .bi-send-fill {
      margin: 2px;
      color: #fff;
    }

    .logo {
      width: 72px;
      height: 72px;
      margin-bottom: 10px;
    }

    a {
      color: #adb5bd;
      text-decoration: none;
    }

    a:hover {
      color: #fff;
    }
  </style>
</head>
<body>

  
  <main class="form-signin text-center">
    <form action="" method="POST">
      <img class="mb-4 logo" src="img/logo-removebg-preview.png" alt="Logo" />
      <h1 class="h2 mb-3 fw-normal">Entrar</h1>

   <?php if (!empty($mensagem)) : ?>
  <div class="alert alert-danger text-center">
    <?php echo $mensagem; ?>
  </div> 
<?php endif; ?>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="email" placeholder="seu nome" required>
        <label for="floatingInput">E-mail</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Senha" required>
        <label for="floatingPassword">Senha</label>
      </div>

      <div class="checkbox mb-3 mt-2">
        <label><a href="cadastrarLogin.php">Cadastrar</a></label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">
        <i class="bi bi-send-fill"></i> Entrar
      </button>
    </form>
  </main>

</body>
</html>
