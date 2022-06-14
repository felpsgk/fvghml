<?php
require '../../controller/conexao.php';

$sqlchegou = "";
$sqlsaiu = "";
$sqlcrm = "";
$idmedico = $_POST['idcrmmedico'];

if (isset($_POST['crm'])) {
    $crm = $_POST['crm'];
    $sqlcrm = "crm = '$crm',";
}

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

if (isset($_POST['obs'])) {
    $obs = $_POST['obs'];
} else if (isset($_POST['obsTxt'])) {
    $obs = $_POST['obsTxt'];
} else {
    $obs = $_POST['obs'];
    $obs = $_POST['obsTxt'];
}

$andar = $_POST['andar'];
$sala = $_POST['sala'];
$mesa = $_POST['mesa'];

$sql = "UPDATE presenca SET
                $sqlcrm 
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

/*
echo $sql;
diaAgenda: 2022-06-14
medicoAtt: Adriana Martins Monteiro de Castro
idcrmmedico: 19956
nome: Adriana Martins Monteiro de Castro
modalidade: PA ONLINE /COVID 
especialidade: DERMATOLOGISTA 
andar: 6
sala: 
mesa: 
turno: 08h as 14h
chegada: 
saida: 
publico: APOIO
intervalo: Não tera direito a intervalo
plantao: 2022-06-14
obsTxt: não
ti: jonathan
//UPDATE presenca SET crm = 'CRM76497', medico = 'PEDRO NEIVA ALVES CORREA', turno = '14h as 20h', chegada = concat(date(CURRENT_DATE()), '13:20:00'), saida = '', intervalo = '19H45', voucher = 'nao', obs = 'Sem atraso', andar = '7', sala = '1', mesa = 'A' WHERE id = '19920';
*/
$queryrodou = mysqli_query($strcon, $sql);

$arrayUpdate[] = $queryrodou;
$arrayUpdate[] = $nome;

//echo $sala_arr;
echo json_encode($arrayUpdate);

