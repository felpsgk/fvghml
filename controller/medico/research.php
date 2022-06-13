<?php
function readMedico()
{
    require 'controller/conexao.php';
    $sql = "SELECT medico, crm FROM medico;";
    //echo $sql;
    $result = mysqli_query($strcon, $sql);
    //echo $result;
    while ($row = mysqli_fetch_array($result)) :; ?>
        <option id="crm" value="<?php echo $row['crm'] ?>"><?php echo $row['medico'] ?></option>
    <?php endwhile;
}
?>