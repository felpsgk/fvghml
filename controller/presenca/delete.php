<?php


if (isset($_POST['id'])) {



    require '../../controller/conexao.php';

    $idmedico = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "DELETE FROM presenca WHERE id = '$idmedico';";

    //echo $sql;
    //echo $nome;

    $queryrodou = mysqli_query($strcon, $sql);

    $arrayUpdate[] = $queryrodou;
    $arrayUpdate[] = $nome;

    //echo $sala_arr;
    echo json_encode($arrayUpdate);
}

?>