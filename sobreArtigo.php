
<?php
include('includes/nav.php');
include('enviarArquivo.php');

?>

  <style>
    body{
      background-color:rgba(247, 247, 247, 0.9);
    }
    
    .col-md-6{
      width: 100%;
      margin-top: 3rem;
    }

    .blog-header {
      padding: 2rem 0;
      border-bottom: 1px solid #e5e5e5;
    }
    .blog-post {
      margin-bottom: 4rem;
    }
    .blog-sidebar {
      padding: 0.40 rem;
      background-color: #f7f7f7;
      border-radius: 0.25rem;
    }
    .thumbnail {
      background-color: #343a40;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }
  </style>
</head>
<body>

<div class="container"> 
  
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Artigo</strong>
          <h3 class="mb-0">Titulo</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">palavras_chaves</p>
          <a href="#" class="stretched-link">Ler Arigo</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <div class="thumbnail px-4" style="width: 200px;">Arquivo</div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
   
      </h3>

      <div class="blog-post">
        <h2 class="blog-post-title">Resumo</h2> 
        <p>This blog post shows a few different types ofdssadsdsad sdsdsd content...</p>
      
      </div>
    </div>

    <div class="col-md-4">
      <div class="blog-sidebar mb-4">
        <h4 class="fst-italic">Dados do autor</h4>
        <p>Autoria </p>
        <p>Orientador</p>
      </div>

      <div class="blog-sidebar">
        <h4 class="fst-italic">Tema central</h4>
        <h4 class="fst-italic">Tipo de produção</h4>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




