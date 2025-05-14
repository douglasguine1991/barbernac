<form method="POST" action="<?= BASE_URL ?>depoimento/adicionar">
  <div class="container my-5">
    <div class="row">
      <!-- Coluna para Formulário -->
      <div class="col-md-12">
        
        <!-- Nome do Cliente -->
        <div class="mb-3">
          <label for="nome_cliente" class="form-label">Nome do Cliente:</label>
          <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" placeholder="Digite o nome do cliente" required>
        </div>

        <!-- Descrição do Depoimento -->
        <div class="mb-3">
          <label for="descricao_depoimento" class="form-label">Depoimento:</label>
          <textarea class="form-control" id="descricao_depoimento" name="descricao_depoimento" rows="5" placeholder="Digite o depoimento" required></textarea>
        </div>

        <!-- Nota do Depoimento -->
        <div class="mb-3">
          <label for="nota_depoimento" class="form-label">Nota do Depoimento:</label>
          <select class="form-control" id="nota_depoimento" name="nota_depoimento" required>
            <option value="">Selecione a nota</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>

        <!-- Status do Depoimento -->
        <div class="mb-3">
          <label for="status_depoimento" class="form-label">Status do Depoimento:</label>
          <select class="form-control" id="status_depoimento" name="status_depoimento" required>
            <option value="Aprovado">Aprovado</option>
            <option value="Pendente">Pendente</option>
          </select>
        </div>

        <!-- ID do Cliente (campo oculto) -->
        
        
        <!-- Botões -->
        <div class="mt-4 text-end">
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="button" class="btn btn-secondary">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>
