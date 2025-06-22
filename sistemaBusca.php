<?php
include('novoconexao.php');
include('enviarArquivo.php');
include('includes\nav.php');

?>

<body style="texte-align: center;">
<?php
  $sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error); 

if ($sql_query->num_rows == 0) {
    // Nenhum resultado
} else {
    while($dados = $sql_query->fetch_assoc()) {
        // Exibe cada linha
    }
}

$total_resultados = $sql_query->num_rows;

?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .nav-link.active {
      font-weight: bold;
    }
    .busca{
   

    }
    .profile-header {
       background-color: #0d6efd; 
      color: white;
      padding: 1rem;
      border-radius: 0.25rem;
    }
    .update-icon {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: inline-block;
      margin-right: 10px;
      margin-bottom: 3px;
    }

    .resultado{
      padding: 2px;
      border-bottom: 3px solid rgba(255, 255, 255, 0.25);
      color: #fff;
      display: inline-block;
      border-radius: 0px;
      
      
    }

    .text-end{
        padding: 20px;
    }
   
    .bi-window-dock{
      display: flex;
      font-size: 18px;
      margin-top: 7px ;
      color:rgb(255, 255, 255);
      justify-content: center;
      align-items: center;
      
    }
    .alert-danger {
      margin: 6px;
    }
    .bi-emoji-frown-fill{
      color: rgb(248, 74, 83);
    }
    .btn-outline-secondary{
      background-color: #fff;
    
    }
    .btn-outline-secondary:hover{
      color: #fff;
    }
  </style>
</head>
<body>

<div class="container my-4">

  
  <div class="profile-header mb-4">
   <h5>Você procurou por <div class="profile-header resultado"><?php if(isset($_GET['busca'])) echo $_GET['busca']; ?></div>
 e obteve <div class="profile-header resultado"><?php echo $total_resultados; ?></div> resultados</h5>
  </div>

 
  <div class="card mb-4">
    <div class="card-header">
      Buscas
      <div class="busca">
        <form autocomplete="off" class="d-flex ms-3 me-2" action="sistemaBusca.php" method="">
        <input name="busca" class="form-control me-2" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
        
      </form>
      </div>
    </div>

 
        
        <?php
        if (!isset($_GET['busca']) || empty(trim($_GET['busca']))) {
        }else {
            $pesquisa = $conn->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * FROM  repositorio WHERE titulo_artigo LIKE '%$pesquisa%' OR Autoria LIKE '%$pesquisa%' OR tema_central LIKE '%$pesquisa%' OR tema_central LIKE '%$pesquisa%' OR tipoDeProdução LIKE '%$pesquisa%'";
            $sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error); 
          if ($sql_query->num_rows == 0) { ?>
             <div class="alert alert-danger text-center">
                <td colspan="3"><i class="bi bi-emoji-frown-fill"></i> Nenhum resultado encontrado...</td>
          </div>
            <?php
             } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
   <div class="list-group list-group-flush"> 
      <div class="list-group-item"> 
        <span class="update-icon bg-primary"><i class="bi bi-window-dock"></i> </span>
        <strong> <h5><?php echo $dados['titulo_artigo'];?></h3></strong>
       
        <div class="dados">
       <h6><?php echo $dados['tipoDeProdução']; ?></h6> 
        <a target="_blank" class="btn btn-primary" href="<?php echo $dados['path']; ?>">Ler Artigo</a>
        </div>
      </div>
      
    


<?php
        }}}
?>
</div>
    <div class="card-footer text-end">
     
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
