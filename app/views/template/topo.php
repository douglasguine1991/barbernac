<!-- Sidebar -->
<div class="sidebar">
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fa fa-arrow-left"></i>
        </div>
        <ul class="list-unstyled components">
            <li class="active"><a href="<?= BASE_URL ?>home">Início</a></li>
            <li><a href="<?= BASE_URL ?>sobre">Sobre Nós</a></li>
            <li><a href="<?= BASE_URL ?>servico">Serviços</a></li>
            <li><a href="<?= BASE_URL ?>precos">Preços</a></li>
            <li><a href="<?= BASE_URL ?>barbeiros">Nossos Barbeiros</a></li>
            <li><a href="<?= BASE_URL ?>contato">Contato</a></li>
        </ul>
    </nav>
</div>

<!-- Overlay -->
<div class="overlay"></div>

<!-- Conteúdo Principal -->
<div id="content">
    <header>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="full">
                        <a class="logo" href="<?= BASE_URL ?>home">
                            <img src="<?= BASE_URL ?>assets/img/logo1.png" alt="Barbearia Corte & Estilo" />
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="right_header_info">
                        <ul class="d-flex align-items-center justify-content-end">
                            <li class="button_user">
                                <a class="button" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</a>
                            </li>
                            <li>
                                <button type="button" id="sidebarCollapse" class="btn btn-dark ms-3">
                                    MENU
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>




<script src="<?php echo BASE_URL . 'assets/js/jquery.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/popper.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/bootstrap.bundle.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/owl.carousel.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/custom.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/jquery.mCustomScrollbar.concat.min.js'; ?>"></script>