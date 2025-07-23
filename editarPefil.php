<?php
ob_start();

include('includes/navAdminTotal.php');
include('novoconexao.php');

// Atualizar os dados se o formulário for enviado
if (isset($_POST['atualizar'])) {
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $tipo = $conn->real_escape_string($_POST['tipo']);

    // Atualizar a senha apenas se for preenchida
    if (!empty($_POST['senha'])) {
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $sql = "UPDATE cadastro SET nome_login='$nome', email='$email', senha='$senha', tipo='$tipo' WHERE id_login='{$_SESSION['id_login']}'";
    } else {
        $sql = "UPDATE cadastro SET nome_login='$nome', email='$email', tipo='$tipo' WHERE id_login='{$_SESSION['id_login']}'";
    }

    if ($conn->query($sql) === TRUE) {
        // Atualiza a sessão com os novos dados
        $_SESSION['nome_login'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['tipo'] = $tipo;

        // Redireciona
        header('Location: administração.php');
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

<style>

    body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f8f9fa;
}

.container {
    max-width: 600px;
    width: 100%;
    padding: 20px;
}

article {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
.row {
    width: 80%;
    display: flex;
    align-items: center;
    justify-content: center;
    
}
.col-12 {
    width: 70%;
}

.container{

}
@media (min-width: 768px) {
    .container {
        width: 83%;
        margin-left: 650px;
        padding: 20px;
    }
}
</style>

<div class="container">
    <article class="bg-white">
        <h2 class="text-center">Atualizar dados do Administrador</h2>

        <form autocomplete="off" action="" method="post" id="form-atualizar" name="form-atualizar">
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input value="<?php echo $_SESSION['nome_login'] ?>" class="form-control" type="text" id="nome" name="nome" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">E-mail:</label>
                <input value="<?php echo $_SESSION['email'] ?>" class="form-control" type="email" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="senha">Senha:</label>
                <input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
                <small class="text-muted">Deixe em branco se não quiser alterar a senha.</small>
            </div>

            <div class="mb-3">
                <label class="form-label" for="tipo">Tipo:</label>
                <select class="form-select" name="tipo" id="tipo" required>
                    <option value="editor" <?php if ($_SESSION['tipo'] === 'editor') echo 'selected'; ?>>Editor</option>
                    <option value="admin" <?php if ($_SESSION['tipo'] === 'admin') echo 'selected'; ?>>Administrador</option>
                </select>
            </div>

            <button class="btn btn-primary w-100" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
        </form>
    </article>
</div>


<?php
ob_start();
?>