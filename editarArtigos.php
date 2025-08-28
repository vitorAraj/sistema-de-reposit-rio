<?php
include 'novoconexao.php';
include('restrita.php');

if (!isset($_GET['id'])) {
    die('ID do Artigo não informado.');
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM repositorio WHERE id_user = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die('Artigo não encontrado.');
}

$artigo = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autoria = $conn->real_escape_string($_POST['Autoria']);
    $nome_orientador = $conn->real_escape_string($_POST['orientador']); // campo que vai pra 'nomo_orientador'
    $tituloArtigo = $conn->real_escape_string($_POST['titulo']);
    $palavras_chave = $conn->real_escape_string($_POST['palavras_chaves']);
    $data = $conn->real_escape_string($_POST['data']);
    $temaCentral = $conn->real_escape_string($_POST['tema_central']);
    $tipoDeProducao = $conn->real_escape_string($_POST['tipo_producao']);
    $resumo = $conn->real_escape_string($_POST['resumo']);

    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['arquivo']['tmp_name'];
        $nomeArquivo = basename($_FILES['arquivo']['name']);
        $caminho = 'uploads/' . uniqid() . "_" . $nomeArquivo;
        move_uploaded_file($arquivoTmp, $caminho);
    } else {
        $caminho = $artigo['path'];
    }

    $update = "UPDATE repositorio SET
                Autoria = '$autoria',
                nomo_orientador = '$nome_orientador',
                titulo_artigo = '$tituloArtigo',
                palavras_chaves = '$palavras_chave',
                data_Publicação = '$data',
                tema_central = '$temaCentral',
                tipoDeProdução = '$tipoDeProducao',
                path = '$caminho',
                resumo = '$resumo'
              WHERE id_user = $id";

    if ($conn->query($update)) {
        header("Location: gerenciarArtigo.php?editado=1");
        exit;
    } else {
        $erro = "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Artigo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="icon" type="image/png" href="img\guia.png">
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
      background-color: #084ec1;
    }
    textarea {
      resize: none;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <?php if (isset($_GET['editado']) && $_GET['editado'] == 1): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Artigo atualizado com sucesso!
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>
  </div>

  <div class="form-bo">
    <form class="form-container" id="formArtigo" method="POST" enctype="multipart/form-data">
      <div class="form-title">Editar Artigo</div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Autoria</label>
          <input type="text" name="Autoria" class="form-control" value="<?php echo $artigo['Autoria']; ?>" required />
        </div>
        <div class="col-md-6 mb-3">
          <label>Orientador</label>
          <input type="text" name="orientador" class="form-control" value="<?php echo $artigo['nomo_orientador']; ?>" required />
        </div>
        <div class="col-md-6 mb-3">
          <label>Data de Publicação</label>
          <input type="number" name="data" class="form-control" value="<?php echo $artigo['data_Publicação']; ?>" required />
        </div>
        <div class="col-md-6 mb-3">
          <label>Título do Artigo</label>
          <input type="text" name="titulo" class="form-control" value="<?php echo $artigo['titulo_artigo']; ?>" required />
        </div>
        <div class="col-md-6 mb-3">
          <label>Palavras-chave</label>
          <input type="text" name="palavras_chaves" class="form-control" value="<?php echo $artigo['palavras_chaves']; ?>" required />
        </div>
        <div class="col-md-6 mb-3">
          <label>Tema Central</label>
          <input type="text" name="tema_central" class="form-control" value="<?php echo $artigo['tema_central']; ?>" required />
        </div>
        <div class="col-md-6 mb-3">
          <label>Tipo de Produção</label>
          <select class="form-control" name="tipo_producao" required>
            <option selected><?php echo $artigo['tipoDeProdução']; ?></option>
            <option>Artigo Científico</option>
            <option>Relatório de Estágio</option>
            <option>TCC</option>
            <option>Outro</option>
          </select>
        </div>
        <div class="col-md-12 mb-3">
          <label>Resumo</label>
          <span id="maximo" class="badge bg-danger">0</span>
          <textarea id="resumo" class="form-control" name="resumo" rows="5" maxlength="400" required><?php echo $artigo['resumo']; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="artigo" class="form-label">Artigo (PDF)</label>
          <input class="form-control" type="file" id="artigo" name="arquivo" accept=".pdf" />
          <small class="text-muted">Arquivo atual: <?php echo basename($artigo['path']); ?></small>
        </div>
      </div>

      <button type="button" class="btn btn-submit mt-3" data-bs-toggle="modal" data-bs-target="#confirmarModal">Salvar Alterações</button>
      <a href="gerenciarArtigo.php" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
  </div>

  <!-- Modal de Confirmação -->
  <div class="modal fade" id="confirmarModal" tabindex="-1" aria-labelledby="confirmarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Edição</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja salvar as alterações feitas neste artigo?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" form="formArtigo" class="btn btn-primary">Confirmar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const MAX_CARACTERES = 400;
    const spanMaximo = document.querySelector("#maximo");
    const textResumo = document.querySelector("#resumo");

    function atualizarContador(quantidade) {
      spanMaximo.textContent = quantidade;
      spanMaximo.className = "badge " + (quantidade === 0 || quantidade === MAX_CARACTERES ? "bg-danger" : "bg-success");
    }

    atualizarContador(textResumo.value.length);
    textResumo.addEventListener("input", () => atualizarContador(textResumo.value.length));
  </script>
</body>
</html>
