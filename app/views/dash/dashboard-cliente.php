<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= BASE_URL ?>vendors/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>vendors/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard - BarberNac</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?= BASE_URL ?>vendors/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>vendors/assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= BASE_URL ?>vendors/assets/css/demo.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet" />
</head>

<body>


    <style>
        body {
            background-color: #0a0f14;
            color: #f4f4f4;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background-color: rgba(28, 30, 34, 0.33);
            border: 1px solid #f0c674;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(240, 198, 116, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            backdrop-filter: blur(8px);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(240, 198, 116, 0.3);
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #f0c674;
            color: #f0c674;
        }

        .card-title {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .card-category {
            font-size: 0.875rem;
            color: #b9b9b9;
        }

        .legend i {
            margin-right: 5px;
        }

        .legend .text-info {
            color: #4fc3f7;
        }

        .legend .text-danger {
            color: #ef5350;
        }

        .legend .text-warning {
            color: #ffca28;
        }

        .card-footer {
            border-top: 1px solid #f0c674;
            color: #ccc;
            font-size: 0.85rem;
        }

        .stats i {
            color: #f0c674;
            margin-right: 5px;
        }

        .form-check-input:checked {
            background-color: #f0c674;
            border-color: #f0c674;
        }

        .btn-info,
        .btn-danger {
            background-color: #1c1e22;
            border: 1px solid #f0c674;
            color: #f0c674;
            transition: background-color 0.2s, color 0.2s;
        }

        .btn-info:hover,
        .btn-danger:hover {
            background-color: #f0c674;
            color: #1c1e22;
        }

        hr {
            border-top: 1px solid #444;
        }

        .navbar,
        .footer {
            background-color: #111;
            border-bottom: 1px solid #2c2c2c;
        }

        .navbar-brand,
        .navbar-nav .nav-link,
        .footer a {
            color: #f0c674 !important;
        }

        .navbar-nav .nav-link:hover,
        .footer a:hover {
            color: #ffffff !important;
        }

        .sidebar {
            background: linear-gradient(180deg, #121212 0%, #1d1d1d 100%);
        }

        .sidebar-wrapper .nav li a {
            color: #cccccc;
            transition: color 0.3s;
        }

        .sidebar-wrapper .nav li.active a,
        .sidebar-wrapper .nav li a:hover {
            color: #f0c674;
        }

        .logo a {
            color: #f0c674;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(240, 198, 116, 0.3);
        }
    </style>

    <!-- Conteúdo permanece igual (cards, tabelas etc.) -->
    <!-- Insira aqui o mesmo HTML que você já tem acima (sem alterar o conteúdo da estrutura). -->


    <div class="wrapper">
        <div class="sidebar" data-image="<?= BASE_URL ?>/assets/img/hero-bg2.jpg">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        BarberNac
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= BASE_URL ?>dashboard">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= BASE_URL ?>cliente/listar">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= BASE_URL ?>funcionarios/listar">
                            <i class="nc-icon nc-notes"></i>
                            <p>Funcionarios</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= BASE_URL ?>servico/listar">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Serviços</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= BASE_URL ?>depoimento/listar">
                            <i class="nc-icon nc-atom"></i>
                            <p>Depoimento</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./maps.html">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./notifications.html">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel" style="background-image: url(<?= BASE_URL ?>/assets/img/bg1.png); background-size:cover; background-position:center; background-repeat:no-repeat;">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= BASE_URL ?>dashboard"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">

                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Account</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <!-- Conteúdo -->

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">2017 Sales</h4>
                                    <p class="card-category">All products including Taxes</p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartActivity" class="ct-chart"></div>
                                </div>
                                <div class="card-footer ">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Tesla Model S
                                        <i class="fa fa-circle text-danger"></i> BMW 5 Series
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card  card-tasks">
                                <div class="card-header ">
                                    <h4 class="card-title">Tasks</h4>
                                    <p class="card-category">Backend development</p>
                                </div>
                                <div class="card-body ">
                                    <div class="table-full-width">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" checked>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Read "Following makes Medium better"</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" disabled>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Unfollow 5 enemies from twitter</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?php

                            if (isset($conteudo)) {
                                $this->carregarViews($conteudo, $dados);
                            } else {
                                echo ' <h2> Bem-vindo ao Dashboard! </h2>';
                            }


                            ?>


                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>


</body>
<!--   Core JS Files   -->
<script src="<?= BASE_URL ?>vendors/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?= BASE_URL ?>vendors/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?= BASE_URL ?>vendors/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?= BASE_URL ?>vendors/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="<?= BASE_URL ?>vendors/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?= BASE_URL ?>vendors/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?= BASE_URL ?>vendors/assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= BASE_URL ?>vendors/assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function abrirModalDesativar(idServico) {

        if ($('#modalDesativar').hasClass('show')) {
            return;
        }

        document.getElementById('idServicoDesativar').value = idServico;

        $('#modalDesativar').modal('show');
    }

    document.getElementById('btnConfirmar').addEventListener('click', function() {
        const idServico = document.getElementById('idServicoDesativar').value;
        // console.log(idServico);

        if (idServico) {
            desativarServico(idServico);
        }
    });

    function desativarServico(idServico) {

        fetch(`<?= BASE_URL ?>servicos/desativar/${idServico}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                // Se o código de resposta NÂO for ok, lança um erro
                if (!response.ok) {
                    throw new Error(`Erro HTTP: ${response.status}`);
                    console.log("Erro -");
                }
                return response.json();
            })
            .then(data => {
                // Se a resposta do servidor for OK, feche e carrega e atualiza a lista
                if (data.sucesso) {
                    console.log("Serviço desativado com sucesso")
                    $('#modalDesativar').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }), 500;
                } else {
                    alert(data.mensagem || "Ocorreu um erro ao desativar o serviço");
                }
            })
            .catch(erro => {
                console.error('Erro', erro);
                alert('Erro na requisição.')
            })

    }
</script>


</body>


</html>