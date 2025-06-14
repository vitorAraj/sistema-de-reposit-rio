<?php
include('novoconexao.php');
include('enviarArquivo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/sistema/css/style.css">
    <title>Sistema de Busca</title>
</head>
<body style="texte-align: center;">
    <h1>Lista de Artigo</h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table width="600px" border="1">
        <tr>
            <th>Artigo</th>
            <th>Autoria</th>
            <th>Link</th>
            <th>Tema central</th>
            <th>Data de Publicação</th>

        </tr>
        <?php
        if (!isset($_GET['busca']) || empty(trim($_GET['busca']))) {
            ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $conn->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * FROM  repositorio WHERE titulo_artigo LIKE '%$pesquisa%' OR Autoria LIKE '%$pesquisa%' OR tema_central LIKE '%$pesquisa%' OR data_Publicação LIKE '%$pesquisa%'";
            $sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['titulo_artigo']; ?></td>
                        <td><?php echo $dados['Autoria']; ?></td>
                        <td> <a target="_blank" class="btn btn-primary" href="<?php echo $dados['path']; ?>">Artigo</a></td> 
                        <td><?php echo $dados['tema_central']; ?></td>
                        <td> <?php echo date("d/m/y", strtotime($dados['data_Publicação'])); ?> </td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Social Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .nav-link.active {
      font-weight: bold;
    }
    .busca{
   

    }
    .profile-header {
      background-color: #6f42c1;
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
    }

    .text-end{
        padding: 20px;
    }

  </style>
</head>
<body>

<div class="container my-4">

  
  <div class="profile-header mb-4">
    <h5>Você procurou por * * e obteve * * resultados</h5>
   
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
  /*  while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['titulo_artigo']; ?></td>
                        <td><?php echo $dados['Autoria']; ?></td>
                        <td> <a target="_blank" class="btn btn-primary" href="<?php echo $dados['path']; ?>">Artigo</a></td> 
                        <td><?php echo $dados['tema_central']; ?></td>
                        <td> <?php echo date("d/m/y", strtotime($dados['data_Publicação'])); ?> </td>
                    </tr>
                    <?php
                
  
*/
  ?>


 <?php
   //while($dados = $sql_query->fetch_assoc()) {
    ?>
    <div class="list-group list-group-flush">
      <div class="list-group-item">
        <span class="update-icon bg-primary"></span>
        
        <tr>
        <strong><td><?php echo $dados['titulo_artigo']; ?></td></strong><br>
        </tr>
       Tipo de produção:
        <a target="_blank" class="btn btn-primary" href="<?php echo $dados['path']; ?>">Ler Artigo</a>
      </div>
      
    </div>
    <div class="card-footer text-end">
     
    </div>
  </div>
</div>


<?php

//}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
