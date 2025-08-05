<?php 
include('includes/navAdminTotal.php');
include('enviarArquivo.php');

// Consulta para contar total de artigos
$sqlTotal = "SELECT COUNT(*) AS total FROM repositorio";
$resultTotal = $conn->query($sqlTotal);
$totalArtigo = $resultTotal->fetch_assoc()['total'];


?>

<style>
  body {
    background-color: #f8f9fa;
  }

  .card-dashboard {
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }

  .section-title {
    font-weight: 600;
    font-size: 16px;
    color: #6c757d;
  }

  .filtros select, .filtros input {
    border-radius: 6px;
  }

  .btn-novo {
    border-radius: 6px;
  }

  .table td, .table th {
    vertical-align: middle;
  }

  .badge-file {
    background-color: #0d6efd;
    color: white;
    text-decoration: none;
  }

  .truncate-text {
    max-width: 140px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

.btn-submit {
  background-color: #0d6efd;
  color: #fff;
  font-weight: bold;
  border: none;
  padding: 12px 24px;
}

.btn-submit:hover {
  background-color: #0853c4;
}


   /* Evitar sobreposição com a sidebar fixa */
    @media (min-width: 768px) {
      .container {
    width: 83%;
    margin-left: 240px; /* Ajuste para sidebar fixa */
    padding: 20px;
  }


    @media (max-width: 767.98px) {
      .container {
        margin-left: 0;
        margin-top: 20%;
        padding: 10px;
      }
    }
  }
</style>

<body>

<div class="container my-4">
  
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Gerenciamento de Artigos</h4>
    <?php if (!empty($envio)) : ?>
      <div class="alert alert-info fade-message" id="mensagem-temporaria">
        <?php echo $envio; ?>
      </div>
      <?php elseif (!empty($messagemExitRep)) : ?>
  <div class="alert alert-info fade-message" id="mensagem-temporaria">
    <?php echo $messagemExitRep; ?>
  </div>

      
  <script>
    setTimeout(function () {
      const msg = document.getElementById('mensagem-temporaria');
      if (msg) {
        msg.style.transition = "opacity 0.5s ease-out";
        msg.style.opacity = 0;
        setTimeout(() => msg.remove(), 1000); // remove o elemento após o fade
      }
    }, 3000); // 5 segundos
  </script>
    <?php endif; ?>
   <!-- Botão para abrir o modal -->
<button class="btn btn-primary btn-sm btn-novo" data-bs-toggle="modal" data-bs-target="#modalCadastroArtigo">
  <i class="bi bi-file-earmark-plus"></i> Novo Artigo
</button>

<!-- Modal de Cadastro de Artigo -->
<div class="modal fade" id="modalCadastroArtigo" tabindex="-1" aria-labelledby="modalCadastroArtigoLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <form class="form-container" action="" method="POST" enctype="multipart/form-data">
        
        <div class="modal-header">
          <h5 class="modal-title" id="modalCadastroArtigoLabel">Cadastro de Artigo Acadêmico</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>

        <div class="modal-body">
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
              <label>Resumo <span id="maximo" class="badge bg-danger">0</span></label>
              <textarea id="resumo" class="form-control" name="resumo" rows="4" maxlength="400" placeholder="Digite o resumo..." required></textarea>
            </div>
            <div class="col-md-12 mb-3">
              <label>Artigo (PDF)</label>
              <input class="form-control" type="file" name="arquivo" accept=".pdf" required />
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-submit">Registrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Script do contador -->
<script>
  const MAX_CARACTERES = 400;
  const spanMaximo = document.querySelector("#maximo");
  const textResumo = document.querySelector("#resumo");

  function atualizarContador(quantidade) {
    spanMaximo.textContent = quantidade;
    spanMaximo.classList.toggle("bg-danger", quantidade === 0 || quantidade === MAX_CARACTERES);
    spanMaximo.classList.toggle("bg-success", quantidade > 0 && quantidade < MAX_CARACTERES);
  }

  if (textResumo) {
    atualizarContador(textResumo.value.length);
    textResumo.addEventListener("input", function () {
      atualizarContador(textResumo.value.length);
    });
  }
</script>

    </a>
  </div>

  

  <div class="mb-4">
    <div class="card card-dashboard p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <div class="section-title">Total de Artigos</div>
          <h5><?php echo $totalArtigo; ?></h5>
        </div>
        <div class="card-icon">
          <i class="bi bi-journal-text fs-2 text-primary"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Filtros -->
  <form method="GET" class="row g-2 filtros mb-4">
    <div class="col-md-4">
      <select name="tipo" class="form-select">
  <option value="">Tipo de Produção</option>
  <option value="Artigo Cientifico" <?= (($_GET['tipo'] ?? '') == 'Artigo Cientifico') ? 'selected' : '' ?>>Artigo Científico</option>
  <option value="Relatório de Estágio" <?= (($_GET['tipo'] ?? '') == 'Relatório de Estágio') ? 'selected' : '' ?>>Relatório de Estágio</option>
  <option value="TCC" <?= (($_GET['tipo'] ?? '') == 'TCC') ? 'selected' : '' ?>>TCC</option>
  <option value="Outro" <?= (($_GET['tipo'] ?? '') == 'Outro') ? 'selected' : '' ?>>Outro</option>
</select>

    </div>

    <div class="col-md-4">
      <input  type="date" name="data_inicio" class="form-control" value="<?= $_GET['data_inicio'] ?? '' ?>">
    </div>

    <div class="col-md-4">
      <input type="text" name="busca" class="form-control" placeholder="Buscar por título ou autor..." value="<?= htmlspecialchars($_GET['busca'] ?? '') ?>">
    </div>

    <div class="col-12 mt-2">
      <button class="btn btn-primary btn-sm btn-novo" type="submit">
        <i class="bi bi-filter"></i> Filtrar
      </button>
    </div>
  </form>

  <!-- Tabela -->
  <table class="table table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Autoria</th>
        <th>Orientador</th>
        <th>Título</th>
        <th>Palavras-chave</th>
        <th>Publicação</th>
        <th>Tema Central</th>
        <th>Tipo</th>
        <th>Resumo</th>
        <th>Arquivo</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
    <?php
// Montar filtro com base nos parâmetros GET
$condicoes = [];

if (!empty($_GET['tipo'])) {
  $tipo = $conn->real_escape_string($_GET['tipo']);
  $condicoes[] = "tipoDeProdução = '$tipo'";
}

if (!empty($_GET['data_inicio'])) {
  $data_inicio = $conn->real_escape_string($_GET['data_inicio']);
  $condicoes[] = "data_Publicação >= '$data_inicio'";
}

if (!empty($_GET['busca'])) {
  $busca = $conn->real_escape_string($_GET['busca']);
  $condicoes[] = "(titulo_artigo LIKE '%$busca%' OR Autoria LIKE '%$busca%')";
}

$sql = "SELECT * FROM repositorio";
if (!empty($condicoes)) {
  $sql .= " WHERE " . implode(" AND ", $condicoes);
}

$repositorios = $conn->query($sql);

while ($repo = $repositorios->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $repo['Id_user']; ?></td>
    <td><?php echo htmlspecialchars($repo['Autoria']); ?></td>
    <td><?php echo htmlspecialchars($repo['nomo_orientador']); ?></td>
    <td class="truncate-text" title="<?php echo htmlspecialchars($repo['titulo_artigo']); ?>">
      <?php echo htmlspecialchars($repo['titulo_artigo']); ?>
    </td>
    <td><?php echo htmlspecialchars($repo['palavras_chaves']); ?></td>
    <td><?php echo date("d/m/y", strtotime($repo['data_Publicação'])); ?></td>
    <td><?php echo htmlspecialchars($repo['tema_central']); ?></td>
    <td>
      <span class="badge bg-secondary">
        <?php echo htmlspecialchars($repo['tipoDeProdução']); ?>
      </span>
    </td>
    <td class="truncate-text" title="<?php echo htmlspecialchars($repo['resumo']); ?>">
      <?php echo htmlspecialchars($repo['resumo']); ?>
    </td>
    <td>
      <a target="_blank" href="<?php echo $repo['path']; ?>" class="badge badge-file">
        <i class="bi bi-file-earmark-text"></i> Ver
      </a>
    </td>
    <td>
      <a href="editarArtigos.php?id=<?php echo $repo['Id_user']; ?>" class="text-decoration-none me-2 text-dark">
        <i class="bi bi-pencil"></i>
      </a>
      <a href="?deletar_repositorio=<?php echo $repo['Id_user']; ?>" class="text-decoration-none text-danger">
        <i class="bi bi-x-circle"></i>
      </a>
    </td>
  </tr>
<?php } ?>

      

    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


