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
    <meta name="keywords" content="contato barbearia, agendamento, localização, horário barbearia">
    <meta name="description" content="Entre em contato com a Barbearia Corte & Estilo para agendamentos e informações. Estamos prontos para atender você.">
    <meta name="author" content="Barbearia Corte & Estilo">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?php echo BASE_URL .'assets/css/bootstrap.min.css'; ?>">
    <!-- owl css -->
    <link rel="stylesheet" href="<?php echo BASE_URL .'assets/css/owl.carousel.min.css'; ?>">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo BASE_URL .'assets/css/style.css'; ?>">
    <!-- responsive-->
    <link rel="stylesheet" href="<?php echo BASE_URL .'assets/css/responsive.css'; ?>">
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
                                <h2>Fale Conosco</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- contact -->
            <div id="contact" class="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <h2>Agende seu<strong class="white"> Horário</strong></h2>
                                <p>Preencha o formulário abaixo e entraremos em contato para confirmar seu agendamento</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <form class="main_form">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Seu Nome" type="text" name="Nome" required>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Telefone" type="tel" name="Telefone" required>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Email" type="email" name="Email" required>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <select class="form-control" name="Servico" required>
                                            <option value="">Selecione o serviço</option>
                                            <option value="Corte de Cabelo">Corte de Cabelo</option>
                                            <option value="Barba">Barba</option>
                                            <option value="Corte + Barba">Corte + Barba</option>
                                            <option value="Pigmentação">Pigmentação de Barba</option>
                                            <option value="Tratamento">Tratamento Capilar</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Data" type="date" name="Data" required>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="textarea" placeholder="Mensagem (opcional)" name="Mensagem"></textarea>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <button class="send">Enviar Agendamento</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="contact_info">
                                <h3>Informações de Contato</h3>
                                <div class="info_item">
                                    <i class="fa fa-map-marker"></i>
                                    <h4>Endereço</h4>
                                    <p>Rua dos Barbeiros, 123 - Centro<br>São Paulo - SP</p>
                                </div>
                                <div class="info_item">
                                    <i class="fa fa-phone"></i>
                                    <h4>Telefone</h4>
                                    <p>(11) 98765-4321<br>(11) 2345-6789</p>
                                </div>
                                <div class="info_item">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Email</h4>
                                    <p>contato@corteestilo.com<br>agendamentos@corteestilo.com</p>
                                </div>
                                <div class="info_item">
                                    <i class="fa fa-clock-o"></i>
                                    <h4>Horário de Funcionamento</h4>
                                    <p>Segunda a Sexta: 9h às 19h<br>Sábado: 9h às 18h<br>Domingo: Fechado</p>
                                </div>
                                <div class="social_icons">
                                    <h4>Nos siga nas redes sociais</h4>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-md-12">
                            <div class="map_container">
                                <h3>Nossa Localização</h3>
                                <div class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.0754267452926!2d-46.65342658440771!3d-23.565734367638352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8da0aa315%3A0xd59f9431f2c9776a!2sAv.%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1620000000000!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


        <style>
            #owl-demo .item {
                margin: 3px;
            }
            
            #owl-demo .item img {
                display: block;
                width: 100%;
                height: auto;
            }
            
            .contact_info {
                background: #f8f9fa;
                padding: 30px;
                border-radius: 5px;
                height: 100%;
            }
            
            .info_item {
                margin-bottom: 25px;
            }
            
            .info_item i {
                font-size: 24px;
                color: #ffc107;
                margin-right: 15px;
            }
            
            .social_icons {
                margin-top: 30px;
            }
            
            .social_icons a {
                display: inline-block;
                margin-right: 15px;
                font-size: 24px;
                color: #333;
            }
            
            .map_container {
                margin-top: 50px;
            }
            
            .map_container h3 {
                margin-bottom: 20px;
                text-align: center;
            }
        </style>
</body>
</html>