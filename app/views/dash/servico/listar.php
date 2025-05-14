<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])){
    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    // EXIBIR MENSAGEM
    if($tipo == 'sucesso'){
        echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
    }elseif($tipo == 'erro'){
        echo '<div class="alert alert-warning" role="alert">' . $mensagem . '</div>';
    }

    // LIMPE AS VARIAVEIS DE SESSAO
    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}
?>



<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Tempo</th>
                <th scope="col">Editar</th>
                <th scope="col">Desativar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaServico as $linha): ?>
                <tr>
                    <td>
                        <?php
                        $caminhoBase = "<?= BASE_URL?>uploads/servico/";
                        $caminhoFoto = $_SERVER['DOCUMENT_ROOT'] . "/barbernac/public/uploads/servico/" . $linha['foto_galeria'];
                        $urlFoto = $linha['foto_galeria'] != "" && file_exists($caminhoFoto)
                            ? $caminhoBase . htmlspecialchars($linha['foto_galeria'], ENT_QUOTES, 'UTF-8')
                            : $caminhoBase . "barba.png";
                        ?>
                        <img src="<?php echo $urlFoto; ?>" alt="Foto do Serviço" class="img-thumbnail" style="width: 80px; height: 80px; border-radius:50%;">
                    </td>
                    <td><?php echo htmlspecialchars($linha['nome_servico']) ?></td>
                    <td><?php echo htmlspecialchars($linha['descricao_servico']) ?></td>
                    <td>R$ <?php echo number_format($linha['preco_base_servico'], 2, ',', '.') ?></td>
                    <td><?php echo htmlspecialchars($linha['tempo_estimado_servico']) ?></td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm" href="<?= BASE_URL?>servico/editar/<?php echo $linha['id_servico']; ?>" title="Editar">
                            <i class="bi bi-pencil-square"></i> <!-- Usa ícones Bootstrap -->
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm" title="Desativar" onclick="abrirModalDesativar(<?php echo $linha['id_servico']; ?>)">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center align-items-center mb-3 gap-3 flex-wrap text-center flex-column">
    <h2 class="mb-0">Deseja Adicionar um Serviço?</h2>
    <a href="<?= BASE_URL?>servico/adicionar" class="btn btn-primary">
        Adicionar Serviço
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
