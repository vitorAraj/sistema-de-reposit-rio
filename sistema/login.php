

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Cadastro do Usuário</title>
</head>
<body>

    <main class="main-login">
        <div class="left-login">
            <h1>Login do repositorio <br> anexe seu artigo,TCC e relatorio</h1>
        </div>
       
        <div class="right-login">
            <div class="card-login">
             
                <form action="autenticar.php" method="POST">
                 <div class="text">
                    <h1 class="h1">LOGIN</h1>
                    <div class="input">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="E-mail" required>
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>

                     <input class="btn_login" type="submit" value="Login">

                     <a href="cadastrarLogin.php">Cadastrar</a>
                     </div>
            </form>
            </div>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>


