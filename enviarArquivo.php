
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
