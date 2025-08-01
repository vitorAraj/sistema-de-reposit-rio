<?php 
include('restrita.php');
include('includes/navAdmin.php');
?>

<style>
  .card-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: transform 0.2s;
    text-align: center;
  }

  .card-box:hover {
    transform: translateY(-5px);
  }

  .card-box i {
    font-size: 2rem;
    color: #0d6efd;
    margin-bottom: 10px;
  }

  .dashboard-header {
    margin-bottom: 20px;
  }

  .dashboard-header h2 {
    font-weight: 600;
  }

  .card-box h5 {
    margin-top: 10px;
    font-weight: 600;
  }

  .card-box p {
    font-size: 14px;
    color: #555;
  }
@media (min-width: 768px) {
      .container {
    width: 80%;
    margin-left: 250px; /* Ajuste para sidebar fixa */
    padding: 20px;
  }


    @media (max-width: 767.98px) {
      .container {
        margin-left: 0;
        margin-top: 20%;
        padding: 10px;
      }
    }
  }
</style>

<div class="container py-5">
  <div class="dashboard-header">
    <h2>Bem-vindo, <?php echo $_SESSION['nome_login']; ?>!</h2>
    <p>Esta página oferece acesso limitado às funcionalidades do sistema.</p>
  </div>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <div class="col">
      <div class="card-box">
        <a href="Home.php" style="text-decoration: none; color: inherit;">
          <i class="bi bi-house-door"></i>
          <h5>Home</h5>
          <p>Voltar à página inicial do site.</p>
        </a>
      </div>
    </div>

    <div class="col">
      <div class="card-box">
        <a href="editarPefilUser.php" style="text-decoration: none; color: inherit;">
          <i class="bi bi-person-circle"></i>
          <h5>Editar Perfil</h5>
          <p>Atualize suas informações pessoais.</p>
        </a>
      </div>
    </div>

    <div class="col">
      <div class="card-box">
        <a href="RepositorioUser.php" style="text-decoration: none; color: inherit;">
          <i class="bi bi-upload"></i>
          <h5>Cadastrar Artigos</h5>
          <p>Envie novos artigos para o repositório.</p>
        </a>
      </div>
    </div>

    <div class="col">
      <div class="card-box">
        <a href="logout.php" style="text-decoration: none; color: inherit;">
         <i class="bi bi-box-arrow-right fs-2 text-danger"></i>
          <h5>Sair</h5>
          <p>Encerrar sessão do sistema.</p>
        </a>
      </div>
    </div>
  </div>
</div>