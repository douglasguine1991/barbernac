<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once('template/head.php'); ?>
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
                            <h2>Nossos Preços</h2>
                            <p>Qualidade premium por um preço justo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pricing -->
        <div class="pricing">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ourheading">
                            <h2>Tabela de<strong class="white"> Preços</strong></h2>
                            <p>Confira nossos valores competitivos para serviços de primeira qualidade</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mar_bottom">
                        <div class="pricing_img">
                            <figure><img src="<?= BASE_URL ?>assets/img/vvv.png" alt="Ferramentas de barbeiro" /></figure>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 pad_left">
                        <div class="pricing_box">
                            <div class="price_tables">
                                <div class="price_column">
                                    <h3>Cortes de Cabelo</h3>
                                    <ul>
                                        <li><span class="float-left">Corte Social</span><span class="float-right">R$ 60</span></li>
                                        <li><span class="float-left">Degradê</span><span class="float-right">R$ 70</span></li>
                                        <li><span class="float-left">Máquina Zero</span><span class="float-right">R$ 50</span></li>
                                        <li><span class="float-left">Corte Infantil</span><span class="float-right">R$ 45</span></li>
                                        <li><span class="float-left">Corte + Lavagem</span><span class="float-right">R$ 80</span></li>
                                    </ul>
                                </div>

                                <div class="price_column">
                                    <h3>Barba e Tratamentos</h3>
                                    <ul>
                                        <li><span class="float-left">Barba Completa</span><span class="float-right">R$ 45</span></li>
                                        <li><span class="float-left">Acabamento de Barba</span><span class="float-right">R$ 30</span></li>
                                        <li><span class="float-left">Hidratação Capilar</span><span class="float-right">R$ 40</span></li>
                                        <li><span class="float-left">Pigmentação de Barba</span><span class="float-right">R$ 80</span></li>
                                        <li><span class="float-left">Tratamento Calvície</span><span class="float-right">R$ 120</span></li>
                                    </ul>
                                </div>

                                <div class="price_column">
                                    <h3>Pacotes</h3>
                                    <ul>
                                        <li><span class="float-left">Corte + Barba</span><span class="float-right">R$ 90</span></li>
                                        <li><span class="float-left">Pacote Completo</span><span class="float-right">R$ 150</span></li>
                                        <li><span class="float-left">Mensalidade*</span><span class="float-right">R$ 250</span></li>
                                        <li><small>* 4 cortes por mês</small></li>
                                    </ul>
                                </div>
                            </div>
                            <a href="contact.html" class="btn_agendar">Agendar Serviço</a>
                        </div>
                    </div>
                </div>

                <div class="opening">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ourheading">
                                    <h2>Horário de<strong class="white"> Funcionamento</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="opening_bg">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="times">
                                        <ul>
                                            <li><span>Segunda-feira</span><span class="float-right">9:00 <strong class="bbbb">19:00</strong></span></li>
                                            <li><span>Terça-feira</span><span class="float-right">9:00 <strong class="bbbb">19:00</strong></span></li>
                                            <li><span>Quarta-feira</span><span class="float-right">9:00 <strong class="bbbb">19:00</strong></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="times">
                                        <ul>
                                            <li><span>Quinta-feira</span><span class="float-right">9:00 <strong class="bbbb">19:00</strong></span></li>
                                            <li><span>Sexta-feira</span><span class="float-right">9:00 <strong class="bbbb">20:00</strong></span></li>
                                            <li><span>Sábado</span><span class="float-right">9:00 <strong class="bbbb">18:00</strong></span></li>
                                            <li><span>Domingo</span><span class="float-right">Fechado</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="promo_box">
                                        <h3>Promoções Especiais</h3>
                                        <p><strong>Quarta do Degradê:</strong> Todos os cortes degradê por R$ 60</p>
                                        <p><strong>Aniversariante:</strong> 20% de desconto no mês do seu aniversário*</p>
                                        <small>*Apresentar documento com data de nascimento</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end pricing -->

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

        .price_tables {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .price_column {
            flex: 1;
            min-width: 200px;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }

        .price_column h3 {
            color: #333;
            border-bottom: 2px solid #ffc107;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .price_column ul {
            list-style: none;
            padding: 0;
        }

        .price_column li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .btn_agendar {
            display: inline-block;
            background: rgb(5, 183, 228);
            color: #333;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 20px;
        }

        .btn_agendar:hover {
            background: #e0a800;
            text-decoration: none;
        }

        .promo_box {
            background: rgb(245, 245, 245);
            padding: 20px;
            border-radius: 5px;
            color: #333;
        }

        .promo_box h3 {
            margin-bottom: 15px;
        }
    </style>
</body>

</html>