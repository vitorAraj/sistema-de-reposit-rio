
<?php

include 'novoconexao.php';

if(isset($_GET['deletar'])) {

            $id = intval($_GET['deletar']);
            $sql_query = $conn->query("SELECT * FROM arquivos WHERE id='$id'") or die($conn->error);
            $arquivo = $sql_query->fetch_assoc();

           if(unlink($arquivo['path'])){
                $deu_certo = $conn->query("DELETE FROM arquivos WHERE id='$id'") or die($conn->error);
                if($deu_certo)
                echo "<p> Arquivo excluido com sucesso</p>";
           }      
        }


        if (isset($_GET['deletar_repositorio'])) {
    $id = intval($_GET['deletar_repositorio']);

    // Primeiro pega o path do arquivo para excluir, se necessário
    $sql_select = $conn->query("SELECT path FROM repositorio WHERE Id_user='$id'") or die($conn->error);
    $repo = $sql_select->fetch_assoc();

    // Remove o registro do banco
    $deletar_sql = $conn->query("DELETE FROM repositorio WHERE Id_user='$id'") or die($conn->error);

    if ($deletar_sql) {
        echo "<p>Registro do repositório excluído com sucesso!</p>";
    }
}




  if (isset($_GET['deletar_usuario'])) {
    $id = intval($_GET['deletar_usuario']);
    
    $sql_selec = $conn->query("SELECT * FROM cadastro WHERE id_login='$id'") or die($conn->error);
    $rep = $sql_selec->fetch_assoc();

   
    $deletar_sql = $conn->query("DELETE FROM cadastro WHERE id_login='$id'") or die($conn->error);

    if ($deletar_sql) {
        echo "<p>Registro do repositório excluído com sucesso!</p>";
    }
}

        
        if(isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
       
        
        if($arquivo['error'])
            die("falha ao eviar arquivo");

            $pasta = "arquivos/";
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $extansao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

            if($extansao != "docx" && $extansao != 'png' && $extansao != 'jpg' && $extansao != 'pdf')
            die("Tipo de arquivo não aceito");

            $path = $pasta . $novoNomeDoArquivo. "." . $extansao;

           $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

           if ($deu_certo) {
                $conn->query("INSERT INTO arquivos (nome, path) VALUES('$nomeDoArquivo', '$path')") or die($conn->error);
                echo "<p>Arquivo enviado com sucesso! para acessá-lo, <a target=\"_blank\" href=\"arquivos/$novoNomeDoArquivo.$extansao\"> clique aqui.</a>  </p>";
                
           }
                else
                echo "<p> Falha ao enviar arquivo </p>";
    }


    $sql_query = $conn->query("SELECT * FROM arquivos") or die($conn->error);
    ?>

<!------------------------------------------------------------------------------------------------------------------->

<?php


// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os dados do formulário
    $autoria = mysqli_real_escape_string($conn, $_POST['nome']);
    $nome_orientador = mysqli_real_escape_string($conn, $_POST['orientador']);
    $tituloArtigo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $palavras_chave = mysqli_real_escape_string($conn, $_POST['palavras_chaves']);
    $data = mysqli_real_escape_string($conn, $_POST['data']);
    $temaCentral = mysqli_real_escape_string($conn, $_POST['tema_central']);
    $tipoDeProducao = mysqli_real_escape_string($conn, $_POST['tipo_producao']);
    $resumo = mysqli_real_escape_string($conn, $_POST['resumo']);
    
    
    
    $sql = "INSERT INTO repositorio (Autoria, nomo_orientador, titulo_artigo, palavras_chaves,data_Publicação, tema_central, tipoDeProdução, path ,resumo)
     VALUES ( '$autoria', '$nome_orientador', '$tituloArtigo', '$palavras_chave','$data', '$temaCentral', '$tipoDeProducao', '$path' ,'$resumo')";

    if (mysqli_query($conn, $sql)) {
        echo "Artigo cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . mysqli_error($conn);
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
}
?>

<?php
include('restrita.php');


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->
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
