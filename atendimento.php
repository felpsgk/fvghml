<?php
//session_start();
include 'controller/verificaLogin.php';
switch ($_SESSION['perfil']) {
    case 'ENFERMEIROvis':
        echo '<style type="text/css">
        #fromAtendimento {
            display: none;
            }
            #btnAtt {
                display: none;
            }
            #btnDel {
                display: none;
            }
            #cadMedico {
                display: none;
            }
            </style>';
        break;
    case 'ENFERMEIROadm':
        echo '<style type="text/css">
            #fromAtendimento {
                display: none;
            }
            #btnAtt {
                display: none;
            }
            #btnDel {
                display: none;
            }
            </style>';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>

    <title>Registro de atendimento</title>

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
            <li class="nav-item active">
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Registro de atendimentos</h1>

                    <form action="controller/atendimento/insert.php" id="fromAtendimento" name="fromAtendimento" method="post">
                        <!-- linha medico -->
                        <div class="row">
                            <!-- linha nome -->
                            <!-- coluna nome -->
                            <div class="col">
                                <!-- seleção do medico -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Médico</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="rownome" class="row mb-2">
                                            <div class="col">
                                                <input class="form-control shadow-sm" autocomplete="off" list="datalistOptionsDia" id="medico" placeholder="Digite o nome nome medico" name="medico" required="required" onchange="myFunctionDia()">
                                                <datalist id="datalistOptionsDia">
                                                    <?php
                                                    require 'controller/presenca/research.php';
                                                    readMedicoDia();
                                                    ?>
                                                    <input type="hidden" id="txtcrm" name="crm" value=""></input>
                                                    <script>
                                                        function myFunctionDia() {
                                                            //PEGA A ID DO INPUT
                                                            var val = document.getElementById('medico').value;
                                                            //PEGA O ID DA OPÇÃO SELECIONADA
                                                            var text = $('#datalistOptionsDia').find('option[value="' + val + '"]').attr('id');
                                                            //alert(text);
                                                            //PEGA O CRM E GUARDA NO HIDDEN PARA SALVAR NA TABELA
                                                            document.getElementById("txtcrm").value = text;
                                                        }
                                                    </script>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- linha sistema e erro -->
                        <div class="row">
                            <!-- coluna sistema -->
                            <div class="col">
                                <!-- seleção do sistema -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Sistema</h6>
                                    </div>
                                    <div class="card-body">
                                        <input class="form-control shadow-sm" autocomplete="off" list="datalistOptionsSis" id="sistema" placeholder="Digite o sistema" name="sistema" required="required" onchange="myFunctionDia()">
                                        <datalist id="datalistOptionsSis">
                                            <?php
                                            require 'controller/sistema/research.php';
                                            readSistema();
                                            ?>
                                            <!--
                                            <input type="hidden" id="txtcrm" name="crm" value=""></input>
                                            <script>
                                            function myFunctionDia() {
                                                //PEGA A ID DO INPUT
                                                var val = document.getElementById('medico').value;
                                                //PEGA O ID DA OPÇÃO SELECIONADA
                                                var text = $('#datalistOptionsDia').find('option[value="' + val + '"]').attr('id');
                                                //alert(text);
                                                //PEGA O CRM E GUARDA NO HIDDEN PARA SALVAR NA TABELA
                                                document.getElementById("txtcrm").value = text;
                                            }
                                            </script>-->
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <!-- coluna erro -->
                            <div class="col">
                                <!-- seleção do sistema -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Erro</h6>
                                    </div>
                                    <div class="card-body">
                                        <input class="form-control shadow-sm" autocomplete="off" list="datalistOptionsErr" id="erro" placeholder="Digite o erro" name="erro" required="required" onchange="myFunctionDia()">
                                        <datalist id="datalistOptionsErr">
                                            <?php
                                            require 'controller/erro/research.php';
                                            readErro();
                                            ?>
                                            <!--
                                            <input type="hidden" id="txtcrm" name="crm" value=""></input>
                                            <script>
                                            function myFunctionDia() {
                                                //PEGA A ID DO INPUT
                                                var val = document.getElementById('medico').value;
                                                //PEGA O ID DA OPÇÃO SELECIONADA
                                                var text = $('#datalistOptionsDia').find('option[value="' + val + '"]').attr('id');
                                                //alert(text);
                                                //PEGA O CRM E GUARDA NO HIDDEN PARA SALVAR NA TABELA
                                                document.getElementById("txtcrm").value = text;
                                            }
                                            </script>-->
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- linha criticidade -->
                        <div class="row">
                            <!-- coluna criticidade -->
                            <div class="col">
                                <!-- seleção do criticidade -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Criticidade</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="criticidade" class="row mb-2">
                                            <div class="btn-group" role="criticidade" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradioCrit" value="BAIXA" id="btnRadBaixa" required="required" autocomplete="off">
                                                <label class="btn btn-outline-success" for="btnRadBaixa">Baixa</label>

                                                <input type="radio" class="btn-check" name="btnradioCrit" value="MEDIA" id="btnRadMedia" autocomplete="off">
                                                <label class="btn btn-outline-success" for="btnRadMedia">Media</label>

                                                <input type="radio" class="btn-check" name="btnradioCrit" value="ALTA" id="btnRadAlta" autocomplete="off">
                                                <label class="btn btn-outline-success" for="btnRadAlta">Alta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- linha descrição e solução -->
                        <div class="row">
                            <!-- coluna descrição -->
                            <div class="col">
                                <!-- texto do criticidade -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Descrição do erro</h6>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control shadow-sm" id="txtDescErro" name="txtDescErro" aria-describedby="emailHelp" required="required" placeholder="Descrição do erro">
                                    </div>
                                </div>
                            </div>
                            <!-- coluna solução -->
                            <div class="col">
                                <!-- texto do criticidade -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Solução para o erro</h6>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control shadow-sm" id="txtSolErro" name="txtSolErro" aria-describedby="emailHelp" required="required" placeholder="Solução do erro">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- linha status -->
                        <div class="row">
                            <!-- coluna status -->
                            <div class="col">
                                <!-- seleção do status -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Status</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="criticidade" class="row mb-2">
                                            <div class="btn-group" role="solucao" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradioSol" value="RESOLVIDO" id="btnRes" required="required" autocomplete="off">
                                                <label class="btn btn-outline-success" for="btnRes">Resolvido</label>

                                                <input type="radio" class="btn-check" name="btnradioSol" value="RESOLVIDO PALIATIVO" id="btnResPal" autocomplete="off">
                                                <label class="btn btn-outline-success" for="btnResPal">Resolvido paliativo</label>

                                                <input type="radio" class="btn-check" name="btnradioSol" value="EM ANALISE" id="btnAnalise" autocomplete="off">
                                                <label class="btn btn-outline-success" for="btnAnalise">Em análise</label>
                                            </div>
                                        </div>
                                        <input type="hidden" id="ti" name="ti" value="<?php echo $_SESSION['usuario']; ?>"></input>
                                        <button type="submit" name="submit" class="col-12 mb-1 shadow-sm btn btn-success bg-gradient">salvar</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- linha excel gera -->
                <div class="row">
                    <!-- coluna excel gera -->
                    <div class="col">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Gerar relatório entre datas específicas</h6>
                            </div>
                            <div class="card-body">
                                <form id="geraExcelAtendimento" action="controller/excel/geraExcelAtendimento.php" name="fromExcel" method="GET">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <input type="text" required="" autocomplete="off" name="diaInicio" id="diaInicio" class="form-control shadow-sm " placeholder="Escolha a data inicial">
                                        </div>
                                        <div class="col">
                                            <input type="text" required="" autocomplete="off" name="diaFim" id="diaFim" class="form-control shadow-sm " placeholder="Escolha a data final">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" name="export" id="geraExcel" value="Gerar Excel" class="col-12 mb-1 shadow-sm btn btn-success bg-gradient">
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    $(document).ready(function() {
                                        $.datepicker.regional['pt-BR'] = {
                                            closeText: 'Fechar',
                                            prevText: '&#x3c;Anterior',
                                            nextText: 'Pr&oacute;ximo&#x3e;',
                                            currentText: 'Hoje',
                                            monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho',
                                                'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                                            ],
                                            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
                                                'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
                                            ],
                                            dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sabado'],
                                            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                                            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                                            weekHeader: 'Sm',
                                            dateFormat: 'dd/mm/yy',
                                            firstDay: 0,
                                            isRTL: false,
                                            showMonthAfterYear: false,
                                            yearSuffix: ''
                                        };
                                        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
                                        $.datepicker.setDefaults({
                                            dateFormat: 'yy-mm-dd',
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Atendimentos do dia</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex bd-highlight">
                            <div class="bd-highlight">
                                <input type="text" name="dia" id="dia" class="form-control shadow-sm" placeholder="Escolha uma data para visualizar" />
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTable" class="table bg-secondary bg-gradient rounded text-white" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border">CRM</th>
                                        <th scope="col" class="border">NOME</th>
                                        <th scope="col" class="border">ANDAR</th>
                                        <th scope="col" class="border">SALA</th>
                                        <th scope="col" class="border">MESA</th>
                                        <th scope="col" class="border">SISTEMA</th>
                                        <th scope="col" class="border">CRITICIDADE</th>
                                        <th scope="col" class="border">ERRO</th>
                                        <th scope="col" class="border">DESCRIÇÃO</th>
                                        <th scope="col" class="border">STATUS</th>
                                        <th scope="col" class="border">OBSERVAÇÃO</th>
                                        <th scope="col" class="border">DIA</th>
                                        <th scope="col" class="border">MÊS</th>
                                        <th scope="col" class="border">HORA</th>
                                        <th scope="col" class="border">TI</th>
                                        <th scope="col" class="border">
                                        <th scope="col" class="border">
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require 'controller/atendimento/research.php';
                                    readAtendimento();
                                    ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
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


    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

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
                paging: false,
                select: true,
                fixedHeader: true,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'atendimentos do dia',
                }],
                responsive: false

            });
        });
    </script>
</body>

</html>

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
            $.ajax({
                url: 'controller/atendimento/research.php',
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