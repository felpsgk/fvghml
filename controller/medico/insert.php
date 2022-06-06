<?php

use CodeIgniter\Exceptions\AlertError;

if (isset($_POST['inserirmedico'])) {

    require '../../controller/conexao.php';

    //echo $_SESSION['usuario'];

    $crm = $_POST['crm'];

    $medico = $_POST['nome'];

    $sql = "INSERT INTO medico (medico, crm) VALUES ('$medico','$crm');";

    //echo $sql;

    $queryrodou = mysqli_query($strcon, $sql);

    if ($queryrodou) {
        header('Location: ../index.php');
    } else {
?>
        <script>
            alert('erro ao inserir médico');
        </script>
<?php
    }
}

require '../../controller/conexao.php';

$diaEscolhido = $_POST["diaEscolhido"];


//$dia = date("Y-m-d");

$data = array(
    ':crm'  => $_POST["crm"],
    ':medico'  => $_POST["medico"],
    ':publico'  => $_POST["publico"],
    ':turno'  => $_POST["txtTurno"],
    ':obs'  => $_POST["txtObs"],
    ':ti'  => $_POST["ti"],
);

$crm = $data[':crm'];

$sqlMedico = "SELECT especialidade, modalidade FROM medico WHERE crm = ?";

$stmt =  $connect->prepare($sqlMedico);

$stmt->execute([$crm]);

$medico = $stmt->fetch();

//echo $medico['especialidade'];
//echo $medico['modalidade'];

$sqlold = "INSERT INTO presenca (crm, medico, especialidade, modalidade, publico, turno, obs, ti, plantao) 
VALUES (:crm,:medico,'" . $medico['especialidade'] . "','" . $medico['modalidade'] . "',:publico,:turno,:obs,:ti,'" . $diaEscolhido . "')";

//echo $sqlold;

$statement = $connect->prepare($sqlold);

if ($statement->execute($data)) {
    $output = array(
        'crm'  => $_POST["crm"],
        'medico'  => $_POST["medico"],
        'especialidade'  => $medico['especialidade'],
        'modalidade'  => $medico['modalidade'],
        'publico'  => $_POST["publico"],
        'obs'  => $_POST["txtObs"],
        'dia' => $diaEscolhido
    );

    echo json_encode($output);
}



/*
require '../../conexao.php';
$crm = $_POST["crm"];
$medico = $_POST["medico"];
$andar = $_POST["andar"];
$sala = $_POST["sala"];
$mesa = $_POST["mesa"];

$dia = date("Y-m-d");

$sqlold = "UPDATE presenca SET andar = '$andar', sala = '$sala', mesa = '$mesa' WHERE crm LIKE '$crm' AND plantao LIKE '$dia%';";

//$turns =  $turno['turno'];

$statement = $connect->prepare($sqlold);

//$sql = "INSERT INTO presenca (crm, medico, andar, sala, mesa, dia, ti, turno) VALUES ('$crm','$medico','$andar','$sala','$mesa','$dia','$ti','$turno');";
//echo $sql;
//$result = mysqli_query($strcon, $sql);
//echo $result;

if ($statement->execute()) {


    $select = "SELECT crm, medico, andar, sala, mesa, turno FROM presenca WHERE plantao LIKE '$dia%';";
    $stmt =  $connect->prepare($select);
    $stmt->execute();

    //echo $select;

    while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        foreach ($result as $med) {
            echo json_encode($med);
        }
    }
    /*while ($turno = $stmt->fetch()) {
        $output = array(
            'crm'  => $turno["crm"],
            'medico'  => $turno["medico"],
            'andar'  => $turno["andar"],
            'sala'  => $turno["sala"],
            'mesa'  => $turno["mesa"],
            'turno' => $turno["turno"]
        );
        echo json_encode($output);
    }*/
    //echo json_encode($output);*/
