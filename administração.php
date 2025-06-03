<?php
include('enviarArquivo.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="/sistema/css/style.css">
    <title>Cadastro de Usuário</title>
    
</head>
<body>

 <h2>Bem vindo à pagina de consulta, <?php echo $_SESSION['nome_login']; ?> </h2>
 <h3>Seu id é <?php echo $_SESSION['id_login']; ?></h3>

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
        <td><a href="enviarArquivo.php?deletar=<?php echo $arquivo['id'];?>">Deletar</a> </td>
       </tr>
       <?php
        }
        ?>
    </tbody>
</table>
<!----------------------------------------------------------------------------------------------------------------------------------->
<!---Tabela de usuarios---->
<h1>Lista de usuarios</h1>
<?php
 $sql ="SELECT * FROM cadastro" ; 
  //$sql.= " where titulo like '%".$_POST['noticiapesquisa']."%' ";
  ?>   
      <table border="1" cellpadding="10">
    <thead>
        <th></th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha crip</th>
        <th>Data de envio</th>
        <th></th>
    </thead>   
   <?php       
  
      $cadastro  = $conn->query("$sql");
      while($resultse = $cadastro->fetch_array())
          {
    ?>
        <tr>        
        <td> <?php  echo $resultse['id_login'];?>  </td>
        <td> <?php  echo $resultse['nome_login'];?>  </td>
        <td> <?php  echo $resultse['email'];?>  </td>
        <td> <?php  echo $resultse['senha'];?> </td> 
        <td> <?php  echo date("d/m/y", strtotime($resultse['data']));?> </td> 
        <td><a href="enviarArquivo.php?deletar_usuario=<?php echo $resultse['id_login'];?>">Deletar</a></td>  
      </tr>

      <?php 
         } 
         ?>    
    </table>    

    <!---------------------------------------------------------------------------------------->
     <!----Tabela do repositorio----->


     <h1>Lista do repositorio</h1>
<?php
 $sql ="SELECT * FROM repositorio" ; 
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
