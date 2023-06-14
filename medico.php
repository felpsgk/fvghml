<?php
//session_start();
include 'controller/verificaLogin.php';
switch ($_SESSION['perfil']) {
    case 'ENFERMEIROvis':
        echo '<style type="text/css">
        #cadMedico {
            display: none;
        }
        #updateMedicoBtn {
            display: none;
        }
            </style>';
        break;
    case 'ENFERMEIROadm':
        break;
    case 'TI':
        echo '<style type="text/css">
        #updateMedicoBtn {
            display: none;
        }
            </style>';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>

    <title>Registro de presença</title>

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
                <div class="sidebar-brand-text mx-3">FVG</div>
            </a>

            <!-- divisor -->
            <hr class="sidebar-divisor bg-success my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
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
                <a class="nav-link" href="medico.php">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span>Médico</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="intercorrencia.php">
                <i class="fa-solid fa-pen-to-square"></i>
                    <span>Intercorrências</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="relatorio.php">
                <i class="fa-solid fa-file-lines"></i>
                    <span>Relatório da enfermagem</span></a>
            </li>
            <!-- divisor -->
            <hr class="sidebar-divisor bg-success">

            <!-- Titulo opaco menu 
            <div class="sidebar-heading">
                Visualizar
            </div>

            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-chart-bar"></i>
                    <span>Gráficos</span></a>
            </li>-->

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

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow border border-success">

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

                    <!-- Page cabeçalho -->
                    <h1 class="h3 mb-4 text-gray-800">Gestão de dados</h1>

                    <!-- linha nome e local -->

                    <form id="updateMedico" class="updateMedico" name="updateMedico" method="post">
                        <!-- COLUNA GERAL -->
                        <div class="col">
                            <!-- PRIMEIRA LINHA -->
                            <div class="row">
                                <!-- CABEÇA DO CARD LINHA -->
                                <div class="col card shadow ps-0 pe-0 mb-4 border border-success">
                                    <div class="card-header py-3">
                                        <h6 class="mb-0 font-weight-bold text-center text-success">Atualização de médicos</h6>
                                    </div>
                                    <!-- CORPO DO CARD  -->
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="col ps-0 pe-0 mb-2 form-floating">
                                                        <input autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptions" id="medico" placeholder="Digite nome ou CRM" name="medico" required="">
                                                        <label for="publico">Nome ou CRM</label>
                                                    </div>
                                                    <datalist id="datalistOptions">
                                                        <?php
                                                        require 'controller/presenca/research.php';
                                                        readMedicoGestDados();
                                                        ?>
                                                    </datalist>
                                                    <script>
                                                        $('#medico').change(function(e) {
                                                            e.preventDefault();
                                                            $.ajax({
                                                                url: "controller/presenca/research.php",
                                                                method: "POST",
                                                                data: $(this).serialize(),
                                                                dataType: "json",
                                                                success: function(data) {
                                                                    $("#idmedico").val(data['id']);
                                                                    $("#nome").val(data['medico']);
                                                                    $("#crm").val(data['crm']);
                                                                    $("#tipoContratacao").val(data['tipocontratacao']);
                                                                    $("#adm").val(data['adm']);
                                                                    $("#email").val(data['email']);
                                                                    $("#modalidade").val(data['modalidade']);
                                                                    $("#especialidade").val(data['especialidade']);
                                                                    $("#mv").val(data['mv']);
                                                                    $("#usuario").val(data['usuario']);
                                                                    $("#prestador").val(data['prestador']);
                                                                    $("#certificado").val(data['certificadodigital']);
                                                                    $("#empresa").val(data['empresatelessaude']);
                                                                    $("#consolsol").val(data['consolsol']);
                                                                    $("#plataforma").val(data['plataforma']);
                                                                    $("#formaLogin").val(data['login']);
                                                                    $("#origem").val(data['origem']);
                                                                    $("#empresapj").val(data['empresa']);
                                                                    $("#obs").val(data['obs']);
                                                                }
                                                            })
                                                        });
                                                    </script>

                                                </div>
                                            </div>
                                            <!-- divisor -->
                                            <hr class="sidebar-divisor mt-2 mb-2">
                                            <p class="h4 mb-2 text-center" id="">Dados a serem atualizados</p>
                                            <input type="hidden" id="idmedico" name="idmedico" value=""></input>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="ps-0 pe-0 mb-2 form-floating">
                                                        <input maxlength="128" type="text" class="form-control shadow-sm" id="nome" name="nome" required="required" placeholder="nome">
                                                        <label for="nome">Nome</label>
                                                    </div>
                                                </div>
                                                <div class="col-3   ">
                                                    <div class="ps-0 pe-0 mb-2 form-floating">
                                                        <input maxlength="8" autocomplete="off" type="text" class="form-control shadow-sm" id="crm" placeholder="Escolha um publico" name="crm" required="">
                                                        <label for="crm">CRM</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="ps-0 pe-0 mb-2 form-floating">
                                                        <input maxlength="64" autocomplete="off" type="text" class="form-control shadow-sm" id="tipoContratacao" placeholder="Escolha um publico" name="tipoContratacao" required="">
                                                        <label for="tipoContratacao">Tipo de contratação</label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="ps-0 pe-0 mb-2 form-floating">
                                                        <input maxlength="12" type="text" class="form-control shadow-sm" id="adm" name="adm" required="required" placeholder="adm">
                                                        <label for="adm">ADM</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="ps-0 pe-0 mb-2 form-floating">
                                                        <input maxlength="128" type="text" class="form-control shadow-sm" id="email" name="email" required="required" placeholder="Email">
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="ps-0 pe-0 mb-2 form-floating">
                                                        <input maxlength="128" type="text" class="form-control shadow-sm" id="modalidade" name="modalidade" required="required" placeholder="Modalidade (Covid, PA, etc)">
                                                        <label for="modalidade">Modalidade (Covid, PA, etc)</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="ps-0 pe-0 form-floating">
                                                        <input maxlength="128" type="text" class="form-control shadow-sm" id="especialidade" name="especialidade" required="required" placeholder="Especialidade (do médico)" name="especialidade">
                                                        <label for="especialidade">Especialidade (do médico)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="sidebar-divisor mb-1">
                                            <h5 class="h4 mb-2 text-center" id="">Acesso a sistemas</h5>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="mb-2 form-floating">
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsMV" id="mv" placeholder="mv" name="mv">
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
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsUsuario" id="usuario" placeholder="usuario" name="usuario">
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
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="mb-2 form-floating">
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsPrestador" id="prestador" placeholder="prestador" name="prestador">
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
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="mb-2 form-floating">
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsCertificado" id="certificado" placeholder="certificado" name="certificado">
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
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="mb-2 form-floating">
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsEmpresa" id="empresa" placeholder="empresa" name="empresa">
                                                            <label class="ml-2" for="empresa">Empresa telessaúde</label>
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
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsConsolSol" id="consolsol" placeholder="consolsol" name="consolsol">
                                                            <label class="ml-2" for="consolsol">CONSOL/SOL</label>
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
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="mb-2 form-floating">
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsPlataforma" id="plataforma" placeholder="plataforma" name="plataforma">
                                                            <label class="ml-2" for="plataforma">Plataforma</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <datalist id="datalistOptionsPlataforma">
                                                            <option id="SIM" value="SIM">SIM</option>
                                                            <option id="NÃO" value="NÃO">NÃO</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="mb-2 form-floating">
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" list="datalistOptionsformaLogin" id="formaLogin" placeholder="formaLogin" name="formaLogin">
                                                            <label class="ml-2" for="formaLogin">Forma de login utilizada</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <datalist id="datalistOptionsformaLogin">
                                                            <option id="ADM" value="ADM">ADM</option>
                                                            <option id="CRM " value="CRM">CRM</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="mb-2 form-floating">
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" id="origem" placeholder="origem" name="origem">
                                                            <label class="ml-2" for="origem">Origem</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="mb-2 form-floating">
                                                            <input maxlength="128" autocomplete="off" type="text" class="form-control shadow-sm" id="empresapj" placeholder="empresapj" name="empresapj">
                                                            <label class="ml-2" for="empresapj">Empresa do médico</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row ps-2 pe-2">
                                                        <div class="ps-0 pe-0 form-floating">
                                                            <textarea maxlength="512" autocomplete="off" class="form-control shadow-sm" placeholder="Alguma observação?" id="obs" name="obs"></textarea>
                                                            <label for="obs">Alguma observação?</label>
                                                            <p class="small text-end"><span class="caracteres">512</span> Restantes</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="alert alert-success" id="success" style="display:none"></div>
                                                <input type="hidden" id="ti" name="ti" value="<?php echo $_SESSION['usuario']; ?>"></input>
                                                <button type="submit" id="updateMedicoBtn" name="updateMedico" class="col-12 mt-2 shadow-sm btn btn-success bg-gradient">salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--CONTA CARACTERES RESTANTES-->
                    <script>
                        $(document).on("input", "#obs", function() {
                            var limite = 512;
                            var caracteresDigitados = $(this).val().length;
                            var caracteresRestantes = limite - caracteresDigitados;
                            $(".caracteres").text(caracteresRestantes);
                        });
                    </script>
                    <!-- ATUALIZA DADOS GESTAO -->
                    <script>
                        $(document).ready(function(e) {
                            //e.preventDefault();
                            $('.updateMedico').on('submit', function(e) {
                                e.preventDefault();
                                $("#alert").css('display', 'none');
                                console.log("Botão Clicado!");
                                $.ajax({
                                    url: "controller/medico/update.php",
                                    method: "POST",
                                    data: $(this).serialize(),
                                    dataType: "json",
                                    success: function(data) {
                                        if (data[0] == true) {
                                            $("#success").html('Medico ' + data[1] + ' atualizado com sucesso');
                                            $("#success").show();
                                            setTimeout(function() {
                                                $("#success").hide();
                                            }, 5000);
                                        }
                                    }
                                })
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">

        <i class="fas fa-angle-up"></i>
    </a>

    <!-- MEDICO Modal-->
    <div class="modal fade" id="medicoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar novo médico</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="controller/medico/insert.php" method="POST">
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

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/af-2.3.7/b-2.1.1/b-html5-2.1.1/date-1.1.1/fh-3.2.0/r-2.2.9/sl-1.3.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/af-2.3.7/b-2.1.1/b-html5-2.1.1/date-1.1.1/fh-3.2.0/r-2.2.9/sl-1.3.3/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                },
                "searching": false,
                paging: false,
                buttons: [{
                    title: 'Presencas do dia',
                }],
                responsive: false

            });
        });
    </script>

