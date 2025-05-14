<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {
    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    if ($tipo == 'sucesso') {
        echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
    } elseif ($tipo == 'erro') {
        echo '<div class="alert alert-warning" role="alert">' . $mensagem . '</div>';
    }

    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}

?>





<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Estado ID</th>
                <th scope="col">Data de Cadastro</th>
                <th scope="col">Senha</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaCliente as $linha): ?>
                <tr>
                    <td><?php echo htmlspecialchars($linha['id']); ?></td>
                    <td>
                        <?php
                        $caminhoBase = BASE_URL . "uploads/";
                        $caminhoFoto = $_SERVER['DOCUMENT_ROOT'] . "/barbernac/public/uploads/" . $linha['foto_cliente'];
                        $urlFoto = $linha['foto_cliente'] != "" && file_exists($caminhoFoto)
                            ? $caminhoBase . htmlspecialchars($linha['foto_cliente'], ENT_QUOTES, 'UTF-8')
                            : $caminhoBase . "sem-foto.png";
                        ?>
                        <img src="<?php echo $urlFoto; ?>" alt="Foto do Cliente" class="img-thumbnail" style="width: 80px; height: auto;">
                    </td>
                    <td><?php echo htmlspecialchars($linha['nome']); ?></td>
                    <td><?php echo htmlspecialchars($linha['email']); ?></td>
                    <td><?php echo htmlspecialchars($linha['telefone']); ?></td>
                    <td><?php echo htmlspecialchars($linha['estado_id']); ?></td>
                    <td><?php echo htmlspecialchars($linha['data_cadastro']); ?></td>
                    <td>
                        <span class="text-muted text-truncate d-inline-block" style="max-width: 150px;"><?php echo htmlspecialchars($linha['senha']); ?></span>
                    </td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm" href="<?= BASE_URL ?>cliente/editar/<?php echo $linha['id']; ?>" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?= BASE_URL ?>cliente/desativar/<?php echo $linha['id']; ?>" class="btn btn-outline-danger btn-sm" title="Desativar" onclick="return confirm('Tem certeza que deseja desativar este cliente?');">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<div class="d-flex justify-content-center align-items-center mb-3 gap-3 flex-wrap text-center flex-column">
    <h2 class="mb-0">Deseja Adicionar um Cliente?</h2>
    <a href="<?= BASE_URL ?>cliente/adicionar" class="btn btn-primary">
        Adicionar Cliente
    </a>
</div>


<!-- Modal desativar serviço -->
<div class="modal" tabindex="-1" id="modalDesativar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Desativar Serviço</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja desativar esse serviço?</p>
                <input type="hidden" id="idServicoDesativar" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Desativar</button>
            </div>
        </div>
    </div>
</div>
