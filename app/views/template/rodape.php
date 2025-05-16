<!-- Rodapé -->
<footer class="footer">
  <div class="container">
    <div class="row gy-5">
      <!-- Coluna 1: Logo -->
      <div class="col-md-4">
        <div class="footer_logo mb-4">
          <a href="index.html">
            <img src="<?= BASE_URL ?>assets/img/logo1.png" alt="Barbearia Corte & Estilo" class="img-fluid" />
          </a>
        </div>
        <p class="text-light">Tradição, estilo e cuidado para valorizar sua identidade. Agende seu horário e viva a experiência Corte & Estilo.</p>
      </div>

      <!-- Coluna 2: Endereço -->
      <div class="col-md-4">
        <div class="address">
          <h3 class="mb-3">Endereço</h3>
          <p>
            Rua dos Barbeiros, 123 - Centro<br>
            São Paulo - SP<br>
            Tel: (11) 98765-4321<br>
            Email: contato@corteestilo.com
          </p>
        </div>
      </div>

      <!-- Coluna 3: Redes Sociais -->
      <div class="col-md-4">
        <h3 class="mb-3">Siga-nos</h3>
        <ul class="social-icons list-unstyled d-flex gap-3">
          <li><a href="#"><img src="<?= BASE_URL ?>assets/img/fb.png" alt="Facebook" class="social-icon" /></a></li>
          <li><a href="#"><img src="<?= BASE_URL ?>assets/img/tw.png" alt="Twitter" class="social-icon" /></a></li>
          <li><a href="#"><img src="<?= BASE_URL ?>assets/img/you.png" alt="YouTube" class="social-icon" /></a></li>
          <li><a href="#"><img src="<?= BASE_URL ?>assets/img/ig.png" alt="Instagram" class="social-icon" /></a></li>
        </ul>
      </div>
    </div>

    <!-- Copyright -->
    <div class="copyright mt-5">
      <div class="text-center">
        <p>© 2023 Barbearia Corte & Estilo. Todos os direitos reservados.</p>
      </div>
    </div>
  </div>
</footer>


<!-- Modal -->
<div class="modal fade modalLogin" id="modalLogin" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel">Login - BarberNac</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <!-- Corpo do modal com o formulário -->
        <form method="POST" action="<?= BASE_URL ?>auth/login">
          <div class="modal-body">
            <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="senha">Senha:</label>
              <input type="password" name="senha" id="senha" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="tipo_usuario">Tipo de Usuário:</label>
              <select class="form-select" name="tipo_usuario" id="tipo_usuario" class="form-control" required>
                <option selected>Selecione</option>
                <option value="cliente">Cliente</option>
                <option value="funcionario">Funcionário</option>
              </select>
            </div>

            <?php if (isset($_GET['login-erro'])): ?>
              <div class="alert alert-danger">
                <?php echo "Preencha todos os dados"; ?>
              </div>
            <?php endif; ?>

          </div>
          <!-- Rodapé do modal com os botões -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>