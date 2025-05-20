<form method="POST" action="<?= BASE_URL ?>cliente/editar/<?php echo $cliente['id']; ?>" enctype="multipart/form-data">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <img id="preview-img"
                    src="<?php echo isset($cliente['foto_cliente']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/barbernac/public/uploads/' . $cliente['foto_cliente']) ? '<?= BASE_URL ?>uploads/' . $cliente['foto_cliente'] : '<?= BASE_URL ?>uploads/sem-foto.png'; ?>"
                    alt="Foto do Cliente"
                    style="width:100%; cursor:pointer;"
                    title="Clique na imagem para selecionar uma foto">
                <input type="file" name="foto_cliente" id="foto_cliente" style="display: none;" accept="image/*">
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nome_cliente" class="form-label">Nome do Cliente:</label>
                        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="<?php echo htmlspecialchars($cliente['nome']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo_cliente" class="form-label">Tipo de Cliente:</label>
                        <select class="form-select" id="tipo_cliente" name="tipo_cliente" required>
                            <option value="Fisica" <?php echo $cliente['tipo_cliente'] == 'Fisica' ? 'selected' : ''; ?>>Física</option>
                            <option value="Juridica" <?php echo $cliente['tipo_cliente'] == 'Juridica' ? 'selected' : ''; ?>>Jurídica</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="cpf_cnpj_cliente" class="form-label">CPF/CNPJ:</label>
                        <input type="text" class="form-control" id="cpf_cnpj_cliente" name="cpf_cnpj_cliente" value="<?php echo htmlspecialchars($cliente['cpf_cnpj_cliente']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="data_nasc_cliente" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="data_nasc_cliente" name="data_nasc_cliente" value="<?php echo htmlspecialchars($cliente['data_nasc_cliente']); ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="email_cliente" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email_cliente" name="email_cliente" value="<?php echo htmlspecialchars($cliente['email']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="senha_cliente" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha_cliente" name="senha_cliente" value="<?php echo htmlspecialchars($cliente['senha']); ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="telefone_cliente" class="form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefone_cliente" name="telefone_cliente" value="<?php echo htmlspecialchars($cliente['telefone']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="endereco_cliente" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="endereco_cliente" name="endereco_cliente">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="bairro_cliente" class="form-label">Bairro:</label>
                        <input type="text" class="form-control" id="bairro_cliente">
                    </div>
                    <div class="col-md-6">
                        <label for="cidade_cliente" class="form-label">Cidade:</label>
                        <input type="text" class="form-control" id="cidade_cliente">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="id_uf" class="form-label">Estado:</label>
                        <select class="form-select" id="id_uf" name="id_uf" required>
                            <option value="0">Selecione</option>
                            <?php foreach ($estados as $linha): ?>
                                <option value="<?php echo $linha['id_uf']; ?>" <?php echo $cliente['id'] == $linha['id'] ? 'selected' : ''; ?>><?php echo $linha['nome']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="status_cliente" class="form-label">Status:</label>
                    <select class="form-control" id="status_cliente" name="status_cliente" required>
                        <option value="1" <?php echo $cliente['status_cliente'] == 1 ? 'selected' : ''; ?>>Ativo</option>
                        <option value="0" <?php echo $cliente['status_cliente'] == 0 ? 'selected' : ''; ?>>Inativo</option>
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="<?= BASE_URL ?>cliente/listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const visualizarImg = document.getElementById('preview-img');
        const arquivo = document.getElementById('foto_cliente');

        visualizarImg.addEventListener('click', function() {
            arquivo.click();
        });

        arquivo.addEventListener('change', function() {
            if (arquivo.files && arquivo.files[0]) {
                let render = new FileReader();
                render.onload = function(e) {
                    visualizarImg.src = e.target.result;
                }
                render.readAsDataURL(arquivo.files[0]);
            }
        });
    });
</script>
