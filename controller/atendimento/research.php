<?php

if (isset($_GET['atualizar'])) {


include 'controller/conexao.php';

$dia = $_GET['atualizar'];

$sql = "SELECT ti, crm, medico, andar, sala, 
mesa, sistema, criticidade, erro,descricao, 
status, observacao, dia, mes, hora FROM atendimento WHERE dia = '$dia';";

//echo $sql;

$result = mysqli_query($strcon, $sql);
// $output .= ' <table id="dataTable" class="table table-bordered dataTable">
//       <thead>
//         <tr>
//             <th scope="col" class="border sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="CRM: Ordenar colunas de forma descendente" style="width: 54.9688px;" aria-sort="ascending">CRM</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="NOME: Ordenar colunas de forma ascendente" style="width: 334.281px;">NOME</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ANDAR: Ordenar colunas de forma ascendente" style="width: 57.1406px;">ANDAR</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="SALA: Ordenar colunas de forma ascendente" style="width: 40px;">SALA</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="MESA: Ordenar colunas de forma ascendente" style="width: 44.0469px;">MESA</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="SISTEMA: Ordenar colunas de forma ascendente" style="width: 100.047px;">SISTEMA</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="CRITICIDADE: Ordenar colunas de forma ascendente" style="width: 98.125px;">CRITICIDADE</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ERRO: Ordenar colunas de forma ascendente" style="width: 219.391px;">ERRO</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="DESCRIÇÃO: Ordenar colunas de forma ascendente" style="width: 556.531px;">DESCRIÇÃO</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="STATUS: Ordenar colunas de forma ascendente" style="width: 65.8438px;">STATUS</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="OBSERVAÇÃO: Ordenar colunas de forma ascendente" style="width: 585.406px;">OBSERVAÇÃO</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="DIA: Ordenar colunas de forma ascendente" style="width: 59.7969px;">DIA</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="MÊS: Ordenar colunas de forma ascendente" style="width: 39.4375px;">MÊS</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="HORA: Ordenar colunas de forma ascendente" style="width: 46.0938px;">HORA</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="TI: Ordenar colunas de forma ascendente" style="width: 39.0312px;">TI</th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=" : Ordenar colunas de forma ascendente" style="width: 48.9219px;"></th>
//             <th scope="col" class="border sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=" : Ordenar colunas de forma ascendente" style="width: 34.5469px;"></th>
//         </tr>
// ';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <tbody>
        <tr>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["crm"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["medico"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["andar"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["sala"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["mesa"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["sistema"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["criticidade"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["erro"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["descricao"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["status"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["observacao"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["dia"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["mes"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["hora"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">' . $row["ti"] . '</td>
        <td scope="col" class="border" style="white-space: nowrap">Não é possível excluir egistros passados!</td>
        <td scope="col" class="border" style="white-space: nowrap"></td>

    </tr>
    </tbody>
        ';
    }
} else {
    $output .= '
    <tr>
    <td colspan="16">Nada encontrado</td>
    </tr>
    ';
}
$output .= '</table';
echo $output;
}


function readAtendimento()
{
    require 'controller/conexao.php';

    $dia = date("Y-m-d");

    $sql = "SELECT id, crm, medico, andar, sala, mesa, sistema, criticidade, erro, 

    descricao, status, observacao, dia, mes, hora, ti FROM atendimento WHERE dia = '$dia';";

    //echo $sql;

    $result = mysqli_query($strcon, $sql);

    //echo $result;

    while ($row = mysqli_fetch_array($result)) :; ?>

        <tr>
            <form onsubmit="return confirm('Deseja realmente realizar esta ação?')" action="DAO/atendimentoDAO.php" method="POST">
                <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>"></input>

                <td scope="row" class="border" style="white-space: nowrap"><?php echo $row['crm'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['medico'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['andar'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['sala'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['mesa'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['sistema'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['criticidade'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['erro'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['descricao'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['status'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['observacao'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['dia'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['mes'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['hora'] ?></td>

                <td scope="" class="border" style="white-space: nowrap"><?php echo $row['ti'] ?></td>

                <td>
                    <button type="submit" id="" name="atualizaatendimento" class="btn btn-sm btn-info">Atualizar</a>
                </td>

                <td><button type="submit" id="" name="deletaatendimento" class="btn btn-sm btn-danger">Excluir</button></td>
            </form>
        </tr>

<?php endwhile;
}
?>