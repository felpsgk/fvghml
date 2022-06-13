<?php
//session_start();
include 'controller/verificaLogin.php';
switch ($_SESSION['perfil']) {
    case 'ENFERMEIROvis':
        echo '<style type="text/css">
        #cadMedico {
            display: none;
        }
        #updateMedico {
            display: none;
        }
            </style>';
        break;
    case 'ENFERMEIROadm':
        break;
    case 'TI':
        break;
    case 'ADMINISTRADOR':
        break;
    case 'MASTER':
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/black-tie/jquery-ui.css">
    <title>Página inicial</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Barra lateral -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color:#198754;" id="accordionSidebar">

            <!-- Sidebar - LOGO + Nome -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">FVG - Gerência</div>
            </a>

            <!-- divisor -->
            <hr class="sidebar-divisor bg-success my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- divisor -->
            <hr class="sidebar-divisor bg-success">

            <!-- Titulo opaco menu -->
            <div class="sidebar-heading">
                Registrar
            </div>

            <!-- Nav Item - Opcao opaco menu -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="escalaMedica.php">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Escala médica</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="presenca.php">
                    <i class="fas fa-fw fa-user-check"></i>
                    <span>Presentes hoje</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="atendimento.php">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Atendimentos</span></a>
            </li>
            <li id="cadMedico" class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#medicoModal">
                 <i class="fa-solid fa-address-card"></i>Cadastrar médico</a>
            </li>
            <!-- divisor -->
            <hr class="sidebar-divisor bg-success">

            <!-- AREA MARCIA -->
            <!-- Titulo opaco menu -->
            <div class="sidebar-heading">
                Gestão de dados
            </div>
            <li class="nav-item">
                <a class="nav-link" href="medicoRPA.php">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span>Médico RPA</span></a>
            </li>
            <!-- divisor -->
            <hr class="sidebar-divisor bg-success">

            <!-- divisor -->
            <hr class="sidebar-divisor d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divisor d-none d-sm-block">

                        </div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="img/undraw_profile.svg" width="40" height="40" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <h6 class="dropdown-header"><?php echo $_SESSION['usuario']; ?></h6>
                                <div class="dropdown-divider"></div>
                                <!--<a class="dropdown-item" href="#">Edit Profile</a>-->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Titulo opaco menu -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <form id="geraExcelAtendimento" action="controller/excel/geraExcelAtendimento.php" name="fromExcel" method="GET">

                            <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="col mt-2">
                                    <input type="text" required="" autocomplete="off" name="diaFim" id="diaFim" class="form-control shadow-sm" placeholder="Escolha a data final">
                                </div>
                                <div class="col mt-2">
                                    <input type="text" required="" autocomplete="off" name="diaInicio" id="diaInicio" class="form-control shadow-sm" placeholder="Escolha a data inicial">
                                </div>
                                <div class="col mt-2 d-flex justify-content-end">
                                    <input type="submit" name="export" id="geraExcel" value="Gerar Excel" style="background-color:#198754;" class="align-middle btn btn-sm mt-1 text-white shadow-sm"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $.datepicker.setDefaults({
                                dateFormat: 'yy-mm-dd'
                            })
                            $(function() {
                                $("#diaInicio").datepicker();
                                $("#diaFim").datepicker();
                            });
                        });
                        /*
					  $('#geraExcelAtendimento').on('submit', function(event) {
						event.preventDefault();

						var dataInicio = $("#diaInicio").val();
						var dataFim = $("#diaFim").val();

						$.ajax({
						  url: 'DAO/geraExcelAtendimento.php',
						  method: "GET",
						  data: {
							atualizar: dataInicio,
							att: dataFim
						  },
						  success: function(data) {
							window.open(url,'_blank' );
							alert("Relatório gerado com sucesso");
						  }

						})

					  })*/
                    </script>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Acionamentos/mês</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include 'controller/conexao.php';

                                                $sql = "select count(id) from 
                                                atendimento WHERE month(dia) = month(CURDATE())
                                                AND year(dia) = year(CURDATE())";

                                                $buscar = mysqli_query($strcon, $sql);
                                                while ($dados = mysqli_fetch_array($buscar)) {
                                                    $dadoos = $dados['count(id)'];
                                                }
                                                echo $dadoos;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-double fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Casos em análise/mês</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include 'controller/conexao.php';

                                                $sql = "select count(id) from atendimento 
                                                WHERE status = 'em analise' 
                                                AND month(dia) = month(CURDATE())
                                                AND year(dia) = year(CURDATE())";

                                                $buscar = mysqli_query($strcon, $sql);
                                                while ($dados = mysqli_fetch_array($buscar)) {
                                                    $dadoos = $dados['count(id)'];
                                                }
                                                echo $dadoos;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Casos paliativos/mês</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include 'controller/conexao.php';

                                                $sql = "select count(id) from atendimento 
                                                WHERE status = 'resolvido paliativo' 
                                                AND month(dia) = month(CURDATE())
                                                AND year(dia) = year(CURDATE())";

                                                $buscar = mysqli_query($strcon, $sql);
                                                while ($dados = mysqli_fetch_array($buscar)) {
                                                    $dadoos = $dados['count(id)'];
                                                }
                                                echo $dadoos;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-star-half-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Casos resolvidos/mês</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include 'controller/conexao.php';

                                                $sql = "select count(id) from atendimento 
                                                WHERE status = 'resolvido' 
                                                AND month(dia) = month(CURDATE())
                                                AND year(dia) = year(CURDATE())";

                                                $buscar = mysqli_query($strcon, $sql);
                                                while ($dados = mysqli_fetch_array($buscar)) {
                                                    $dadoos = $dados['count(id)'];
                                                }
                                                echo $dadoos;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-star fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- graficos de pizza -->
                        <div class="col">
                            <div class="card shadow mb-4">
                                <!-- cabeçalho card -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Sistemas em alta hoje</h6>
                                </div>
                                <!-- corpo card -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="sistHj"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">
                                <!-- cabeçalho card -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Erros em alta hoje</h6>
                                    <!-- graficos de pizza 
									<div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divisor"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- corpo Card -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="errHj"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">
                                <!-- cabeçalho card -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Médicos em alta hoje</h6>
                                    <!-- graficos de pizza 
									<div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divisor"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- corpo card -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="medHj"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <!-- cabeçalho card -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Atendimentos por dia nos últimos 7 dias</h6>
                                    <!-- 3 pontinhos opções
									<div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- corpo card -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class="">
                                                </div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class="">
                                                </div>
                                            </div>
                                        </div>
                                        <canvas id="semanal" style="display: block; width: 661px; height: 320px;" width="661" height="320" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example 
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        

                            <div class="col-lg-6 mb-4">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="...">
                                        </div>
                                        <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                            constantly updated collection of beautiful svg images that you can use
                                            completely free and without attribution!</p>
                                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                            unDraw &rarr;</a>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                    </div>
                                    <div class="card-body">
                                        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                            CSS bloat and poor page performance. Custom CSS classes are used to create
                                            custom components and custom utility classes.</p>
                                        <p class="mb-0">Before working with this theme, you should become familiar with the
                                            Bootstrap framework, especially the utility classes.</p>
                                    </div>
                                </div>

                                </div>
                                            </div>

                                        </div>

                                    </div>
                            Footer -->
                        </div>
                    </div>
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; FelpsTI 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a><!-- MEDICO Modal-->
    <div class="modal fade" id="medicoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar novo médico</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="DAO/medicoDAO.php" method="POST">
                    <div class="col modal-body">
                        <div class="row">
                            <div class="mb-2 form-floating">
                                <input autocomplete="off" type="text" class="form-control shadow-sm" name="txtTurno" required="required" placeholder="Nome do médico">
                                <label class="ml-2" for="txtTurno">Nome do médico</label>
                            </div>
                            <div class="mb-2 form-floating">
                                <input autocomplete="off" type="text" class="form-control shadow-sm" name="txtTurno" required="required" placeholder="Email">
                                <label class="ml-2" for="txtTurno">Email</label>
                            </div>
                            <div class="mb-2 form-floating">
                                <input autocomplete="off" type="text" class="form-control shadow-sm" name="txtTurno" required="required" maxlength="8" placeholder="CRM">
                                <label class="ml-2" for="txtTurno">CRM</label>
                            </div>
                            <div class="mb-2 form-floating">
                                <input autocomplete="off" type="text" class="form-control shadow-sm" name="txtTurno" required="required" maxlength="15" placeholder="ADM">
                                <label class="ml-2" for="txtTurno">ADM</label>
                            </div>
                        </div>
                        <!-- divisor -->
                        <hr class="sidebar-divisor mb-0">
                        <h5 class="modal-title mb-2 text-center" id="">Acesso a sistemas</h5>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="mb-2 form-floating">
                                        <input autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsMV" id="mv" placeholder="mv" name="mv" required="">
                                        <label class="ml-2" for="txtTurno">MV</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <datalist id="datalistOptionsMV">
                                        <option id="SIM" value="SIM">SIM</option>
                                        <option id="NÃO" value="NÃO">NÃO</option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="mb-2 form-floating">
                                        <input autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsUsuario" id="usuario" placeholder="usuario" name="usuario" required="">
                                        <label class="ml-2" for="txtTurno">Usuário</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <datalist id="datalistOptionsUsuario">
                                        <option id="SIM" value="SIM">SIM</option>
                                        <option id="NÃO" value="NÃO">NÃO</option>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="mb-2 form-floating">
                                        <input autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsPrestador" id="prestador" placeholder="prestador" name="prestador" required="">
                                        <label class="ml-2" for="txtTurno">Prestador</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <datalist id="datalistOptionsPrestador">
                                        <option id="SIM" value="SIM">SIM</option>
                                        <option id="NÃO" value="NÃO">NÃO</option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="mb-2 form-floating">
                                        <input autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsCertificado" id="certificado" placeholder="certificado" name="certificado" required="">
                                        <label class="ml-2" for="txtTurno">Certificado digital</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <datalist id="datalistOptionsCertificado">
                                        <option id="SIM" value="SIM">SIM</option>
                                        <option id="NÃO" value="NÃO">NÃO</option>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="mb-2 form-floating">
                                        <input autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsEmpresa" id="Empresa" placeholder="Empresa" name="Empresa" required="">
                                        <label class="ml-2" for="txtTurno">Empresa telessaúde</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <datalist id="datalistOptionsEmpresa">
                                        <option id="SIM" value="SIM">SIM</option>
                                        <option id="NÃO" value="NÃO">NÃO</option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="mb-2 form-floating">
                                        <input autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsConsolSol" id="CONSOL/SOL" placeholder="CONSOL/SOL" name="CONSOL/SOL" required="">
                                        <label class="ml-2" for="txtTurno">CONSOL/SOL</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <datalist id="datalistOptionsConsolSol">
                                        <option id="SIM" value="SIM">SIM</option>
                                        <option id="NÃO" value="NÃO">NÃO</option>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <!-- divisor -->
                        <hr class="sidebar-divisor mb-0">
                        <h5 class="modal-title mb-2 text-center" id="">Qual a forma de login?</h5>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="mb-2 form-floating">
                                        <input autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsLogin" id="tipologin" placeholder="Loga com ADM, CRM ou UNI?" name="tipologin" required="">
                                        <label class="ml-2" for="publico">Loga com ADM, CRM ou UNI?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <datalist id="datalistOptionsLogin">
                                        <option id="ADM" value="ADM">ADM</option>
                                        <option id="CRM" value="CRM">CRM</option>
                                        <option id="UNI" value="UNI">UNI</option>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <!-- divisor -->
                        <hr class="sidebar-divisor mb-0">
                        <h5 class="modal-title mb-2 text-center" id="">Observações</h5>
                        <div class="row">
                            <div class="form-floating">
                                <textarea autocomplete="off" class="form-control shadow-sm" required="required" placeholder="Alguma observação?" name="txtObs"></textarea>
                                <label class="ml-2" for="txtObs">Alguma observação?</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="inserirmedico" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Quer mesmo sair??</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Clique em sair para confirmar o logout.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="controller/logout.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Bootstrap core JavaScript-->

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</body>
<?php
function rand_color()
{
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}
?>

