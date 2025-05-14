<div class="sidebar">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fa fa-arrow-left"></i>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="<?php echo BASE_URL .'home'; ?>">Início</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL .'sobre'; ?>">Sobre Nós</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL .'servico'; ?>">Serviços</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL .'precos'; ?>">Preços</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL .'barbeiros'; ?>">Nossos Barbeiros</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL .'contato'; ?>">Contato</a>
            </li>
        </ul>
    </nav>
</div>

<div id="content">
    <!-- header -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="full">
                        <a class="logo" href="<?php echo BASE_URL .'home'; ?>">
                            <img src="<?= BASE_URL ?>assets/img/logo.png" alt="Barbearia Corte & Estilo" />
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="full">
                        <div class="right_header_info">
                            <ul>
                                <li class="dinone">
                                    <img style="margin-right: 15px;margin-left: 15px;" src="<?= BASE_URL ?>assets/img/phone_icon.png" alt="#">
                                    <a href="#">(11) 98765-4321</a>
                                </li>
                                <li class="dinone">
                                    <img style="margin-right: 15px;" src="<?= BASE_URL ?>assets/img/mail_icon.png" alt="#">
                                    <a href="#">contato@corteestilo.com</a>
                                </li>
                                <li class="button_user">
                                    <a class="button" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</a>
                                </li>
                                <li>
                                    <button type="button" id="sidebarCollapse">
                                        <a href="#">MENU</a>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
</div>
        <script src="<?php echo BASE_URL .'assets/js/jquery.min.js'; ?>"></script>
        <script src="<?php echo BASE_URL .'assets/js/popper.min.js'; ?>"></script>
        <script src="<?php echo BASE_URL .'assets/js/bootstrap.bundle.min.js'; ?>"></script>
        <script src="<?php echo BASE_URL .'assets/js/owl.carousel.min.js'; ?>"></script>
        <script src="<?php echo BASE_URL .'assets/js/custom.js'; ?>"></script>
        <script src="<?php echo BASE_URL .'assets/js/jquery.mCustomScrollbar.concat.min.js'; ?>"></script>