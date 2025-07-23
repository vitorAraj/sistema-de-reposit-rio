<?php
include 'autenticar.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #212529; /* fundo escuro */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      width: 100%;
      background-color:rgb(216, 215, 215);
      max-width: 400px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
    }
    .form-floating {
      margin-bottom: 10px;
    }
    a {
      text-decoration: none;
    }
    .bi-send-fill {
      margin-right: 5px;
    }
  </style>
</head>
<body>

<div class="card p-4">
  <div class="text-center">
    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="avatar" alt="Avatar">
    <h4>Login</h4>
    <small class="text-muted">Acesse sua conta com seu email e senha.</small>
  </div>

  <?php if (!empty($mensagem)) : ?>
    <div class="alert alert-danger mt-3">
      <i class="bi bi-exclamation-circle-fill"></i> <?php echo $mensagem; ?>
    </div>
  <?php endif; ?>

  <form method="POST" class="mt-3">
    <div class="form-floating mb-2">
      <input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com" required>
      <label for="email">Email</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
      <label for="senha">Senha</label>
    </div>

    <button type="submit" class="btn btn-primary w-100">
      <i class="bi bi-send-fill"></i> Entrar
    </button>

    <div class="mt-3 text-center">
      <small>Esta seção é destinada apenas aos usuários autorizados</small>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
