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
    $sql_select = $conn->query("SELECT * FROM repositorio WHERE Id_user='$id'") or die($conn->error);
    $repo = $sql_select->fetch_assoc();

    // Remove o registro do banco
    $deletar_sql = $conn->query("DELETE FROM repositorio WHERE Id_user='$id'") or die($conn->error);

    if ($deletar_sql) {
        $messagemExitRep = "Registro do repositório excluído com sucesso!";
    }
}



  if (isset($_GET['deletar_usuario'])) {
    $id = intval($_GET['deletar_usuario']);
    
    $sql_selec = $conn->query("SELECT * FROM cadastro WHERE id_login='$id'") or die($conn->error);
    $rep = $sql_selec->fetch_assoc();

   
    $deletar_sql = $conn->query("DELETE FROM cadastro WHERE id_login='$id'") or die($conn->error);

    if ($deletar_sql) {
        $messagemExit = "<p>Registro do Usuário excluído com sucesso!</p>";
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

            if( $extansao != 'pdf')
            die("Tipo de arquivo não aceito");

            $path = $pasta . $novoNomeDoArquivo. "." . $extansao;

           $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

           if ($deu_certo) {
                $conn->query("INSERT INTO arquivos (nome, path) VALUES('$nomeDoArquivo', '$path')") or die($conn->error);
                $envio = "<p> <a target=\"_blank\" href=\"arquivos/$novoNomeDoArquivo.$extansao\"> clique aqui para acessá-lo.</a>  </p>";
                
           }
                else
                $envio = "<p> Falha ao enviar arquivo </p>";
    }


    $sql_query = $conn->query("SELECT * FROM arquivos") or die($conn->error);
    ?>
<!------------------------------------------------------------------------------------------------------------------->
<?php
$sql = "SELECT * FROM repositorio"; 
$cadastro = $conn->query($sql);

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

    // Verifica se já existe um artigo com o mesmo título e o mesmo arquivo
    $verifica = $conn->query("SELECT * FROM repositorio WHERE Autoria = '$autoria' AND path = '$path'");
    
    if ($verifica->num_rows > 0) {
        $envio = "Este artigo já está cadastrado no sistema.";
    } else {
        // Inserir novo artigo
        $sql = "INSERT INTO repositorio 
        (Autoria, nomo_orientador, titulo_artigo, palavras_chaves, data_Publicação, tema_central, tipoDeProdução, path, resumo) 
        VALUES 
        ('$autoria', '$nome_orientador', '$tituloArtigo', '$palavras_chave', '$data', '$temaCentral', '$tipoDeProducao', '$path', '$resumo')";

        if (mysqli_query($conn, $sql)) {
            $envio = "Artigo cadastrado com sucesso! Para acessá-lo <a target=\"_blank\" href=\"arquivos/$novoNomeDoArquivo.$extansao\">clique aqui</a>.";
        } else {
            $envio = "Erro ao cadastrar o artigo: " . mysqli_error($conn);
        }
    }
}
?>


<?php
//include('restrita.php');
?>
<!------------------------------------------------------------------------------------------------------------------->
<!----SISTEMA DE BUSCA--->

 <?php
        if (!isset($_GET['busca'])) {
            ?>
        <tr>
     
        </tr>
        <?php
        } else {
            $pesquisa = $conn->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * FROM  repositorio WHERE titulo_artigo LIKE '%$pesquisa%' OR Autoria LIKE '%$pesquisa%' OR tema_central LIKE '%$pesquisa%' OR palavras_chaves LIKE '%$pesquisa%' OR tipoDeProdução LIKE '%$pesquisa%'";
            $sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
         
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                  
                    <?php
                }
            }
            ?>
        <?php
        } ?>

  
<?php

$sql = "SELECT Id_user FROM repositorio";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
   
}

 
?>
