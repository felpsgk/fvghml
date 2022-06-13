<?php

require '../../controller/conexao.php';


$idmedico = $_POST['idmedico'];
$crm = $_POST['crm'];
$nome = $_POST['nome'];
$tipoContratacao = $_POST['tipoContratacao'];
$adm = $_POST['adm'];
$email = $_POST['email'];
$modalidade = $_POST['modalidade'];
$especialidade = $_POST['especialidade'];
$mv = $_POST['mv'];
$usuario = $_POST['usuario'];
$prestador = $_POST['prestador'];
$certificado = $_POST['certificado'];
$empresa = $_POST['empresa'];
$consolsol = $_POST['consolsol'];
$plataforma = $_POST['plataforma'];
$formaLogin = $_POST['formaLogin'];
$origem = $_POST['origem'];
$empresapj = $_POST['empresapj'];
$obs = $_POST['obs'];

$sql = "UPDATE medico 
SET 
crm = '$crm', 
medico = '$nome', 
tipocontratacao = '$tipoContratacao', 
modalidade = '$modalidade', 
especialidade = '$especialidade', 
email = '$email', 
adm = '$adm', 
mv = '$mv', 
usuario = '$usuario', 
prestador = '$prestador',
certificadodigital = '$certificado', 
empresatelessaude	 = '$empresa', 
consolsol = '$consolsol', 
plataforma = '$plataforma', 
formaLogin = '$formaLogin', 
origem = '$origem', 
empresapj = '$empresapj', 
obs = '$obs'
WHERE id = '$idmedico'";

//echo $sql;
//UPDATE presenca SET crm = 'CRM76497', medico = 'PEDRO NEIVA ALVES CORREA', turno = '14h as 20h', chegada = concat(date(CURRENT_DATE()), '13:20:00'), saida = '', intervalo = '19H45', voucher = 'nao', obs = 'Sem atraso', andar = '7', sala = '1', mesa = 'A' WHERE id = '19920';

$queryrodou = mysqli_query($strcon, $sql);

$arrayUpdate[] = $queryrodou;
$arrayUpdate[] = $nome;

//echo $sala_arr;
echo json_encode($arrayUpdate);
