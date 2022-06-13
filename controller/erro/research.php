<?php

function readErro()
{

    require 'controller/conexao.php';

    $sql = "SELECT id, erro FROM erro;";

    //echo $sql;

    $result = mysqli_query($strcon, $sql);

    //echo $result;

    while ($row = mysqli_fetch_array($result)) :; ?>

        <option id="erro" value="<?php echo $row['erro'] ?>"><?php echo $row['erro'] ?></option>

<?php endwhile;
}
?>