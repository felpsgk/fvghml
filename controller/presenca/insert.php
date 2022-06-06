<?php
if (isset($_POST['submit'])) {
    insertPresenca();
}

function insertPresenca()
{

    require 'controller/conexao.php';

    //echo $_SESSION['usuario'];

    $crm = $_POST['crm'];

    $medico = $_POST['medico'];

    $medico = $_POST['especialidade'];

    $medico = $_POST['modalidade'];

    $andar = $_POST['andar'];

    $sala = $_POST['sala'];

    $mesa = $_POST['mesa'];

    $ti = $_POST['ti'];

    $turno = $_POST['turno'];

    $turno = $_POST['chegada'];

    $turno = $_POST['saida'];
    //booleano
    $turno = $_POST['voucher'];

    $turno = $_POST['publico'];

    $turno = $_POST['obs'];

    $turno = $_POST['intervalo'];

    $dia = date("Y-m-d");


    $sql = "INSERT INTO presenca (
        crm, medico, especialidade, 
        modalidade, andar, sala, 
        mesa, ti, turno, chegada, 
        saida, voucher, publico, 
        obs, intervalo
        ) VALUES (
            '$crm','$medico','$especialidade',
            '$modalidade','$andar','$sala',
            '$mesa','$ti','$turno'
            '$chegada','$saida','$voucher'
            '$publico','$obs','$intervalo'
            );";

    //echo $sql;

    mysqli_query($strcon, $sql);

    header('Location: ../index.php');
}
?>