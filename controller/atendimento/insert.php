<?php

if (isset($_POST['submit'])) {
    insertAtendimento();
}

function insertAtendimento()
{
    require '../../controller/conexao.php';
    //echo $_SESSION['usuario'];
    $crm = $_POST['crm'];

    $medico = $_POST['medico'];

    $dia = date("Y-m-d");

    $sqlSel = "SELECT andar, sala, mesa 

    FROM presenca WHERE plantao LIKE '$dia%' AND medico = '$medico';";

    //echo $sqlSel;

    $resultSel = mysqli_query($strcon, $sqlSel);

    while ($row = mysqli_fetch_array($resultSel)) {

        $andar = $row['andar'];

        $sala = $row['sala'];

        $mesa = $row['mesa'];
    }

    $sistema = $_POST['sistema'];

    $criticidade = $_POST['btnradioCrit'];

    $erro = $_POST['erro'];

    $descricao = $_POST['txtDescErro'];

    $status = $_POST['btnradioSol'];

    $observacao = $_POST['txtSolErro'];

    $mes = date("m");

    switch ($mes) {
        case 1:
            $mes = 'JANEIRO';
            break;
        case 2:
            $mes = 'FEVEREIRO';
            break;
        case 3:
            $mes = 'MARCO';
            break;
        case 4:
            $mes = 'ABRIL';
            break;
        case 5:
            $mes = 'MAIO';
            break;
        case 6:
            $mes = 'JUNHO';
            break;
        case 7:
            $mes = 'JULHO';
            break;
        case 8:
            $mes = 'AGOSTO';
            break;
        case 9:
            $mes = 'SETEMBRO';
            break;
        case 10:
            $mes = 'OUTUBRO';
            break;
        case 11:
            $mes = 'NOVEMBRO';
            break;
        case 12:
            $mes = 'DEZEMBRO';
            break;
    }

    $hora = date("H:i");

    $ti = $_POST['ti'];

    $sql = "INSERT INTO atendimento (crm, medico, andar, sala, mesa, sistema, criticidade, erro, 

    descricao, status, observacao, dia, mes, hora, ti) 

VALUES ('$crm','$medico','$andar','$sala','$mesa','$sistema','$criticidade','$erro','$descricao',

'$status','$observacao','$dia','$mes','$hora','$ti');";

    //echo $sql;

    mysqli_query($strcon, $sql);

    header('Location: ../../atendimento.php');
}

?>