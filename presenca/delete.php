<?php


if (isset($_POST['deletar'])) {



    require 'controller/conexao.php';

    $idmedico = $_POST['id'];
    $nome = $_POST['medico'];

    $sql = "DELETE FROM presenca WHERE id = '$idmedico';";

    //echo $sql;

    $queryrodou = mysqli_query($strcon, $sql);

    $arrayUpdate[] = $queryrodou;
    $arrayUpdate[] = $nome;

    //echo $sala_arr;
    echo json_encode($arrayUpdate);
}

?>