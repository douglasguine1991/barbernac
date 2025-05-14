<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>BarberNac</title>
    <meta name="keywords" content="barbearia, corte de cabelo, barba, estilo masculino, tratamento capilar">
    <meta name="description" content="A Barbearia Corte & Estilo oferece serviços premium de cuidados masculinos com profissionais qualificados e ambiente exclusivo.">
    <meta name="author" content="Corte & Estilo">
    <!-- bootstrap css -->
    <!-- <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css"> -->
    <!-- owl css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <!-- responsive-->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="main-layout">
  
<div class="wrapper">
        <!-- end loader -->
        <?php require_once('template/topo.php'); ?>
            <!-- end header -->

            <!-- start slider section -->
            <?php require_once('template/banner.php'); ?>

            <!-- end slider section -->

            <!-- about -->
            <?php require_once('template/sobre_nos.php'); ?>

            <!-- end about -->
            <!-- service -->
            <?php require_once('template/nosso_servico.php'); ?>

            <!-- end service -->
            <!-- pricing -->
            <?php require_once('template/tabela.php'); ?>


            <!-- end Pricing -->

                </div>

                <!-- our barbers -->
                <!-- section -->
                <?php require_once('template/equipe.php'); ?>

                <!-- end our barbers -->
                <!-- contact -->
                <?php require_once('template/contato.php'); ?>

                <!-- end contact -->
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

            <?php echo ($_GET['login-erro']); ?>

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