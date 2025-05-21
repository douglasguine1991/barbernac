<form method="POST" action="<?= BASE_URL ?>cliente/editar/<?php echo $cliente['id']; ?>" enctype="multipart/form-data">

<div class="container my-5">
  <div class="row">
    <!-- Imagem do Cliente -->
    <div class="col-md-4">
    <?php
        $caminhoArquivo = BASE_URL . "uploads/" . $cliente['foto_cliente'];
        $img = BASE_URL . "uploads/sem-foto.png";

        if (!empty($cliente['foto_cliente'])) {
            $headers = @get_headers($caminhoArquivo);
            if ($headers && strpos($headers[0], '200') !== false) {
                $img = $caminhoArquivo;
            }
        }
    ?>
      <img src="<?= $img ?>" alt="Foto do Cliente" class="img-fluid" id="preview-img" style="width:100%; cursor:pointer;">
      <input type="file" name="foto_cliente" id="foto_cliente" style="display: none;" accept="image/*">
    </div>

    <div class="col-md-8">
      <!-- Nome -->
      <div class="mb-3">
        <label for="nome_cliente" class="form-label">Nome Completo:</label>
        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
      </div>

      <!-- Tipo Cliente e CPF/CNPJ -->
      <div class="row g-3">
        <div class="col-md-6">
          <label for="tipo_cliente" class="form-label">Tipo de Cliente:</label>
          <select class="form-control" id="tipo_cliente" name="tipo_cliente" required>
            <option value="Física" <?= ($cliente['tipo_cliente'] == 'Física') ? 'selected' : '' ?>>Pessoa Física</option>
            <option value="Jurídica" <?= ($cliente['tipo_cliente'] == 'Jurídica') ? 'selected' : '' ?>>Pessoa Jurídica</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="cpf_cnpj_cliente" class="form-label">CPF/CNPJ:</label>
          <input type="text" class="form-control" id="cpf_cnpj_cliente" name="cpf_cnpj_cliente" value="<?= htmlspecialchars($cliente['cpf_cnpj_cliente']) ?>" required>
        </div>
      </div>

      <!-- E-mail e Senha -->
      <div class="row g-3">
        <div class="col-md-6">
          <label for="email_cliente" class="form-label">E-mail:</label>
          <input type="email" class="form-control" id="email_cliente" name="email_cliente" value="<?= htmlspecialchars($cliente['email']) ?>" required>
        </div>
        <div class="col-md-6">
          <label for="senha_cliente" class="form-label">Senha:</label>
          <input type="password" class="form-control" id="senha_cliente" name="senha_cliente" placeholder="••••••••">
        </div>
      </div>

      <!-- Data de Nascimento, Telefone e Status -->
      <div class="row g-3">
        <div class="col-md-4">
          <label for="data_nasc_cliente" class="form-label">Data de Nascimento:</label>
          <input type="date" class="form-control" id="data_nasc_cliente" name="data_nasc_cliente" value="<?= $cliente['data_nasc_cliente'] ?>" required>
        </div>
        <div class="col-md-4">
          <label for="telefone_cliente" class="form-label">Telefone:</label>
          <input type="tel" class="form-control" id="telefone_cliente" name="telefone_cliente" value="<?= htmlspecialchars($cliente['telefone']) ?>" required>
        </div>
        <div class="col-md-4">
          <label for="status_cliente" class="form-label">Status:</label>
          <select class="form-control" id="status_cliente" name="status_cliente" required>
            <option value="Ativo" <?= ($cliente['status_cliente'] == 'Ativo') ? 'selected' : '' ?>>Ativo</option>
            <option value="Inativo" <?= ($cliente['status_cliente'] == 'Inativo') ? 'selected' : '' ?>>Inativo</option>
          </select>
        </div>
      </div>

  

      <!-- Estado -->
      <div class="row g-3 mt-2">
        <div class="col-md-4">
          <label for="id_uf" class="form-label">Estado:</label>
          <select class="form-select" id="id_uf" name="id_uf" required>
            <option value="">Selecione</option>
            <?php foreach ($estados as $linha): ?>
              <option value="<?= $linha['id_uf'] ?>" <?= ($cliente['id_uf'] == $linha['id_uf']) ? 'selected' : '' ?>>
                <?= $linha['nome_uf'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Botões -->
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-secondary">Cancelar</button>
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
                let file = arquivo.files[0];

                if (!file.type.startsWith("image/")) {
                    alert("Por favor, selecione um arquivo de imagem válido!");
                    return;
                }

                let reader = new FileReader();
                reader.onload = function(e) {
                    visualizarImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>