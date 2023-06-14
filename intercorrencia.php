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

    <title>Registro de Intercorrências</title>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-4 text-gray-800">Gestão de dados</h1>
                    </div>

                    <!-- linha nome e local -->

                    <form action="controller/intercorrencias.php" id="insertIntercorrencia" name="insertIntercorrencia" method="post">
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
                                        <h6 class="m-0 font-weight-bold text-primary">Dia e hora</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="ps-0 pe-0 mb-2 form-floating">
                                                    <input autocomplete="off" type="text" class="form-control mt-2 shadow-sm" id="dia" name="dia" required="required" placeholder="Escolha uma data">
                                                    <label for="dia">Dia</label>
                                                </div>
                                                <script>
                                                    $('#dia').datetimepicker({
                                                        lang: 'pt-BR',
                                                        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                                                        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                                                        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                                                        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                                                        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                                                        nextText: 'Próximo',
                                                        prevText: 'Anterior',
                                                        format: 'Y-m-d',
                                                        timepicker: false
                                                    });
                                                    $.datetimepicker.setLocale('pt-BR');
                                                </script>
                                            </div>
                                            <div class="col">
                                                <div class="ps-0 pe-0 mb-2 form-floating">
                                                    <input autocomplete="off" type="text" class="form-control mt-2 shadow-sm" id="hora" name="hora" required="required" placeholder="Escolha uma hora">
                                                    <label for="hora">Hora</label>
                                                </div>
                                                <script>
                                                    $('#hora').datetimepicker({
                                                        lang: 'pt-BR',
                                                        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                                                        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                                                        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                                                        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                                                        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                                                        nextText: 'Próximo',
                                                        prevText: 'Anterior',
                                                        datepicker: false,
                                                        format: 'H:i',
                                                        use24hours: true,
                                                        step: 15,
                                                        timepicker: true
                                                    });
                                                    $.datetimepicker.setLocale('pt-BR');
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- coluna erro -->
                            <div class="col">
                                <!-- seleção do sistema -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Tipo</h6>
                                    </div>
                                    <div class="card-body">
                                        <input class="form-control shadow-sm" autocomplete="off" list="datalistOptionsTipo" id="tipo" placeholder="Escolha o tipo de intercorrência" name="tipo" required="required" onchange="myFunctionDia()">
                                        <datalist id="datalistOptionsTipo">
                                            <option value="Atraso">
                                            <option value="Lentidão">
                                            <option value="Erro">
                                        </datalist>
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
                                        <h6 class="m-0 font-weight-bold text-primary">Número do atendimento</h6>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control shadow-sm" id="numeroAt" name="numeroAt" aria-describedby="emailHelp" placeholder="Se houve um atendimento, digite aqui">
                                    </div>
                                </div>
                            </div>
                            <!-- coluna solução -->
                            <div class="col">
                                <!-- texto do criticidade -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Número do chamado</h6>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control shadow-sm" id="chamado" name="chamado" aria-describedby="emailHelp" placeholder="Se houve um chamado, digite aqui">
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

                                        <div class="ps-0 pe-0 form-floating">
                                            <textarea maxlength="512" autocomplete="off" class="form-control shadow-sm" placeholder="Alguma observação?" id="descricao" name="descricao" required="required"></textarea>
                                            <label for="descricao">Alguma observação?</label>
                                            <p class="small text-end"><span class="caracteresdescricao">512</span> Restantes</p>
                                        </div>
                                        <!--CONTA CARACTERES RESTANTES-->
                                        <script>
                                            $(document).on("input", "#descricao", function() {
                                                var limite = 512;
                                                var caracteresDigitados = $(this).val().length;
                                                var caracteresRestantes = limite - caracteresDigitados;
                                                $(".caracteresdescricao").text(caracteresRestantes);
                                            });
                                        </script>
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
                                        <div class="ps-0 pe-0 form-floating">
                                            <textarea maxlength="512" autocomplete="off" class="form-control shadow-sm" placeholder="Alguma observação?" id="soluc" name="soluc" required="required"></textarea>
                                            <label for="soluc">Alguma observação?</label>
                                            <p class="small text-end"><span class="caracteressoluc">512</span> Restantes</p>
                                        </div>
                                        <!--CONTA CARACTERES RESTANTES-->
                                        <script>
                                            $(document).on("input", "#soluc", function() {
                                                var limite = 512;
                                                var caracteresDigitados = $(this).val().length;
                                                var caracteresRestantes = limite - caracteresDigitados;
                                                $(".caracteressoluc").text(caracteresRestantes);
                                            });
                                        </script>
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
                                    <div class="card-body">
                                        <input type="hidden" id="acao" name="acao" value="inserir"></input>
                                        <input type="hidden" id="enf" name="enf" value="<?php echo $_SESSION['usuario']; ?>"></input>
                                        <button type="submit" name="submit" class="col-12 mb-1 shadow-sm btn btn-success bg-gradient">salvar</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Intercorrências do dia</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex bd-highlight">
                                <div class="bd-highlight">
                                    <input type="text" name="diaVer" id="diaVer" class="form-control shadow-sm" placeholder="Escolha uma data para visualizar" />
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="dataTable" class="table bg-secondary bg-gradient rounded text-white" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border">DIA</th>
                                            <th scope="col" class="border">HORA</th>
                                            <th scope="col" class="border">TIPO</th>
                                            <th scope="col" class="border">ATENDIMENTO</th>
                                            <th scope="col" class="border">DESCRIÇÃO</th>
                                            <th scope="col" class="border">SOLUÇÃO</th>
                                            <th scope="col" class="border">ENFERMEIRO</th>
                                            <th scope="col" class="border">CHAMADO</th>
                                            <th scope="col" class="border">
                                            <th scope="col" class="border">
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require 'controller/intercorrencias.php';
                                        readIntercorrencias();
                                        ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
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