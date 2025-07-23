<?php
include('includes/navAdminTotal.php');
include('enviarArquivo.php');



$sqlTotal = "SELECT COUNT(*) AS total FROM cadastro";
$resultTotal = $conn->query($sqlTotal);
$totalUsuarios = $resultTotal->fetch_assoc()['total'];

$sqlTotal = "SELECT COUNT(*) AS total FROM repositorio";
$resultTotal = $conn->query($sqlTotal);
$totalArtigo = $resultTotal->fetch_assoc()['total'];



function calcularTamanhoPDFs($diretorio) {
    $tamanhoTotal = 0;

    if (is_dir($diretorio)) {
        $arquivos = scandir($diretorio);
        foreach ($arquivos as $arquivo) {
            $caminho = $diretorio . DIRECTORY_SEPARATOR . $arquivo;
            if (is_file($caminho) && strtolower(pathinfo($arquivo, PATHINFO_EXTENSION)) === 'pdf') {
                $tamanhoTotal += filesize($caminho);
            }
        }
    }

    return $tamanhoTotal / (1024 * 1024 * 1024); // Bytes para GB
}

$tamanhoPDFsGB = calcularTamanhoPDFs('arquivos'); // ajuste o nome da pasta se for diferente
$tamanhoPDFsFormatado = number_format($tamanhoPDFsGB, 2); // 2 casas decimais


?>

<style>
  body {
    background-color: #f8f9fa;
    font-family: 'Segoe UI', sans-serif;
  }

  .main-content {
    padding: 30px;
    margin-left: 260px;
  }

  .dashboard-welcome {
    margin-bottom: 30px;
  }

  .card-dashboard {
    border: none;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s;
    background-color: #fff;
  }

  .card-dashboard:hover {
    transform: translateY(-5px);
  }

  .icon-circle {
    background-color: #0d6efd;
    color: white;
    font-size: 1.5rem;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .admin-tools h5 {
    margin-top: 10px;
    font-weight: 600;
  }

  .admin-tools p {
    font-size: 0.875rem;
    color: #6c757d;
  }

  .admin-tools .col a {
    text-decoration: none;
    transition: 0.3s ease;
    display: block;
    padding: 20px;
    border-radius: 12px;
    background-color: white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    height: 100%;
  }

  .admin-tools .col a:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    color: #0d6efd;
  }

  @media (max-width: 768px) {
    .main-content {
      margin-left: 0;
    }
  }
</style>

<div class="main-content">
  <div class="container dashboard-welcome">
    <h2 class="mb-1">Bem-vindo, <?php echo $_SESSION['nome_login']; ?>!</h2>
    <p>Gerencie artigos, usuários e acompanhe o sistema administrativo.</p>
  </div>

  <!-- Cards de dados -->
  <div class="container mb-5">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card card-dashboard p-4">
          <div class="d-flex align-items-center">
            <div class="icon-circle me-3"><i class="bi bi-journal-text"></i></div>
            <div>
              <h6>Total de Artigos</h6>
              <h5 class="mb-0"><?php echo $totalArtigo; ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-dashboard p-4">
          <div class="d-flex align-items-center">
            <div class="icon-circle me-3"><i class="bi bi-people"></i></div>
            <div>
              <h6>Total de Usuários</h6>
              <h5 class="mb-0"><?php echo $totalUsuarios; ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-dashboard p-4">
          <div class="d-flex align-items-center">
            <div class="icon-circle me-3"><i class="bi bi-hdd-network"></i></div>
            <div>
              <h6>Armazenamento</h6>
              <h5 class="mb-0"><?php echo $tamanhoPDFsFormatado; ?> GB de PDFs enviados.</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Ferramentas Administrativas -->
  <div class="container">
    <h4 class="mb-4">Ferramentas Administrativas</h4>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 admin-tools">

      <div class="col">
        <a href="editarPefil.php">
          <div class="text-center">
            <i class="bi bi-person-circle fs-2"></i>
            <h5>Editar Perfil</h5>
            <p>Atualize suas informações pessoais.</p>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="cadastrarLogin.php">
          <div class="text-center">
            <i class="bi bi-person-add fs-2"></i>
            <h5>Cadastrar Usuários</h5>
            <p>Adicione novos usuários ao sistema.</p>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="repositorioAdmin.php">
          <div class="text-center">
            <i class="bi bi-journal-arrow-down fs-2"></i>
            <h5>Cadastrar Artigos</h5>
            <p>Envie novos artigos para o repositório.</p>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="Home.php">
          <div class="text-center">
            <i class="bi bi-house-door fs-2"></i>
            <h5>Home</h5>
            <p>Voltar à página inicial do site.</p>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="gerenciarArtigo.php">
          <div class="text-center">
            <i class="bi bi-database fs-2"></i>
            <h5>Banco de Dados</h5>
            <p>Gerencie repositório e tabela.</p>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="gerenciarUser.php">
          <div class="text-center">
            <i class="bi bi-people fs-2"></i>
            <h5>Usuários</h5>
            <p>Visualize todos os usuários cadastrados.</p>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="BancoDados.php">
          <div class="text-center">
            <i class="bi bi-pin fs-2"></i>
            <h5>Destaques</h5>
            <p>Funcionalidades em destaque.</p>
          </div>
        </a>
      </div>

      <div class="col">
        <a  href="logout.php">
          <div class="text-center">
            <i class="bi bi-box-arrow-right fs-2 text-danger"></i>
            <h5>Sair</h5>
            <p>Encerrar sessão do sistema.</p>
          </div>
        </a>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
