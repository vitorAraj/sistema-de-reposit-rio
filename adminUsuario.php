<?php 
include('restrita.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gerenciar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
  </style>
</head>
<body>

 
  <button class="toggle-btn" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>


  <div id="sidebar" class="sidebar d-md-block">
    <div>
      <h4 class="sidebar-heading"><i class="bi bi-bar-chart-line"></i> Perfil</h4>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="Home.php" class="nav-link"><i class="bi bi-house-door-fill"></i>Home</a>
        </li>
        <li>
          <a href="adminUsuario.php" class="nav-link"><i class="bi bi-pencil-square"></i> Editar Perfil</a>
        </li>
        <li>
          <a href="sistemaBusca.php" class="nav-link"><i class="bi bi-book"></i> Consultar Artigos</a>
        </li>
        <li>
          <a href="Repositorio.php" class="nav-link"><i class="bi bi-cloud-upload"></i> Cadastrar Artigos</a>
        </li>
        <li>
          <a href="logout.php" class="nav-link"><i class="bi bi-x-circle"></i> Sair</a>
        </li>
      </ul>
    </div>
    <div class="sidebar-footer">
      <hr>
      <div class="profile">
        <i class="bi bi-person-circle"></i>
        <span><?php echo $_SESSION['nome_login']; ?> </span>
      </div>
    </div>
  </div>

  <!-- Conteúdo Principal -->
  <div class="container content" style="margin-left: 260px; padding-top: 20px;">
    <h2>Bem-vindo, <?php echo $_SESSION['nome_login']; ?>!</h2>
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
