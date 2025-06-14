
<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="/sistema/css/style.css">
<style>

  .logo-img {
  height: 60px;
  width: auto;
}
</style>
<title>Artigo</title>

</head>
<body class="d-flex flex-column h-100">
    
<header id="topo" class="border-bottom sticky-top">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="Home.php">
      <img src="img/logo-removebg-preview.png" alt="Logo" class="logo-img me-2">
      Artigos
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
       
      </ul>

      <form autocomplete="off" class="d-flex ms-3 me-2" action="sistemaBusca.php" method="">
        <input name="busca" class="form-control me-2" type="search" placeholder="Pesquise aqui"
          name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" >
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>

      <a class="btn btn-outline-secondary" href="/sistema/login.php"><i class="bi bi-box-arrow-in-left"></i> Login</a>
    </div>
  </div>
</nav>

</header>