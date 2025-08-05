<?php

include('enviarArquivo.php');
?>

<p>
    <a href="logout.php">Sair</a>
</p>

<h1>Lista de arquivos</h1>
<table border="1" cellpadding="10">
    <thead>
        <th></th>
        <th>Arquivo</th>
        <th>Nome</th>
        <th>Data de envio</th>
        <th></th>
       
    </thead>
    <tbody>   
        <?php
        while($arquivo = $sql_query->fetch_assoc()){
        ?>
       <tr>
        <td> <p><?php echo $arquivo['id'];?></p> </td>
        <td><img height="50" src="<?php echo $arquivo['path'];?>" alt=""></td>
        <td> <a target="_blank" href="<?php echo $arquivo['path']; ?>"><?php echo $arquivo['nome'];?></a> </td>
        <td> <?php echo date("d/m/y H:i", strtotime($arquivo['data_upload'])); ?> </td>
        <td><a href="enviarArquivo.php?deletar=<?php echo $arquivo['id'];?>"> <i class="bi bi-trash3-fill"> </i>Deletar</a> </td>
       </tr>
       <?php
        }
        ?>
    </tbody>
</table>
<!----------------------------------------------------------------------------------------------------------------------------------->
 <style>
    .user-avatar {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      background-color: #0d6efd;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      text-transform: uppercase;
    }
    .table td, .table th {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container my-4">
  <h5>Lista de Usuários</h5>
  <table class="table table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Setor</th>
        <th>Data</th>
        <th>Tipo</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $sql = "SELECT * FROM cadastro";
      $cadastro = $conn->query($sql);

      while ($user = $cadastro->fetch_assoc()) {
        // Gerar iniciais do nome
        $nome = $user['nome_login'];
        $iniciais = implode('', array_map(function($n){ return mb_substr($n,0,1); }, explode(' ', $nome)));
        
        // Definir cor da badge por tipo de usuário
        $badgeTipo = ($user['tipo'] == 'admin' || $user['tipo'] == 'gestor') ? 'success' : 'primary';

        // Status fixo como exemplo (ativo)
        $status = 'Ativo';
      ?>

 
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <div class="user-avatar me-2"><?php echo strtoupper($iniciais); ?></div>
            <?php echo $user['nome_login']; ?>
          </div>
        </td>
        <td><?php echo $user['email']; ?></td>
        <td>Exemplo Setor</td>
        <td><?php echo date("d/m/Y", strtotime($user['data'])); ?></td>
        <td>
          <span class="badge bg-<?php echo $badgeTipo; ?>">
            <?php echo ucfirst($user['tipo']); ?>
          </span>
        </td>
        <td>
          <span class="badge bg-success"><?php echo $status; ?></span>
        </td>
        <td>
          <a href="editarUsuario.php?id=<?php echo $user['id_login']; ?>" class="text-decoration-none me-2 text-dark">
            <i class="bi bi-pencil"></i>
          </a>
          <a href="enviarArquivo.php?deletar_usuario=<?php echo $user['id_login']; ?>" class="text-decoration-none text-danger">
            <i class="bi bi-x-circle"></i>
          </a>
        </td>
      </tr>

      <?php } ?>

    </tbody>
  </table>
</div>
  
    <!---------------------------------------------------------------------------------------->
     <!----Tabela do repositorio----->
     <h1>Lista do repositorio</h1>
<?php
 $sql ="SELECT * FROM repositorio"; 
  //$sql.= " where titulo like '%".$_POST['noticiapesquisa']."%' ";
  ?>   
      <table border="1" cellpadding="10">
    <thead>
        <th></th>
        <th>Autoria</th>
        <th>Nome do orientador</th>
        <th>Titulo do artigo</th>
        <th>Palavras-chave</th>
        <th>Data de publicação</th>
        <th>Tema central</th>
        <th>Tipo de produção</th>
        <th  width="15%">Resumo</th>
        <th>Arquivo</th>
        <th>Data</th>
        <th></th>  
    </thead>   
    
   <?php   
      $cadastro  = $conn->query("$sql");
      while($resultset = $cadastro->fetch_array())
          {
    ?>
        <tr>        
        <td> <?php  echo $resultset['Id_user'];?>  </td>
        <td> <?php  echo $resultset['Autoria'];?>  </td>
        <td> <?php  echo $resultset['nomo_orientador'];?>  </td>
        <td> <?php  echo $resultset['titulo_artigo'];?> </td> 
        <td> <?php  echo $resultset['palavras_chaves'];?> </td> 
        <td> <?php  echo  date("d/m/y", strtotime( $resultset['data_Publicação']));?> </td> 
        <td> <?php  echo $resultset['tema_central'];?> </td> 
        <td> <?php  echo $resultset['tipoDeProdução'];?> </td> 
        <td> <?php  echo $resultset['resumo'];?> </td> 
         <td> <a target="_blank" href="<?php echo $resultset['path']; ?>"><?php echo $resultset['path'];?></a> </td>
        <td> <?php  echo date("d/m/y H:i", strtotime( $resultset['data']));?> </td> 
        <td> <td><a href="enviarArquivo.php?deletar_repositorio=<?php echo $resultset['Id_user']; ?>">Deletar</a></td></td>  
      </tr>
      <?php 
         } 
         ?>    
    </table>    
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Icon Grid</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Arquivos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .file-thumb {
      width: 40px;
      height: 40px;
      border-radius: 4px;
      object-fit: cover;
    }
    .table td, .table th {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container my-4">
  <h5>Lista de Arquivos</h5>
  <table class="table table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th></th>
        <th>Nome do Arquivo</th>
        <th>Data de Envio</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>

    <?php
    $sql = "SELECT * FROM arquivos";
    $sql_query = $conn->query($sql);

    while ($arquivo = $sql_query->fetch_assoc()) {
    ?>
      <tr>
        <td><?php echo $arquivo['id']; ?></td>
        <td>
          <a target="_blank" href="<?php echo $arquivo['path']; ?>">
            <img src="<?php echo $arquivo['path']; ?>" class="file-thumb" alt="Arquivo">
            
          </a>
        </td>
        <td>
          <a target="_blank" href="<?php echo $arquivo['path']; ?>" class="text-decoration-none">
            <?php echo $arquivo['nome']; ?>
          </a>
        </td>
        <td><?php echo date("d/m/y H:i", strtotime($arquivo['data_upload'])); ?></td>
        <td>
        </td>
      </tr>
    <?php } ?>

    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php

?>

<div class="alert alert-info mt-3">
    <strong>Armazenamento utilizado:</strong> <?php echo $tamanhoPDFsFormatado; ?> GB de PDFs enviados.
</div>

