<form method="POST" action="<?= BASE_URL ?>servicos/adicionar" enctype="multipart/form-data">

<div class="container my-5">

  <div class="row">
    <div class="col-md-4">
      <img src="<?= BASE_URL ?>uploads/barba.png" alt="barbernac Logo" class="img-fluid" id="preview-img" style="width:100%; cursor:pointer;">
      <input type="file" name="foto_galeria" id="foto_galeria" style="display: none;" accept="image/*">
    </div>

    <div class="col-md-8">

      <div class="mb-3">
        <label for="nome_servico" class="form-label">Nome do Serviço:</label>
        <input type="text" class="form-control" id="nome_servico" name="nome_servico" placeholder="Digite o nome do serviço" required>
      </div>

      <div class="mb-3">
        <label for="descricao_servico" class="form-label">Descrição do Serviço:</label>
        <textarea class="form-control" id="descricao_servico" name="descricao_servico" rows="3" placeholder="Digite a descrição do serviço" required></textarea>
      </div>

      <div class="row g-3">
        <div class="col-md-4">
          <label for="preco_base_servico" class="form-label">Preço Base:</label>
          <input type="text" class="form-control" id="preco_base_servico" name="preco_base_servico"  placeholder="R$" required>
        </div>
        <div class="col-md-4">
          <label for="tempo_estimado_servico" class="form-label">Tempo Estimado:</label>
          <input type="time" class="form-control" id="tempo_estimado_servico" name="tempo_estimado_servico">
        </div>
        <div class="col-md-4">
          <label for="status_servico" class="form-label">Status do Serviço:</label>
          <select class="form-select" id="status_servico" name="status_servico">
            <option selected>Ativo</option>
            <option>Inativo</option>
          </select>
        </div>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-secondary">Cancelar</button>
      </div>

    </div>
  </div>
</div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const visualizarImg = document.getElementById('preview-img');
  const arquivo = document.getElementById('foto_galeria');

  visualizarImg.addEventListener('click', function () {
    arquivo.click();
  });

  arquivo.addEventListener('change', function () {
    if (arquivo.files && arquivo.files[0]) {
      let render = new FileReader();
      render.onload = function (e) {
        visualizarImg.src = e.target.result;
      }
      render.readAsDataURL(arquivo.files[0]);
    }
  });
});
</script>
