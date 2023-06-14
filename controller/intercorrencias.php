<?php
//insertIntercorrencia
if (isset($_POST['acao'])) {
    if ($_POST['acao'] == "inserir") {
        insertIntercorrencia();
    }
}

function insertIntercorrencia()
{
    require "conexao.php";
    //echo $_SESSION['usuario'];
    $medico = $_POST['medico'];

    $dia = $_POST['dia'];

    $hora = $_POST['hora'];

    $tipo = $_POST['tipo'];

    $numeroAt = $_POST['numeroAt'];
    if ($numeroAt == null) {
        $numeroAt = "não";
    }
    $chamado = $_POST['chamado'];
    if ($chamado == null) {
        $chamado = "não";
    }

    $descricao = $_POST['descricao'];

    $soluc = $_POST['soluc'];

    $enf = $_POST['enf'];

    $sql = "INSERT INTO intercorrencia (
    medico, dia, 
    hora, tipo, numeroAt, 
    chamado, descricao, soluc, enf
    ) VALUES (
        '$medico','$dia','$hora',
        '$tipo','$numeroAt','$chamado',
        '$descricao','$soluc','$enf'
        );";

    //echo $sql;

    mysqli_query($strcon, $sql);

    header('Location: ../intercorrencia.php');
}

function readIntercorrencias()
{
    require './controller/conexao.php';

    $dia = date("Y-m-d");

    $sql = "SELECT * FROM intercorrencia WHERE dia = '$dia';";

    //echo $sql;

    $result = mysqli_query($strcon, $sql);

    //echo $result;

    while ($row = mysqli_fetch_array($result)) :; ?>

        <tr>
            <form onsubmit="return confirm('Deseja realmente realizar esta ação?')" action="DAO/intercorrencias.php" method="POST">
                <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>"></input>

                <td scope="row" class="border" style="white-space: nowrap"><?php echo $row['dia'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['hora'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['tipo'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['numeroAt'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['descricao'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['soluc'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['enf'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['chamado'] ?></td>

                <td>
                    <button type="submit" id="btnAtt" name="atualizaintercorrencia" class="btn btn-sm btn-info">Atualizar</a>
                </td>

                <td><button type="submit" id="btnDel" name="deletaintercorrencia" class="btn btn-sm btn-danger">Excluir</button></td>
            </form>
        </tr>

<?php endwhile;
}
?>