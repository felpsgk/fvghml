<?php
require '../../controller/conexao.php';

$idmedico = $_POST['idcrmmedico'];

$crm = $_POST['crm'];
$nome = $_POST['nome'];
$turno = $_POST['turno'];
$chegada = $_POST['chegada'];
$saida = $_POST['saida'];
$sqlchegou = "";
$sqlsaiu = "";
if (!empty($chegada)) {
    $concatchegada = 'chegada = concat(date(CURRENT_DATE()), ';
    $sqlchegou .= $concatchegada;
    $sqlchegou .= "' ";
    $sqlchegou .= $chegada;
    $sqlchegou .= "'";
    $sqlchegou .= "), ";
}
if (!empty($saida)) {
    $concatsaida = 'saida = concat(date(CURRENT_DATE()), ';
    $sqlsaiu .= $concatsaida;
    $sqlsaiu .= "' ";
    $sqlsaiu .= $saida;
    $sqlsaiu .= "'";
    $sqlsaiu .= "), ";
}

$intervalo = $_POST['intervalo'];

if (isset($_POST['voucher'])) {
    $voucher = 'sim';
} else if (!isset($_POST['voucher'])) {
    $voucher = 'nao';
}


$obs = $_POST['obs'];
$andar = $_POST['andar'];
$sala = $_POST['sala'];
$mesa = $_POST['mesa'];

$sql = "UPDATE presenca 
                SET crm = '$crm', 
                medico = '$nome', 
                turno = '$turno', 
                $sqlchegou$sqlsaiu
                intervalo = '$intervalo', 
                voucher = '$voucher', 
                obs = '$obs', 
                andar = '$andar', 
                sala = '$sala', 
                mesa = '$mesa'
                WHERE id = '$idmedico'";

//echo $sql;
//UPDATE presenca SET crm = 'CRM76497', medico = 'PEDRO NEIVA ALVES CORREA', turno = '14h as 20h', chegada = concat(date(CURRENT_DATE()), '13:20:00'), saida = '', intervalo = '19H45', voucher = 'nao', obs = 'Sem atraso', andar = '7', sala = '1', mesa = 'A' WHERE id = '19920';

$queryrodou = mysqli_query($strcon, $sql);

$arrayUpdate[] = $queryrodou;
$arrayUpdate[] = $nome;

//echo $sala_arr;
echo json_encode($arrayUpdate);
