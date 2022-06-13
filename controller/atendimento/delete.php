<?php

if (isset($_POST['deletaatendimento'])) {

    require 'controller/conexao.php';

    $idmedico = $_POST['id'];

    $sql = "DELETE FROM atendimento WHERE id = '$idmedico';";

    //echo $sql;

    $queryrodou = mysqli_query($strcon, $sql);

    if ($queryrodou) {
        header('Location: ../atendimento.php');
    } else {
?>
        <script>
            alert('erro ao deletar atendimento');
        </script>
    <?php
    }
}

?>