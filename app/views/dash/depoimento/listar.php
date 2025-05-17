<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {
    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    if ($tipo == 'sucesso') {
        echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div>';
    } elseif ($tipo == 'erro') {
        echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
    }

    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}
?>

<div class="my-5">
    <h2 class="text-center fw-bold py-3" style="background:rgba(37, 37, 37, 0.57); color: #f0c674; border-radius: 12px;">
        Depoimentos dos Clientes
    </h2>
</div>



<div class="table-responsive">
    <table class="table table-hover table-glass">
        <thead>
            <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Depoimento</th>
                <th scope="col">Data e Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($depoimento as $linha): ?>
                <tr>
                    <td><?= htmlspecialchars($linha['nome_cliente']) ?></td>
                    <td><?= htmlspecialchars($linha['descricao_depoimento']) ?></td>
                    <td><?= htmlspecialchars($linha['data_depoimento']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center align-items-center mb-4 flex-column gap-3">
    <h2 class="mb-0" style="color:#f0c674;">Deseja Adicionar um Depoimento?</h2>
    <a href="<?= BASE_URL ?>depoimento/adicionar" class="btn btn-add">
        <i class="fas fa-user-plus me-2"></i>Adicionar Depoimento
    </a>
</div>

<!-- FontAwesome + Estilo -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    .table-glass {
        min-width: 900px;
        background: rgba(28, 30, 34, 0.33);
        border: 1px solid #f0c674;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(240, 198, 116, 0.15);
        backdrop-filter: blur(8px);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .table-glass:hover {
        box-shadow: 0 12px 28px rgba(240, 198, 116, 0.25);
        transform: translateY(-2px);
    }

    .table-glass th {
        background: linear-gradient(90deg, rgba(32, 32, 32, 1), rgba(24, 24, 24, 1));
        color: #f0c674 !important;
        font-weight: bold;
        text-align: center;
        padding: 1rem;
        white-space: nowrap;
    }

    .table-glass td {
        background-color: rgba(17, 17, 17, 0.5);
        color: #f8f8f8;
        padding: 0.75rem;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: background 0.2s ease;
    }

    .table-glass tr:hover td {
        background-color: rgba(240, 198, 116, 0.06);
    }

    .btn-add {
        background-color: #f0c674;
        color: #1c1e22;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        font-weight: bold;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-add:hover {
        background-color: #e5b84e;
        transform: translateY(-2px);
        color: #fff;
    }
</style>
