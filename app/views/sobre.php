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
    <meta name="keywords" content="barbearia, sobre, história, equipe, valores">
    <meta name="description" content="Conheça a história da Barbearia Corte & Estilo, nossa equipe e nossos valores de excelência em serviços masculinos.">
    <meta name="author" content="Corte & Estilo">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
    <!-- owl css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <!-- responsive-->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body class="main-layout">
    <!-- loader  -->


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

        <!-- about -->
        <div id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="about_box">
                            <span>Bem-vindo à Barbearia Corte & Estilo</span>
                            <h2>Sobre<strong class="white"> Nós</strong></h2>
                            <p>Fundada em 2015 pelo barbeiro Carlos Mendes, a Barbearia Corte & Estilo nasceu da paixão por transformar cuidados pessoais em uma experiência premium para homens. Começamos como uma pequena barbearia de bairro e hoje somos referência em São Paulo, com uma equipe de 8 profissionais especializados.</p>

                            <h3>Nossa Filosofia</h3>
                            <p>Acreditamos que um bom corte de cabelo e barba vai além da estética - é sobre confiança, autoestima e identidade. Por isso, dedicamos tempo para entender as necessidades de cada cliente, oferecendo consultoria de estilo personalizada.</p>

                            <h3>Diferenciais</h3>
                            <ul>
                                <li>Produtos de alta qualidade importados</li>
                                <li>Equipe com mais de 50 anos de experiência combinada</li>
                                <li>Ambiente exclusivo e aconchegante</li>
                                <li>Técnicas tradicionais combinadas com as últimas tendências</li>
                            </ul>
                            <a href="barbers.html">Conheça nossa equipe</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="about_img">
                            <figure><img src="<?= BASE_URL ?>assets/img/about_img.png" alt="Interior da Barbearia Corte & Estilo" /></figure>
                            <div class="about_extra">
                                <h3>Nossos Valores</h3>
                                <p><strong>Excelência:</strong> Buscamos a perfeição em cada detalhe</p>
                                <p><strong>Tradição:</strong> Respeitamos as técnicas clássicas da barbearia</p>
                                <p><strong>Inovação:</strong> Estamos sempre atualizados com as últimas tendências</p>
                                <p><strong>Atendimento:</strong> Relacionamento personalizado com cada cliente</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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