</body>

</html>
<!-- /.container-fluid 
                            

                            <div class="card shadow ps-0 pe-0 mb-4 border border-success">
                                <div class="card-header bg-success">
                                    <h6 class="m-0 font-weight-bold text-white">Gerar relatório</h6>
                                </div>
                                <div class="card-body">
                                    <form action="DAO/geraExcel.php" id="fromExcel" name="fromExcel" method="post">
                                        <input type="hidden" form="fromExcel" required="" id="diaExcel" name="diaExcel" value=""></input>
                                        <input type="text" form="fromExcel" required="" name="dia" id="dia" class="form-control mt-2" placeholder="Escolha uma data" />
                                        <button type="submit" form="fromExcel" id="export" name="export" class="col-12 mt-2 shadow-sm btn btn-success bg-gradient">Gerar excel</button>
                                        <script>
                                            $(document).ready(function() {
                                                $.datepicker.setDefaults({
                                                    dateFormat: 'yy-mm-dd'
                                                })
                                                $(function() {
                                                    $("#dia").datepicker();
                                                });
                                                $("#dia").change(function() {
                                                    var data = $("#dia").val();
                                                    $("#diaExcel").val(data);
                                                    $.ajax({
                                                        url: 'DAO/presencaDAO.php',
                                                        method: "GET",
                                                        data: {
                                                            atualizar: data
                                                        },
                                                        success: function(data) {
                                                            $('#dataTable').html(data);
                                                        }

                                                    })

                                                })
                                            });
                                        </script>
                                    </form>
                                </div>
                            </div>
-->

<!-- End of Main Content -->

<!-- Footer
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer> -->
<!-- End of Footer -->


<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->