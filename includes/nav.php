
<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

  .logo-img {
  height: 75px;
  width: auto;
}

.btn-outline{
margin: 10px;
height: 30px;
padding: 18px;
color:  rgba(56, 56, 56, 0.71);
border: 1px solid rgb(165, 165, 165);
border-radius: 5px;
display: flex;
justify-content: center;
text-decoration: none;
align-items: center;
}
.btn-outline:hover{
  background-color:rgb(230, 230, 230) ;
}


</style>
<title>Artigo</title>

</head>
<body class="d-flex flex-column h-100">
    
<header id="topo" class="border-bottom sticky-top">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="Home.php">
      <img src="img\logoRui.png" alt="Logo" class="logo-img me-2">
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
        <button class="btn-outline" type="submit"><i class="bi bi-search"></i></button>
         <a class="btn-outline" href="/sistema/login.php"><i class="bi bi-box-arrow-in-left"></i> Login</a>
      </form>

     
    </div>
  </div>
</nav>

</header>