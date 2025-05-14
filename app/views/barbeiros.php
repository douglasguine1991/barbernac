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
    <meta name="keywords" content="barbeiros profissionais, equipe barbearia, especialistas em corte, barba designer">
    <meta name="description" content="Conheça nossa equipe de barbeiros profissionais na Barbearia Corte & Estilo. Especialistas em cortes modernos e cuidados masculinos.">
    <meta name="author" content="Barbearia Corte & Estilo">
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
                                <h2>Nossa Equipe de Especialistas</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- nossos barbeiros -->
            <section class="resip_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ourheading" style="margin-bottom: 30px;">
                                <h2>Conheça<strong class="white"> Nossos Barbeiros</strong></h2>
                                <span>Profissionais qualificados prontos para oferecer o melhor serviço</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme">

                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/1.png" alt="Carlos Mendes - Especialista em Barbas" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Carlos Mendes</h3>
                                        <h4>Especialista em Barbas</h4>
                                        <p>10 anos de experiência</p>
                                        <p class="bio">Mestre no design de barbas e técnicas tradicionais com navalha. Formado pela Academia Brasileira de Barbeiros.</p>
                                        <div class="social_icons">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/2.png" alt="Rafael Costa - Mestre em Cortes" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Rafael Costa</h3>
                                        <h4>Mestre em Cortes</h4>
                                        <p>8 anos de experiência</p>
                                        <p class="bio">Especialista em cortes modernos e técnicas de degradê. Participou de workshops internacionais em Milão.</p>
                                        <div class="social_icons">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="thiago.png" alt="Thiago Silva - Colorista" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Thiago Silva</h3>
                                        <h4>Especialista em Colorização</h4>
                                        <p>6 anos de experiência</p>
                                        <p class="bio">Expert em coloração masculina, pigmentação de barbas e tratamentos capilares avançados.</p>
                                        <div class="social_icons">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-half-o"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/1.png" alt="Lucas Oliveira - Barbeiro Sênior" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Lucas Oliveira</h3>
                                        <h4>Barbeiro Sênior</h4>
                                        <p>12 anos de experiência</p>
                                        <p class="bio">Mestre em cortes clássicos e tradicionais. Herdou as técnicas de seu avô, barbeiro desde os anos 50.</p>
                                        <div class="social_icons">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/2.png" alt="Marcos Rocha - Especialista em Estilos" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Marcos Rocha</h3>
                                        <h4>Especialista em Estilos</h4>
                                        <p>7 anos de experiência</p>
                                        <p class="bio">Consultor de imagem masculina, cria looks personalizados para cada tipo de rosto e personalidade.</p>
                                        <div class="social_icons">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="images/3.png" alt="Eduardo Lima - Cabeleireiro" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Eduardo Lima</h3>
                                        <h4>Especialista em Tratamentos</h4>
                                        <p>5 anos de experiência</p>
                                        <p class="bio">Expert em terapias capilares, calvície masculina e cuidados com o couro cabeludo.</p>
                                        <div class="social_icons">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-half-o"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-md-12">
                            <div class="team_description">
                                <h3>Nossa Filosofia de Trabalho</h3>
                                <p>Na Barbearia Corte & Estilo, cada barbeiro passa por um rigoroso processo seletivo e treinamento contínuo. Nossos profissionais participam anualmente de workshops e eventos internacionais para trazer as últimas tendências e técnicas para você. Acreditamos que um bom barbeiro não apenas corta cabelo, mas entende de anatomia facial, tendências de moda e, principalmente, sabe ouvir o cliente.</p>
                                <a href="contact.html" class="btn btn-primary">Agende com seu barbeiro preferido</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end nossos barbeiros -->

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


        <style>
            #owl-demo .item {
                margin: 3px;
            }
            
            #owl-demo .item img {
                display: block;
                width: 100%;
                height: auto;
            }
            
            .product_blog_cont .bio {
                font-size: 14px;
                margin-top: 10px;
                color: #666;
            }
            
            .checked {
                color: #ffc107;
            }
            
            .team_description {
                background: #f8f9fa;
                padding: 30px;
                border-radius: 5px;
                margin-bottom: 30px;
            }
            
            .team_description h3 {
                margin-bottom: 20px;
                color: #333;
            }
        </style>

        <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    margin: 20,
                    nav: true,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
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