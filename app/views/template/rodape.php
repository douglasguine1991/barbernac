<!-- footer -->
<footer>
                    <div class="footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="footer_logo">
                                        <a href="index.html"><img src="<?= BASE_URL ?>assets/img/logo1.png" alt="Barbearia Corte & Estilo" /></a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="address">
                                        <h3>Endereço</h3>
                                        <p>
                                            Rua dos Barbeiros, 123 - Centro<br>
                                            São Paulo - SP<br>
                                            Telefone: (11) 98765-4321<br>
                                            Email: contato@corteestilo.com</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="lik">

                                        <li> <img src="<?= BASE_URL ?>assets/img/fb.png" alt="Facebook" /></li>
                                        <li> <img src="<?= BASE_URL ?>assets/img/tw.png" alt="Twitter" /></li>
                                        <li> <img src="<?= BASE_URL ?>assets/img/you.png" alt="YouTube" /></li>
                                        <li> <img src="<?= BASE_URL ?>assets/img/ig.png" alt="Instagram" /></li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="copyright">
                            <div class="container">
                                <p>© 2023 Barbearia Corte & Estilo. Todos os direitos reservados.</p>
                            </div>
                        </div>
                    </div>

                </footer>
                <!-- end footer -->


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