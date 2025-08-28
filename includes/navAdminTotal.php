<?php 
session_start();
include('restrita.php');

// Se o usuário não estiver logado ou não for admin, redireciona
if (!isset($_SESSION['id_login']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: logout.php'); // ou para uma página de acesso negado
    exit;
}




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administração</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="icon" type="image/png" href="img\guia.png">
  <style>
    body {
      font-size: .875rem;
      background-color: #f8f9fa;
    }

    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 1030;
      padding: 1rem;
      width: 250px;
      background-color: #212529;
      color: #fff;
      transition: transform 0.3s ease;
    }

    .sidebar.hidden {
      transform: translateX(-100%);
    }

    .nav-link {
      color: #ccc;
    }

    .nav-link:hover, .nav-link.active {
      color: #fff;
      background-color: #0d6efd;
    }

    .nav-link i {
      margin-right: 8px;
    }

    .sidebar-heading {
      font-size: 1.2rem;
      color: #f8f9fa;
      margin-bottom: 1rem;
    }

    .sidebar-footer {
      position: absolute;
      bottom: 0;
      width: 90%;
      padding-bottom: 1rem;
    }

    .profile {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .profile img {
      width: 32px;
      height: 32px;
      border-radius: 50%;
    }

    hr {
      border-top: 1px solid #444;
    }

   .toggle-btn {
  background-color: #0d6efd;
  color: white;
  border: none;
  margin-bottom: 10px;
  padding: 8px 12px;
  font-size: 1.2rem;
  position: absolute;
  top: 6px;
  right: 10px; 
  z-index: 1040;
  border-radius: 5px;
  opacity: 0.8;
  transition: opacity 0.3s ease;
}

.icon-grid i {
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

.toggle-btn:hover {
  opacity: 1;
}

    @media (min-width: 768px) {
      .toggle-btn {
        display: none;
      }
      .d-md-block{
        display: hidden;
      }
    }

    @media (max-width: 767.98px) {
      .content {
        margin-left: 0 !important;
      }
    }

    .sidebar{
        color: #f8f9fa;
    }

     .logo-img {
  height: 50px;
  width: auto;
}

.toggle-btn{
    margin-top: 20px;
}


.bi{
    font-size: 18px;
}
  </style>
</head>
<body>

 
  <button class="toggle-btn" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>


  <div id="sidebar" class="sidebar d-md-block">
    <div>
      <strong> <h4 class="sidebar-heading"><img src="img\guia.png" alt="Logo" class="logo-img me-2">Admin</h4></strong>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="administração.php" class="nav-link"><i class="bi bi-house-door-fill"></i>Início</a>
        </li>
        <li>
          <a href="editarPefil.php" class="nav-link"><i class="bi bi-pencil-square"></i>Editar Perfil</a>
        </li>
        <li>
          <a href="cadastrarLogin.php" class="nav-link"><i class="bi bi-person-add"></i>Cadastrar Usuário</a>
        </li>
          <li>
          <a href="gerenciarUser.php" class="nav-link"><i class="bi bi-people"></i>Gerenciar Usuários</a>
        </li>
        <li>
          <a href="repositorioAdmin.php" class="nav-link"><i class="bi bi-journal-arrow-down"></i>Cadastrar Artigos</a>
        </li>
        <li>
          <a href="gerenciarArtigo.php" class="nav-link"><i class="bi bi-book"></i>Gerenciar Artigos</a>
        </li>
        <li>
          <a href="logout.php" class="nav-link"><i class="bi bi-x-circle"></i>Sair</a>
        </li>
      </ul>
    </div>
    <div class="sidebar-footer">
      <hr>
      <div class="profile">
        <i class="bi bi-person-circle"></i>
        <span><?php echo $_SESSION['nome_login'];?></span>
      </div>
    </div>
  </div>

  <script>
    function toggleSidebar() {
      document.getElementById("sidebar").classList.toggle("hidden");
    }

    window.addEventListener('DOMContentLoaded', () => {
    if (window.innerWidth < 768) {
      document.getElementById("sidebar").classList.add("hidden");
    }
      });
  </script>
</body>
</html>