<script>
    var ctx = document.getElementById("semanal");

    <?php

    include 'controller/conexao.php';
    $dias = [];
    $erros = [];
    $colors = [];
    $i = 0;

    $sql = "SELECT dia, COUNT(erro) as qtderro 
    FROM atendimento 
    WHERE dia > now() - INTERVAL 7 day 
    GROUP BY dia";

    $buscar = mysqli_query($strcon, $sql);
    while ($dados = mysqli_fetch_array($buscar)) {
        $dias[$i] = $dados['dia'];
        $erros[$i] = $dados['qtderro'];
        $colors[$i] = rand_color();
        $i++;
    }
    ?>

    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php foreach ($dias as $dia) { ?> '<?php echo $dia; ?>', <?php } ?>],
            datasets: [{
                label: "Atendimentos no dia",
                lineTension: 0.3,
                backgroundColor: "rgba(35, 160, 250, 1)",
                borderColor: "rgba(35, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(0, 0, 0, 1)",
                pointBorderColor: "rgba(35, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(35, 115, 223, 1)",
                pointHoverBorderColor: "rgba(0, 0, 0, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [<?php foreach ($erros as $erro) { ?> '<?php echo $erro; ?>', <?php } ?>],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return '$' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>

<script>
    // grafico donut sistemas alta hj
    // Pie Chart Example
    <?php
    include 'controller/conexao.php';
    $sql = "SELECT sistema, 
                    COUNT(sistema) AS atendimentosXsistema 
                    FROM atendimento 
                    WHERE dia = DATE(NOW())
                    group by sistema 
                    order by atendimentosXsistema 
                    DESC LIMIT 5";

    $buscar = mysqli_query($strcon, $sql);
    $sistemas = [];
    $atds = [];
    $colors = [];
    $i = 0;
    while ($dados = mysqli_fetch_array($buscar)) {
        $sistemas[$i] = $dados['sistema'];
        $atds[$i] = $dados['atendimentosXsistema'];
        $colors[$i] = rand_color();
        $i++;
    }
    ?>

    var ctx = document.getElementById("sistHj");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {

            labels: [<?php foreach ($sistemas as $sistema) { ?> '<?php echo $sistema; ?>', <?php } ?>],
            datasets: [{
                data: [<?php foreach ($atds as $atd) { ?> '<?php echo $atd; ?>', <?php } ?>],
                backgroundColor: [<?php foreach ($colors as $cor) { ?> '<?php echo $cor; ?>', <?php } ?>],
                hoverBackgroundColor: [<?php foreach ($colors as $cor) { ?> '<?php echo $cor; ?>', <?php } ?>],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

<script>
    // grafico donut erros alta hj
    // Pie Chart Example

    <?php
    include 'controller/conexao.php';
    $sql = "SELECT erro, 
                    COUNT(erro) AS atendimentosXerro 
                    FROM atendimento 
                    WHERE dia = DATE(NOW())
                    group by erro 
                    order by atendimentosXerro 
                    DESC LIMIT 5";

    $buscar = mysqli_query($strcon, $sql);
    $erros = [];
    $atds = [];
    $colors = [];
    $i = 0;
    while ($dados = mysqli_fetch_array($buscar)) {
        $erros[$i] = $dados['erro'];
        $atds[$i] = $dados['atendimentosXerro'];
        $colors[$i] = rand_color();
        $i++;
    }
    ?>

    var ctx = document.getElementById("errHj");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {

            labels: [<?php foreach ($erros as $erro) { ?> '<?php echo $erro; ?>', <?php } ?>],
            datasets: [{
                data: [<?php foreach ($atds as $atd) { ?> '<?php echo $atd; ?>', <?php } ?>],
                backgroundColor: [<?php foreach ($colors as $cor) { ?> '<?php echo $cor; ?>', <?php } ?>],
                hoverBackgroundColor: [<?php foreach ($colors as $cor) { ?> '<?php echo $cor; ?>', <?php } ?>],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>


<script>
    // grafico donut medicos alta hj
    // Pie Chart Example

    <?php
    include 'controller/conexao.php';

    $sql = "SELECT medico, 
                    COUNT(medico) AS atendimentosXmedico 
                    FROM atendimento 
                    WHERE dia = DATE(NOW())
                    group by medico 
                    order by atendimentosXmedico 
                    DESC LIMIT 5
                    ";

    $buscar = mysqli_query($strcon, $sql);
    $medicos = [];
    $atds = [];
    $colors = [];
    $i = 0;
    while ($dados = mysqli_fetch_array($buscar)) {
        $medicos[$i] = $dados['medico'];
        $atds[$i] = $dados['atendimentosXmedico'];
        $colors[$i] = rand_color();
        $i++;
    }
    ?>

    var ctx = document.getElementById("medHj");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {

            labels: [<?php foreach ($medicos as $medico) { ?> '<?php echo $medico; ?>', <?php } ?>],
            datasets: [{
                data: [<?php foreach ($atds as $atd) { ?> '<?php echo $atd; ?>', <?php } ?>],
                backgroundColor: [<?php foreach ($colors as $cor) { ?> '<?php echo $cor; ?>', <?php } ?>],
                hoverBackgroundColor: [<?php foreach ($colors as $cor) { ?> '<?php echo $cor; ?>', <?php } ?>],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

</html>