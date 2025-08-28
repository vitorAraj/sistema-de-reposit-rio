<?php
include('includes/nav.php');
include('enviarArquivo.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM repositorio WHERE Id_user = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $artigo = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Visualizar Artigo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
          background-color:#f8f9fa; 
    }

    nav{
      background-color: #eeeeee;
    }

    .card-artigo {
      display: flex;
      flex-direction: row;
      border-radius: 0.5rem;
      overflow: hidden;
      margin-top: 2rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.4);
    }

    .card-artigo .content {
      padding: 1.5rem;
      background-color:rgba(238, 238, 238, 0.87);
      flex: 1;
    }

    .card-artigo .thumbnail {
      background-color: #343a40;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 200px;
      min-height: 100%;
      text-align: center;
    }

    .text-primary{
      color: #343a40;
    }

    .thumbnail:hover{
      cursor: pointer;
    }

    .blog-sidebar {
      background-color:rgba(238, 238, 238, 0.82);
      padding: 1rem;
      border-radius: 0.25rem;
      margin-bottom: 1rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.6);
    }

    .blog-sidebar h4 {
      font-style: italic;
      border-bottom: 1px solid #dee2e6;
      padding-bottom: 0.5rem;
      margin-bottom: 0.75rem;
    }

    .resumo-section {
  
      padding: 1rem;
      border-radius: 0.25rem;
      margin-bottom: 1rem;
    }

    .resumo-section h3 {
      border-top: 2px solid rgba(13, 109, 253, 0.39); 
      padding-top: 0.75rem;
      margin-top: 0;
    }

    .titulo{
      text-transform: capitalize;
    }
  </style>
</head>
<body>

<div class="container">


  <div class="card-artigo">
    <div class="content">
      <strong class="text-primary"><?php echo $artigo['tipoDeProdução']; ?></strong>
      <h3 class="titulo"><?php echo $artigo['titulo_artigo']; ?></h3>
      <p class="text-muted"><strong>Ano de Publicação:</strong> <?php echo($artigo['data_Publicação']); ?></p>
      <p><strong>Palavras-chave:</strong> <?php echo $artigo['palavras_chaves']; ?></p>
      <a target="_blank" href="<?php echo $artigo['path']; ?>" class="btn btn-primary">Ler Artigo</a>
    </div>
    <div class="thumbnail">
      <a target="_blank" href="<?php echo $artigo['path']; ?>" style="color:white; text-decoration:none;">Arquivo</a>
    </div>
  </div>

  
  <div class="row mt-4">
    
   
    <div class="col-md-8">
      <div class="resumo-section">
        <h3>Resumo</h3>
        <p><?php echo nl2br($artigo['resumo']); ?></p>
      </div>
    </div>

   
    <div class="col-md-4">

      <div class="blog-sidebar">
        <h4>Dados do Autor</h4>
        <p><strong>Autoria:</strong> <?php echo $artigo['Autoria']; ?></p>
        <p><strong>Orientador:</strong> <?php echo $artigo['nomo_orientador']; ?></p>
      </div>

      <div class="blog-sidebar">
        <h4>Tema Central: <?php echo $artigo['tema_central']; ?></h4>
        <h4><?php echo $artigo['tipoDeProdução']; ?></h4>
      </div>

    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    } else { 
      ?>
  <div class="alert alert-danger text-center"> <i class="bi bi-exclamation-circle-fill"></i>
    <?php echo "<p>Artigo não encontrado.</p>"; ?>
      
  <?php  }
} else { ?>
<div class="alert alert-danger text-center"> <i class="bi bi-exclamation-circle-fill"></i>
    <?php echo "<p>ID do artigo não informado.</p>"; ?>
    

    <?php
}
?>