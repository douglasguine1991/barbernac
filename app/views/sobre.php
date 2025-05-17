<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- basic -->
    <?php require_once('template/head.php'); ?>
</head>

<body class="main-layout" id="conteudo">

   <div id="preloader">
        <div class="loader"></div>
    </div>


    <div class="wrapper">
        <!-- end loader -->
        <?php require_once('template/topo.php'); ?>
        <!-- end header -->

        <div class="yellow_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Nossa História</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="about" class="about-section py-5">
            <div class="container">
                <div class="row align-items-center gy-5">
                    <!-- Texto -->
                    <div class="col-lg-6">
                        <div class="about-content">
                            <span class="section-subtitle">Bem-vindo à Barbearia Corte & Estilo</span>
                            <h2 class="section-title">Sobre <strong class="highlight">Nós</strong></h2>
                            <p>Fundada em 2015 pelo barbeiro Carlos Mendes, a Barbearia Corte & Estilo nasceu da paixão por transformar cuidados pessoais em uma experiência premium para homens. Começamos como uma pequena barbearia de bairro e hoje somos referência em São Paulo, com uma equipe de 8 profissionais especializados.</p>

                            <h3 class="section-heading">Nossa Filosofia</h3>
                            <p>Acreditamos que um bom corte de cabelo e barba vai além da estética — é sobre confiança, autoestima e identidade. Por isso, dedicamos tempo para entender as necessidades de cada cliente, oferecendo consultoria de estilo personalizada.</p>

                            <h3 class="section-heading">Diferenciais</h3>
                            <ul class="features-list">
                                <li>Produtos de alta qualidade importados</li>
                                <li>Equipe com mais de 50 anos de experiência combinada</li>
                                <li>Ambiente exclusivo e aconchegante</li>
                                <li>Técnicas tradicionais combinadas com as últimas tendências</li>
                            </ul>

                            <a href="barbers.html" class="btn btn-outline-light mt-3">Conheça nossa equipe</a>
                        </div>
                    </div>

                    <!-- Vídeo e Valores -->
                    <div class="col-lg-6">
                        <div class="about-media position-relative">
                            <figure class="about-image rounded shadow-sm overflow-hidden">
                                <video src="assets/img/sobre.mp4" autoplay loop muted playsinline></video>
                            </figure>
                            <div class="about-extra bg-dark text-light p-4 rounded shadow-sm mt-4">
                                <h3 class="section-heading text-warning">Nossos Valores</h3>
                                <p><strong>Excelência:</strong> Buscamos a perfeição em cada detalhe</p>
                                <p><strong>Tradição:</strong> Respeitamos as técnicas clássicas da barbearia</p>
                                <p><strong>Inovação:</strong> Estamos sempre atualizados com as últimas tendências</p>
                                <p><strong>Atendimento:</strong> Relacionamento personalizado com cada cliente</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- end about -->

        <!-- footer -->
        <?php require_once('template/rodape.php'); ?>
        <!-- end footer -->
    </div>

    <div class="overlay"></div>
    <!-- Javascript files-->
    <script src="<?= BASE_URL ?>assets/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/owl.carousel.min.js"></script>

    <script src="<?= BASE_URL ?>assets/js/custom.js"></script>
    <script src="<?= BASE_URL ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="<?= BASE_URL ?>assets/js/jquery-3.0.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

</body>

</html>