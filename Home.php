<?php
include('enviarArquivo.php');
include('includes\nav.php');
?>

<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="/sistema/css/style.css">

<title>Home</title>




  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .feature-icon {
      width: 4rem;
      height: 4rem;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      background-color: #f8f9fa;
      border-radius: 0.75rem;
      margin-bottom: 1rem;
    }

    body {
      background-color: white;
      color: #000000;
    }
    .jumbotron-custom {
      background-color: #eeeeee;
      padding: 3rem;
      border-radius: 0.5rem;
    }
    .card-custom {
      background-color: #161b22;
      color: #f8f9fa;
      border: none;
    }
    .bordered {
      border: 1px solid #444c56;
    }
    footer {
      padding: 2rem 0;
      border-top: 1px solid #333;
      text-align: center;
      color: #777;
    }

   .logo-img {
  height: 60px;
  width: auto;
}

.feature-icon{
  background-color:rgba(109, 131, 153, 0.14);
}


    a {
      color:#000000;
      text-decoration: none;
    }

    a:hover {
      color: #444c56;
    }


    footer {
      background-color: #2c2c2c;
      color: #fff;
      padding: 40px 0;
      margin-top: 10px;
      
    }

    .footer-title {
      font-weight: bold;
      margin-bottom: 20px;
      position: relative;
      display: inline-block;
    }

    .footer-title::after {
      content: '';
      display: block;
      width: 30px;
      height: 2px;
      background-color: #0d6efd; 
      margin-top: 4px;
    }

    .footer-link, .footer-contact {
      color: #ccc;
      text-decoration: none;
      display: block;
      margin-bottom: 8px;
    }

    .footer-link:hover {
      color: #fff;
    }

    .social-icons a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      margin-right: 10px;
      background-color: #1c1c1c;
      border-radius: 50%;
      color: #fff;
      text-decoration: none;
      transition: 0.3s;
    }

    .social-icons a:hover {
      background-color:rgb(65, 65, 65);
    }

    .bi-instagram,.bi-github,.bi-whatsapp,.bi-facebook{
      color: #fff;
    }

    .bi-instagram a:hover {
      background-color: #000000;
    }

  </style>
</head>
<body>

  <!-- Header -->
  <div class="container py-4">
    <h5><strong><i class="bi bi-book"></i> Leia os artigos produzido pelo seu colégio</strong></h5>
    <hr class="text-secondary" />
  </div>

  <div class="container">
    <div class="jumbotron-custom mb-5">
      <h1 class="display-5 fw-bold">Repositório de Artigos</h1>
      <p class="lead">
       Este site tem como objetivo reunir, organizar e disponibilizar os trabalhos acadêmicos desenvolvidos por nossos alunos, como artigos científicos, 
       TCCs, relatórios de estágio e outros materiais produzidos ao longo da formação.
        É um espaço de valorização do conhecimento, onde os estudantes e professores podem compartilhar suas produções com a comunidade.
      </p>
      <a class="btn btn-primary" href="#">Sabia Mais</a>
    </div>
  </div>

 
  <div class="container mb-5">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card-custom p-4 h-100">
          <h4>TCC</h4>
          <p>
            Swap the background-color utility and add color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.
          </p>

        </div>
      </div>
      <div class="col-md-6">
        <div class="card-custom p-4 h-100 bordered">
          <h4>Relatório de Estágio</h4>
          <p>
            Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.
          </p>
      
        </div>
      </div>
    </div>
  </div>

  <div class="container py-5">
    <h2 class="pb-2 border-bottom">Benefícios do Repositório</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4 pt-4 text-center">
      <div class="col">
        <div class="feature-icon mx-auto">
          <i class="bi bi-file-earmark-richtext"></i>
        </div>
        <h3 class="fs-4 fw-semibold">Valorização do Conhecimento Local</h3>
        <p>Ao reunir produções dos alunos, o site reconhece e divulga o saber construído dentro do Colégio Rui Barbosa, promovendo o protagonismo estudantil.</p>
        
      </div>

      <div class="col">
        <div class="feature-icon mx-auto">
          <i class="bi bi-collection-fill"></i>
        </div>
        <h3 class="fs-4 fw-semibold">Facilita o Acesso à Informação</h3>
        <p>Ao tornar os trabalhos disponíveis online, o site democratiza o acesso ao conteúdo acadêmico, especialmente para aqueles que não têm acesso fácil a bibliotecas físicas.</p>
    
      </div>

      <div class="col">
        <div class="feature-icon mx-auto">
          <i class="bi bi-mortarboard-fill"></i>
        </div>
        <h3 class="fs-4 fw-semibold">Preserva a Memória Institucional</h3>
        <p>Os trabalhos registrados ficam como parte da história acadêmica do colégio, servindo como acervo que pode ser consultado por gerações futuras.</p>
       
      </div>
    </div>
  </div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container my-5">
  <h4>Artigos Publicados</h4>

  <ul class="list-group list-group-flush">
      <?php while($arquivo = $sql_query->fetch_assoc()){
        ?> 

      <li class="list-group-item"> <i class="bi bi-file-earmark-text me-2"></i>  <a href="sobreArtigo.php"><?php echo $arquivo['nome'];?> </a> </li>
    </li>
<?php  }?>

  </ul>
</div>
  


<footer>
    <div class="container">
      <div class="row text-start text-md-left">
        <div class="col-md-4 mb-4">
          <h5 class="footer-title">Páginas</h5>
       
        </div>
        <div class="col-md-4 mb-4">
          <h5 class="footer-title">Contato</h5>
          <span class="footer-contact">75-2332-2323</span>
          <span class="footer-contact">Cerboninal@gmail.com</span>
        </div>
        <div class="col-md-4">
          <h5 class="footer-title">Rede Social</h5>
          <div class="social-icons mt-2">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-whatsapp"></i></a>
            <a target="_blank" href="https://www.instagram.com/cetirbboninal/"><i class="bi bi-instagram"></i></a>
            <a target="_blank" href="https://github.com/vitorAraj"><i class="bi bi-github"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<main class="flex-shrink-0">
    <div class="container">

    