<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id_login'])) {
    die("
    <!DOCTYPE html>
    <html lang='pt-br' class='h-100'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
        <style>
            body {
                background-color: white;
                color: #000000;
            }
            .jumbotron-custom {
                background-color: #eeeeee;
                padding: 3rem;
                border-radius: 0.5rem;
            }
            .fw-bold {
                padding: 10px;
                background-color: rgba(238, 193, 45, 0.9);
                text-align: center;
                border-radius: 8px;
            }
        </style>
        <title>Não autorizado</title>
    </head>
    <body class='d-flex justify-content-center align-items-center vh-100'>
        <div class='container text-center'>
            <div class='jumbotron-custom mb-5'>
                <h1 class='display-5 fw-bold'>NÃO AUTORIZADO!</h1>
                <p class='lead'>
                    Desculpe, usuário, mas você não tem permissão para acessar esse recurso.
                </p>
                <a class='btn btn-primary' href='Home.php'>Voltar para a página inicial</a>
            </div>
        </div>
    </body>
    </html>
    ");
}

?>
