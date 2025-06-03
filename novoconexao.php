<?php
//Definindo as variaveis com as
// informações de acesso;
$servername = "localhost";
$database = "upload";
$username = "root";
$password = "";


// Criando a conexão com o banco e selecionando a base de dados;

$conn = mysqli_connect($servername, $username, $password, $database);
// checando a conexão
if (!$conn) {
    die("Connection failed: <br>" . mysqli_connect_error());
}
//echo "Connectado com  sucesso <br>";

//fechando a conexão com o banco de dados
//mysqli_close($conn);
?>