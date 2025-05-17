<!DOCTYPE html>
<html lang="pt-br">

<head>
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

            <!-- start slider section -->
            <?php require_once('template/banner.php'); ?>

            <!-- end slider section -->

            <!-- service -->
            <?php require_once('template/nosso_servico.php'); ?>

            <!-- end service -->
            <!-- about -->
            <?php require_once('template/sobre_nos.php'); ?>

            <!-- end about -->
            <!-- pricing -->
            <?php require_once('template/tabela.php'); ?>


            <!-- end Pricing -->
            <!-- our barbers -->
            <!-- section -->
            <?php require_once('template/equipe.php'); ?>

            <!-- end our barbers -->
            <!-- contact -->
            <?php require_once('template/contato.php'); ?>
        </div>


        <?php require_once('template/rodape.php'); ?>




        <div class="overlay"></div>
        <!-- Javascript files-->
        <script src="<?= BASE_URL ?>assets/js/jquery.min.js"></script>
        <script src="<?= BASE_URL ?>assets/js/popper.min.js"></script>
        <script src="<?= BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?= BASE_URL ?>assets/js/owl.carousel.min.js"></script>


        <script src="<?= BASE_URL ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

        <script src="<?= BASE_URL ?>assets/js/jquery-3.0.0.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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


        <!-- Swiper JS -->

        <script src="<?= BASE_URL ?>assets/js/custom.js"></script>

        <?php if (isset($_SESSION['login-erro'])): ?>
            <div class="erro"><?php echo $_SESSION['login-erro']; ?></div>
            <?php unset($_SESSION['login-erro']); ?>
        <?php endif; ?>

        <?php if (isset($_GET['login-erro'])): ?>
            <script>
                $(document).ready(function() {
                    $('#modalLogin').modal('show');
                });
            </script>

        <?php endif; ?>

        <style>
            #owl-demo .item {
                margin: 3px;
            }

            #owl-demo .item img {
                display: block;
                width: 100%;
                height: auto;
            }
        </style>

        <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    margin: 10,
                    nav: true,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                })
            })
        </script>

</body>

</html>