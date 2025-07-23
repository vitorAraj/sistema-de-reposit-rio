<?php
include 'novoconexao.php';
include('restrita.php');


if (!isset($_GET['id'])) {
    die('ID do usuário não informado.');
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM cadastro WHERE id_login = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die('Usuário não encontrado.');
}

$usuario = $result->fetch_assoc();

// Atualiza dados se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $tipo = $conn->real_escape_string($_POST['tipo']);

    if (!empty($_POST['senha'])) {
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $update = "UPDATE cadastro SET nome_login = '$nome', email = '$email', senha = '$senha', tipo = '$tipo' WHERE id_login = $id";
    } else {
        $update = "UPDATE cadastro SET nome_login = '$nome', email = '$email', tipo = '$tipo' WHERE id_login = $id";
    }

    if ($conn->query($update)) {
        header("Location: gerenciaruser.php?editado=1");
        exit;
    } else {
        $erro = "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuário</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card-form {
      background-color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    .avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-primary {
      width: 100%;
      border-radius: 8px;
    }

    .form-check-input {
      margin-top: 7px;
    }

    .form-check-label {
      margin-left: 4px;
    }

    .bi-arrow-clockwise{
      color: #fff
    }

    .btn:hover{
      color:rgb(219, 219, 219);
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="card-form">
  <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="avatar" alt="Avatar">
  <h4>Editar Usuário</h4>
  <small class="text-muted">Atualize os dados abaixo.</small>

  <?php if (isset($erro)) : ?>
    <div class="alert alert-danger mt-3"><?php echo $erro; ?></div>
  <?php endif; ?>

  <form method="POST" class="mt-3">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $usuario['nome_login']; ?>" required>
      <label for="nome">Nome</label>
    </div>

    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com" value="<?php echo $usuario['email']; ?>" required>
      <label for="email">Email</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
      <label for="senha">Nova Senha</label>
      <small class="text-muted">Deixe em branco se não quiser alterar a senha.</small>
    </div>

    <div class="d-flex justify-content-center mb-3">
      <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="tipo" id="user" value="user" <?php if ($usuario['tipo'] === 'user') echo 'checked'; ?>>
        <label class="form-check-label" for="user">User</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo" id="admin" value="admin" <?php if ($usuario['tipo'] === 'admin') echo 'checked'; ?>>
        <label class="form-check-label" for="admin">Admin</label>
      </div>
    </div>

    <button type="submit" class="btn btn-primary"> <i class="bi bi-arrow-clockwise"></i> Salvar Alterações</button>
       <a href="gerenciarUser.php" class="btn">Cancelar</a>
  </form>
</div>

</body>
</html>
