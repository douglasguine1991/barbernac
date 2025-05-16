<!DOCTYPE html>
<html lang="pt-br">

<head>
     <?php require_once('template/head.php'); ?></head>

<body class="main-layout">
    <div class="wrapper">
        <?php require_once('template/topo.php'); ?>

        <div class="yellow_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Nossos Serviços Exclusivos</h2>
                            <p>Qualidade e tradição em cada detalhe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- service -->
        <div id="service" class="service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ourheading">
                            <h2>Conheça Nossos<strong class="white"> Serviços</strong></h2>
                            <p>Todos os serviços realizados com produtos premium e técnicas especializadas</p>
                        </div>
                    </div>
                </div>

                <div class="owl-carousel owl-theme mt-5">
                    <?php foreach ($servicos as $servico): ?>
                        <div class="item">
                            <div class="service_box">
                                <figure>
                                    <?php
                                    $foto = 'sem-foto-servico.png';
                                    $nomeArquivo = $servico['foto_galeria'];
                                    $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/barbernac/public/uploads/servico/" . $nomeArquivo;

                                    if (!empty($nomeArquivo) && file_exists($caminhoArquivo)) {
                                        $foto = $nomeArquivo;
                                    }

                                    $urlImagem = BASE_URL . "public/uploads/servico/" . htmlspecialchars($foto, ENT_QUOTES, 'UTF-8');
                                    ?>
                                    <img src="<?php echo $urlImagem; ?>" alt="<?php echo htmlspecialchars($servico['nome_servico'], ENT_QUOTES, 'UTF-8'); ?>">
                                </figure>
                                <h3><?php echo htmlspecialchars($servico['nome_servico'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                <p><?php echo htmlspecialchars($servico['descricao_servico'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 text-center">
                        <a href="<?= BASE_URL ?>pricing.html" class="btn btn-primary btn-lg">Ver Tabela de Preços</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end service -->

    <?php require_once('template/rodape.php'); ?>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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




    <!-- Depois disso, seu script customizado -->
    <script src="URL_DO_SEU/custom.js">
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });
    </script>

    <style>
        .service_box {
            padding: 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
            height: 100%;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .service_box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .service_box h3 {
            color: #333;
            margin-top: 15px;
            font-size: 1.5rem;
        }

        .btn-primary {
            background-color:rgb(10, 190, 235);
            border-color:rgb(7, 198, 231);
            color: #333;
            padding: 12px 30px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color:rgb(7, 204, 230);
            border-color:rgb(10, 184, 228);
        }
    </style>
</body>

</html>