<?php
include('enviarArquivo.php');
?>


  <style>
    .form-bo {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
    }


    .form-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 900px;
    }

    .form-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }

    .form-control {
      border: 1px solid #ccc;
    }

    .btn-submit {
      background-color: #0d6efd;
      color: #fff;
      width: 100%;
      font-weight: bold;
      border: none;
      padding: 12px;
    }

    .btn-submit:hover {
      opacity: 0.9;
      background-color: #0853c4;
      color: #fff;
    }

    textarea {
      resize: none;
    }

      @media (min-width: 768px) {
      .form-bo{
        margin-left: 240px; /* Largura da sidebar */
        padding: 20px;
      }
    }
  </style>



<div class="form-bo">
  <form class="form-container" action="" method="POST" enctype="multipart/form-data">
     <?php if (!empty($envio)) : ?>
      <div class="alert alert-info">
        <?php echo $envio; ?>
      </div>
    <?php endif; ?>
    <div class="form-title">Cadastro de Artigo Acadêmico</div>
    <div class="row">
      <div class="col-md-6 mb-3">
        
        <label>Autoria</label>
        <input type="text" name="nome" class="form-control" placeholder="Nome do autor" required />
      </div>
      <div class="col-md-6 mb-3">
        <label>Orientador</label>
        <input type="text" name="orientador" class="form-control" placeholder="Nome do orientador" required />
      </div>
      <div class="col-md-6 mb-3">
        <label>Data de Publicação</label>
        <input type="date" name="data" class="form-control" required />
      </div>
      <div class="col-md-6 mb-3">
        <label>Título do Artigo</label>
        <input type="text" name="titulo" class="form-control" placeholder="Ex: A importância da leitura..." required />
      </div>
      <div class="col-md-6 mb-3">
        <label>Palavras-chave</label>
        <input type="text" name="palavras_chaves" class="form-control" placeholder="Ex: educação, leitura, escola" required />
      </div>
      <div class="col-md-6 mb-3">
        <label>Tema Central</label>
        <input type="text" name="tema_central" class="form-control" placeholder="Assunto principal do trabalho" required />
      </div>
      <div class="col-md-6 mb-3">
        <label>Tipo de Produção</label>
        <select class="form-control" name="tipo_producao" required>
          <option value=""></option>
          <option>Artigo Científico</option>
          <option>Relatório de Estágio</option>
          <option>TCC</option>
          <option>Outro</option>
        </select>
      </div>
      <div class="col-md-12 mb-3">
        <label>Resumo</label>
        <span id="maximo" class="badge bg-danger">0</span>
        <textarea id="resumo" class="form-control" name="resumo" rows="5" placeholder="Digite aqui o resumo do trabalho..." maxlength="400" required></textarea>
      </div>

      <div class="mb-3">
  <label for="artigo" class="form-label">Artigo (PDF)</label>
  <input class="form-control" type="file" id="artigo" name="arquivo" accept=".pdf" required> 
</div>
    </div>
    <button type="submit" class="btn btn-submit mt-3">Registrar</button>
  </form>


  <script>
    const MAX_CARACTERES = 400;

    const spanMaximo = document.querySelector("#maximo");
    const textResumo = document.querySelector("#resumo");

    function atualizarContador(quantidade) {
      spanMaximo.textContent = quantidade;
      if (quantidade === 0 || quantidade === MAX_CARACTERES) {
        spanMaximo.classList.remove("bg-success");
        spanMaximo.classList.add("bg-danger");
      } else {
        spanMaximo.classList.remove("bg-danger");
        spanMaximo.classList.add("bg-success");
      }
    }

    // Inicializa
    atualizarContador(textResumo.value.length);

    textResumo.addEventListener("input", function () {
      atualizarContador(textResumo.value.length);
    });
  </script>
</div>
</html>
