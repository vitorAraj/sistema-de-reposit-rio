<?php
include('includes\navAdmin.php');
include('autenticar.php');
?>

<style>
  .row{
     width: 80%;
    display: flex;
    align-items: center;
    justify-content: center;
   
  }

  .col-12{
    width: 70%;
  }
  
</style>

<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar dados do usuário
		</h2>
				
		<form autocomplete="off" class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input value="<?php echo$_SESSION['nome']?>" class="form-control" type="text" id="nome" name="nome" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input value="<?php echo $_SESSION['email']?>" class="form-control" type="email" id="email" name="email" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
			</div>

			<div class="mb-3">
				<label class="form-label" for="tipo">Tipo:</label>
				<select class="form-select" name="tipo" id="tipo" required>
					<option value=""></option>


					<option 
					<?php if($dadosUsuario['tipo'] === 'editor') echo 'selected' ?>
					value="editor">Editor</option>
					

					<option 
					<?php if($dadosUsuario['tipo'] === 'admin') echo 'selected' ?>
					value="admin">Administrador</option>


				</select>
			</div>
			
			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


</body>
</html>
