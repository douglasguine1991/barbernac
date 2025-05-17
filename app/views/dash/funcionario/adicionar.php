<form method="POST" action="<?= BASE_URL ?>funcionarios/adicionar" enctype="multipart/form-data">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-4 form-glass rounded-4 shadow-lg">

                <h3 class="text-center fw-bold mb-4" style="color: #f0c674;">Cadastro de Funcionário</h3>

                <div class="row mb-4">
                    <div class="col-md-3 text-center">
                        <img id="preview-img"
                            src="<?= BASE_URL ?>uploads/sem-foto.png"
                            alt="Foto do Funcionário"
                            class="img-fluid rounded-4 border border-warning border-2"
                            style="cursor:pointer;"
                            title="Clique na imagem para selecionar uma foto">
                        <input type="file" name="foto_funcionario" id="foto_funcionario" class="d-none" accept="image/*">
                    </div>

                    <div class="col-md-9">
                        <div class="row g-3">
                            <!-- Dados pessoais -->
                            <div class="col-md-6">
                                <label for="nome_funcionario" class="form-label">Nome:</label>
                                <input type="text" name="nome_funcionario" id="nome_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tipo_funcionario" class="form-label">Tipo:</label>
                                <select name="tipo_funcionario" id="tipo_funcionario" class="form-select" required>
                                    <option value="Fisica">Física</option>
                                    <option value="Juridica">Jurídica</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="cpf_cnpj_funcionario" class="form-label">CPF/CNPJ:</label>
                                <input type="text" name="cpf_cnpj_funcionario" id="cpf_cnpj_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="data_adm_funcionario" class="form-label">Data de Admissão:</label>
                                <input type="date" name="data_adm_funcionario" id="data_adm_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email_funcionario" class="form-label">E-mail:</label>
                                <input type="email" name="email_funcionario" id="email_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="senha_funcionario" class="form-label">Senha:</label>
                                <input type="password" name="senha_funcionario" id="senha_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="telefone_funcionario" class="form-label">Telefone:</label>
                                <input type="text" name="telefone_funcionario" id="telefone_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="endereco_funcionario" class="form-label">Endereço:</label>
                                <input type="text" name="endereco_funcionario" id="endereco_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="bairro_funcionario" class="form-label">Bairro:</label>
                                <input type="text" name="bairro_funcionario" id="bairro_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="cidade_funcionario" class="form-label">Cidade:</label>
                                <input type="text" name="cidade_funcionario" id="cidade_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="id_uf" class="form-label">Estado:</label>
                                <select name="id_uf" id="id_uf" class="form-select" required>
                                    <option selected>Selecione</option>
                                    <?php foreach ($estados as $linha): ?>
                                        <option value="<?= $linha['id_uf']; ?>"><?= $linha['nome_uf']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="id_especialidade" class="form-label">Especialidade:</label>
                                <select name="id_especialidade" id="id_especialidade" class="form-select" required>
                                    <option selected>Selecione</option>
                                    <?php foreach ($especialidades as $especialidade): ?>
                                        <option value="<?= $especialidade['id_especialidade']; ?>"><?= $especialidade['nome_especialidade']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="cargo_funcionario" class="form-label">Cargo:</label>
                                <input type="text" name="cargo_funcionario" id="cargo_funcionario" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="salario_funcionario" class="form-label">Salário:</label>
                                <input type="text" name="salario_funcionario" id="salario_funcionario" class="form-control" required>
                            </div>

                            <!-- Redes sociais -->
                            <div class="col-md-4">
                                <label for="facebook_funcionario" class="form-label">Facebook:</label>
                                <input type="text" name="facebook_funcionario" id="facebook_funcionario" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label for="instagram_funcionario" class="form-label">Instagram:</label>
                                <input type="text" name="instagram_funcionario" id="instagram_funcionario" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label for="linkedin_funcionario" class="form-label">LinkedIn:</label>
                                <input type="text" name="linkedin_funcionario" id="linkedin_funcionario" class="form-control">
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">
                                <label for="status_funcionario" class="form-label">Status:</label>
                                <select name="status_funcionario" id="status_funcionario" class="form-select" required>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end gap-3">
                            <button type="submit" class="btn btn-success px-4">Salvar</button>
                            <a href="<?= BASE_URL ?>funcionarios" class="btn btn-outline-light px-4">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Estilo Glassmorphism -->
<style>
    .form-glass {
        background: rgba(28, 30, 34, 0.5);
        border: 1px solid #f0c674;
        backdrop-filter: blur(10px);
        color: #f8f8f8;
    }

    .form-label {
        color: #f0c674;
        font-weight: 500;
    }

    .form-control,
    .form-select {
        background-color: rgba(255, 255, 255, 0.06);
        border: 1px solid #f0c67477;
        color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #f0c674;
        background-color: rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 0 0.2rem rgba(240, 198, 116, 0.25);
    }

    .btn-success {
        background-color: #f0c674;
        border: none;
        color: #1c1e22;
        font-weight: bold;
    }

    .btn-success:hover {
        background-color: #e2b352;
        color: #fff;
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #f0c674;
        border-color: #f0c674;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const preview = document.getElementById('preview-img');
        const input = document.getElementById('foto_funcionario');

        preview.addEventListener('click', () => input.click());

        input.addEventListener('change', () => {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => preview.src = e.target.result;
                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>