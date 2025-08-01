<?php
include('includes\navAdminTotal.php');
include 'novoconexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'], $_POST['senha'], $_POST['nome'], $_POST['tipo'])) {
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = $conn->real_escape_string($_POST['tipo']);

    $sql = "INSERT INTO cadastro (nome_login, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";

   // Verificar se email já existe
    $check = $conn->query("SELECT id_login FROM cadastro WHERE email = '$email'");
    if ($check->num_rows > 0) {
        $mensagemErro = "Este e-mail já está cadastrado!";
    } else {
        $sqlInsert = "INSERT INTO cadastro (nome_login, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
        if ($conn->query($sqlInsert)) {
            $mensagem = "Usuário cadastrado com sucesso!";
        } else {
            $mensagemErro = "Erro ao cadastrar: " . $conn->error;
        }
    }
}

?>

  <style>
   
    .card {
      width: 100%;
      max-width: 400px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .form-check-input{
      border: 1px solid #000;
    }
    .avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
    }
    .form-check-input {
      margin-right: 5px;
    }
    a {
      text-decoration: none;
    }

     @media (min-width: 768px) {
      .card{
        margin-left: 40%;
        margin-top: 10%;  
        padding: 20px;
      }
    }

    @media (max-width: 768px) {
      .card {
        margin-left: 3%;
        margin-top: 30%;
      }
      .d-md-block{
        display: hidden;
      }
    }
  </style>


<div class="card p-4">
  <div class="text-center">
    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="avatar" alt="Avatar">
    <h4>Cadastro de Usuário</h4>
    <small class="text-muted">Preencha os campos abaixo para criar sua conta.</small>
  </div>

  <?php if (!empty($mensagem)) : ?>
    <div class="alert alert-success mt-3"><?php echo $mensagem; ?></div>
  <?php elseif (!empty($mensagemErro)) : ?>
    <div class="alert alert-danger mt-3"><?php echo $mensagemErro; ?></div>
  <?php endif; ?>

  <form method="POST" class="mt-3">
    <div class="form-floating mb-2">
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu Nome" required>
      <label for="nome">Nome</label>
    </div>

    <div class="form-floating mb-2">
      <input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com" required>
      <label for="email">Email</label>
    </div>

    <div class="form-floating mb-2">
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
      <label for="senha">Senha</label>
    </div>

    <div class="d-flex justify-content-center mb-3">
      <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="tipo" id="user" value="user">
        <label class="form-check-label" for="user">User</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo" id="admin" value="admin">
        <label class="form-check-label" for="admin">Admin</label>
      </div>
    </div>

    <button class="btn btn-primary w-100" type="submit">Cadastrar</button>

   
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

