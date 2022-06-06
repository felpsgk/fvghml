<?php

if (isset($_GET['attPorAndar'])) {

    include 'controller/conexao.php';

    $dia = $_GET['atualizarPresenca'];

    $sql = "SELECT id, crm, medico, andar, sala, mesa, turno FROM presenca WHERE plantao LIKE  '$dia%';";

    //echo $sql;

    $result = mysqli_query($strcon, $sql);
    $output .= ' <table id="presenca" class="table bg-success bg-gradient rounded text-white">
          <thead>
            <tr>
                <th  class="border">CRM</th>
                <th  class="border">NOME</th>
                <th  class="border">ANDAR</th>
                <th  class="border">SALA</th>
                <th  class="border">MESA</th>
                <th  class="border">TURNO</th>
                <th colspan="col-2" class="border">
              
              </th>
            </tr>
    ';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
            <tr>

            <td  class="border" style="white-space: nowrap">' . $row["crm"] . '</td>

            <td  class="border" style="white-space: nowrap">' . $row["medico"] . '</td>

            <td  class="border" style="white-space: nowrap">' . $row["andar"] . '</td>

            <td  class="border" style="white-space: nowrap">' . $row["sala"] . '</td>

            <td  class="border" style="white-space: nowrap">' . $row["mesa"] . '</td>

            <td  class="border" style="white-space: nowrap">' . $row["turno"] . '</td>

            <td  class="border" style="white-space: nowrap">Não é possível excluir registros passados!</td>

        </tr>
            ';
        }
    } else {
        $output .= '
        <tr>
        <td colspan="8">Nada encontrado</td>
        </tr>
        ';
    }
    $output .= '</table>';
    echo $output;
}


function readAndarPresenca()
{
    require 'conexao.php';

    $dia = date("Y-m-d");

    $sql = "SELECT andar FROM presenca 
        WHERE plantao LIKE '$dia%' GROUP BY andar";

    /*echo $sql;

    */
    $result = mysqli_query($strcon, $sql);

    //echo $result;

    while ($row = mysqli_fetch_array($result)) :; ?>

        <option name="andar" value="<?php echo $row['andar'] ?>"><?php echo $row['andar'] ?></option>

    <?php endwhile;
}

function readAndar()
{

    require 'controller/conexao.php';

    $sql = "SELECT andar FROM andar;";

    //echo $sql;

    $result = mysqli_query($strcon, $sql);

    //echo $result;

    while ($row = mysqli_fetch_array($result)) :; ?>

        <option name="andar" value="<?php echo $row['andar'] ?>"><?php echo $row['andar'] ?></option>

<?php endwhile;
}
?>