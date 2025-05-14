<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 
if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {
    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];
 
    // Exibir mensagem
    if ($tipo == 'sucesso') {
        echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div>';
    } elseif ($tipo == 'erro') {
        echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
    }
 
    // Limpar variáveis de sessão
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
                <th scope="col">Cargo</th>
                <th scope="col">Especialidade</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Editar</th>
                <th scope="col">Desativar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaFuncionario as $linha): ?>
                <tr>
                    <td>
                    <?php
                            $caminhoArquivo = BASE_URL . "uploads/" . $linha['foto_funcionario'];
                            $img = BASE_URL . "uploads/sem-foto.jpg"; // Caminho padrão corrigido
                            // $alt_foto = "imagem sem foto $index";
 
                            if (!empty($linha['foto_funcionario'])) {
                                $headers = @get_headers($caminhoArquivo);
                                if ($headers && strpos($headers[0], '200') !== false) {
                                    $img = $caminhoArquivo;
                                }
                            }
 
                            ?>
                            <img src="<?php echo $img; ?>" alt="Foto funcionario" class="rounded-circle" style="width: 50px; height: 50px;">
                   </td>
                    <td><?php echo htmlspecialchars($linha['nome_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['cargo'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['nome_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['telefone'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm" href="funcionarios/editar/<?php echo $linha['id']; ?>" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-outline-danger btn-sm" href="funcionarios/desativar/<?php echo $linha['id']; ?>" title="Desativar" onclick="return confirm('Tem certeza que deseja desativar este funcionário?');">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<div class="d-flex justify-content-center align-items-center mb-3 gap-3 flex-wrap text-center flex-column">
    <h2 class="mb-0">Deseja Adicionar um funcionario?</h2>
    <a href="<?= BASE_URL ?>funcionario/adicionar" class="btn btn-primary">
        Adicionar funcionario
    </a>
</div>


<!-- Modal desativar serviço -->
<div class="modal" tabindex="-1" id="modalDesativar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Desativar Funcionario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja desativar esse Funcionario</p>
                <input type="hidden" id="idFuncionarioDesativar" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Desativar</button>
            </div>
        </div>
    </div>
</div>