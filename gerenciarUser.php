<?php
include('includes/navAdminTotal.php');
include('backGerenciarUser.php');

$mensagem = '';
$mensagemErro = '';

// Cadastro de novo usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['senha'], $_POST['nome'], $_POST['tipo'])) {
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = $conn->real_escape_string($_POST['tipo']);

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

// Consulta total de usuários
$sqlTotal = "SELECT COUNT(*) AS total FROM cadastro";
$resultTotal = $conn->query($sqlTotal);
$totalUsuarios = $resultTotal->fetch_assoc()['total'];

// Filtros de busca
$filtros = [];
if (!empty($_GET['tipo'])) {
    $tipo = $conn->real_escape_string($_GET['tipo']);
    $filtros[] = "tipo = '$tipo'";
}
if (!empty($_GET['data_inicio'])) {
    $data_inicio = $conn->real_escape_string($_GET['data_inicio']);
    $filtros[] = "data >= '$data_inicio'";
}
if (!empty($_GET['busca'])) {
    $busca = $conn->real_escape_string($_GET['busca']);
    $filtros[] = "(nome_login LIKE '%$busca%' OR email LIKE '%$busca%')";
}

$sql = "SELECT * FROM cadastro";
if (count($filtros) > 0) {
    $sql .= " WHERE " . implode(" AND ", $filtros);
}

$cadastro = $conn->query($sql);
?>

  <style>
    body { background-color: #f8f9fa; }
    .container { width: 80%; }
    .card-dashboard {
      border-radius: 10px;
      background: #fff;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    .section-title { font-weight: 600; font-size: 16px; color: #6c757d; }
    .user-avatar {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      background-color: #0d6efd;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      text-transform: uppercase;
    }
    .filtros select, .filtros input { border-radius: 6px; }
    .btn-novo { border-radius: 6px; }
    @media (min-width: 768px) {
      .container { margin-left: 260px; padding: 20px; }
    }
    @media (max-width: 768px) {
      .container { width: 100%; }
    }
    .avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
    }
    .alert-info { padding: 10px; }
  </style>
</head>
<body>

<div class="container my-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Gerenciamento de Usuários</h4>

    <?php if (!empty($envio)) : ?>
      <div class="alert alert-info fade-message" id="mensagem-temporaria">
        <?php echo $envio; ?>
      </div>
      <?php elseif (!empty($messagemExit)) : ?>
  <div class="alert alert-info fade-message" id="mensagem-temporaria">
    <?php echo $messagemExit; ?>
     <?php elseif (!empty($mensagemErro)) : ?>
  <div class="alert alert-danger mt-3" id="mensagem-temporaria">
    <?php echo $mensagemErro; ?>
  </div>

      
  <script>
    setTimeout(function () {
      const msg = document.getElementById('mensagem-temporaria');
      if (msg) {
        msg.style.transition = "opacity 0.5s ease-out";
        msg.style.opacity = 0;
        setTimeout(() => msg.remove(), 1000); // remove o elemento após o fade
      }
    }, 3000); // 5 segundos
  </script>
    <?php endif; ?>

    <button class="btn btn-primary btn-sm btn-novo" data-bs-toggle="modal" data-bs-target="#modalCadastroUsuario">
      <i class="bi bi-person-plus"></i> Novo Usuário
    </button>
  </div>

  <!-- Modal de Cadastro -->
  <div class="modal fade" id="modalCadastroUsuario" tabindex="-1" aria-labelledby="modalCadastroUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" action="" class="p-3">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCadastroUsuarioLabel">Adicionar Novo Usuário</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>

          <div class="card p-4">
            <div class="text-center">
              <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="avatar" alt="Avatar">
              <h4>Cadastro de Usuário</h4>
              <small class="text-muted">Preencha os campos abaixo para criar sua conta.</small>
            </div>

            <?php if (!empty($mensagem)) : ?>
              <div class="alert alert-success mt-3"><?php echo htmlspecialchars($mensagem); ?></div>
            <?php elseif (!empty($mensagemErro)) : ?>
              <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($mensagemErro); ?></div>
            <?php endif; ?>

            <div class="form-floating mb-2">
              <input type="text" class="form-control" id="nome" name="nome" required placeholder="Seu Nome">
              <label for="nome">Nome</label>
            </div>

            <div class="form-floating mb-2">
              <input type="email" class="form-control" id="email" name="email" required placeholder="email@exemplo.com">
              <label for="email">Email</label>
            </div>

            <div class="form-floating mb-2">
              <input type="password" class="form-control" id="senha" name="senha" required placeholder="Senha">
              <label for="senha">Senha</label>
            </div>

            <div class="d-flex justify-content-center mb-3">
              <div class="form-check me-3">
                <input class="form-check-input" type="radio" name="tipo" id="user" value="user" required>
                <label class="form-check-label" for="user">User</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" id="admin" value="admin" required>
                <label class="form-check-label" for="admin">Admin</label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Total de usuários -->
  <div class="mb-4">
    <div class="card card-dashboard p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <div class="section-title">Total de Usuários</div>
          <h5><?php echo $totalUsuarios; ?></h5>
        </div>
        <div class="card-icon">
          <i class="bi bi-people fs-2 text-primary"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Filtros -->
  <div class="mb-4 filtros">
    <form method="GET" class="row g-2">
      <div class="col-md-4">
        <select name="tipo" class="form-select">
          <option value="">Tipo de Usuário</option>
          <option value="admin" <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'admin') echo 'selected'; ?>>Admin</option>
          <option value="user" <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'user') echo 'selected'; ?>>User</option>
        </select>
      </div>
      <div class="col-md-4">
        <input type="date" name="data_inicio" class="form-control" value="<?php echo $_GET['data_inicio'] ?? ''; ?>">
      </div>
      <div class="col-md-4">
        <input type="text" name="busca" class="form-control" placeholder="Buscar por nome ou email..." value="<?php echo $_GET['busca'] ?? ''; ?>">
      </div>
      <div class="col-md-12">
        <button class="btn btn-primary btn-sm btn-novo align-items-center mb-3" type="submit">
          <i class="bi bi-filter"></i> Filtrar
        </button>
      </div>
    </form>
  </div>

  <!-- Tabela -->
  <table class="table table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Data</th>
        <th>Tipo</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($user = $cadastro->fetch_assoc()) :
        $nome = $user['nome_login'];
        $iniciais = implode('', array_map(function ($n) {
          return mb_substr($n, 0, 1);
        }, explode(' ', $nome)));
        $badgeTipo = ($user['tipo'] == 'admin' || $user['tipo'] == 'gestor') ? 'success' : 'primary';
      ?>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <div class="user-avatar me-2"><?php echo strtoupper($iniciais); ?></div>
              <?php echo $user['nome_login']; ?>
            </div>
          </td>
          <td><?php echo $user['email']; ?></td>
          <td>Criptografada</td>
          <td><?php echo date("d/m/Y", strtotime($user['data'])); ?></td>
          <td><span class="badge bg-<?php echo $badgeTipo; ?>"><?php echo ucfirst($user['tipo']); ?></span></td>
          <td>
            <a href="editarUser.php?id=<?php echo $user['id_login']; ?>" class="text-decoration-none me-2 text-dark">
              <i class="bi bi-pencil"></i>
            </a>
            <a href="?deletar_usuario=<?php echo $user['id_login']; ?>" class="text-decoration-none text-danger">
              <i class="bi bi-x-circle"></i>
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
