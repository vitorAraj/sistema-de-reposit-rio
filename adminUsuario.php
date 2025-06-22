<?php 
include('restrita.php');
include('includes\navAdmin.php');
?>


<style>
    .icon-grid a {
      text-decoration: none;
      color: inherit;
      transition: transform 0.2s, color 0.2s;
    }
    .icon-grid a:hover {
        
      color: #0d6efd;
      transform: translateY(-3px);
    }
    .icon-grid i {
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }
  </style>




<div class="container py-5">
  <h3>FERRAMENTAS DE ADMINSTRAÇÃO</h3>
  <hr>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 icon-grid">
    <div class="col text-center">
      <a href="#">
        <i class="bi bi-house-door"></i>
        <h5>Home</h5>
        <p>Paragraph of text beneath the heading to explain the heading.</p>
      </a>
    </div>
    <div class="col text-center">
      <a href="#">
        <i class="bi bi-people"></i>
        <h5>Editar Perfil</h5>
        <p>Paragraph of text beneath the heading to explain the heading.</p>
      </a>
    </div>
    <div class="col text-center">
      <a href="Repositorio.php">
        <i class="bi bi-calendar3"></i>
        <h5>Cadastrar Artigos</h5>
        <p>Paragraph of text beneath the heading to explain the heading.</p>
      </a>
    </div>
    
    <div class="col text-center">
      <a href="#">
        <i class="bi bi-speedometer2"></i>
        <h5>Consutar Artigos</h5>
        <p>Paragraph of text beneath the heading to explain the heading.</p>
      </a>
    </div>
    
    <div class="col text-center">
      <a href="#">
        <i class="bi bi-tools"></i>
        <h5>Sair</h5>
        <p>Paragraph of text beneath the heading to explain the heading.</p>
      </a>
    </div>
  </div>
</div>

