<?php
//insertIntercorrencia
if (isset($_POST['acao'])) {
    if ($_POST['acao'] == "inserir") {
        insertRelatorio();
    }
}
function insertRelatorio()
{
    require "conexao.php";
    $dia = date("Y-m-d");

    $sql = "SELECT * FROM relatorio WHERE dia = '$dia';";

    $intercorrenciaHoje = mysqli_query($strcon, "select count(id) from intercorrencia where dia = '$dia'");
    $array = mysqli_fetch_row($intercorrenciaHoje);
    $qtdInterco = $array[0];

    $atrasoHoje = mysqli_query($strcon, 
    "SELECT count(id) FROM intercorrencia WHERE tipo = 'atraso' AND dia = '$dia'");
    $array = mysqli_fetch_row($atrasoHoje);
    $qtdAtraso = $array[0];

    $faltaHoje = mysqli_query($strcon, 
    "SELECT count(id) FROM intercorrencia WHERE tipo = 'falta' AND dia = '$dia'");
    $array = mysqli_fetch_row($faltaHoje);
    $qtdFalta = $array[0];

    $voucherHoje = mysqli_query($strcon, 
    "SELECT count(id) FROM presenca WHERE voucher ='sim' AND plantao = '$dia'");
    $array = mysqli_fetch_row($voucherHoje);
    $qtdVoucher = $array[0];
    //echo $sql;
    $result = mysqli_query($strcon, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "teste";
        $enfResponsaveis = $_POST['enf1'];
        $enfResponsaveis .= ' -- ';
        $enfResponsaveis .= $_POST['turnoenf1'];
        $enfResponsaveis .= ' // ';
        $enfResponsaveis .= $_POST['enf2'];
        $enfResponsaveis .= ' -- ';
        $enfResponsaveis .= $_POST['turnoenf2'];

        $tiResponsaveis = $_POST['ti1'];
        $tiResponsaveis .= ' -- ';
        $tiResponsaveis .= $_POST['turnoti1'];
        $tiResponsaveis .= ' // ';
        $tiResponsaveis .= $_POST['ti2'];
        $tiResponsaveis .= ' -- ';
        $tiResponsaveis .= $_POST['turnoti2'];
        
        $qtdIntercorrencias = $qtdInterco;
        $qtdAtrasos = $qtdAtraso;
        $qtdFaltas = $qtdFalta;
        $totalHorarios = $_POST['totalHorarios'];
        $totalClientes = $_POST['totalClientes'];
        $totalSSucesso = $_POST['totalSSucesso'];
        $totalNAtendidos = $_POST['totalNAtendidos'];
        $totalAbsent = $_POST['totalAbsent'];
        $totalLivre = $_POST['totalLivre'];
        $totalVoucher = $qtdVoucher;

        $sql = "INSERT INTO relatorio (
        dia, enfResponsaveis, tiResponsaveis, 
        qtdIntercorrencias, qtdAtrasos, qtdFaltas, totalHorarios,
        totalClientes, totalSSucesso, totalNAtendidos, totalAbsent, totalLivre, totalVoucher
        ) VALUES (
        '$dia', '$enfResponsaveis','$tiResponsaveis','$qtdIntercorrencias','$qtdAtrasos',
        '$qtdFaltas','$totalHorarios','$totalClientes',
        '$totalSSucesso','$totalNAtendidos','$totalAbsent',
        '$totalLivre','$totalVoucher'
        );";

        //echo $sql;

        mysqli_query($strcon, $sql);

        header('Location: ../relatorio.php');

    } else if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $enfResponsaveis = $_POST['enf1'];
        $enfResponsaveis .= ' -- ';
        $enfResponsaveis .= $_POST['turnoenf1'];
        $enfResponsaveis .= ' // ';
        $enfResponsaveis .= $_POST['enf2'];
        $enfResponsaveis .= ' -- ';
        $enfResponsaveis .= $_POST['turnoenf2'];

        $tiResponsaveis = $_POST['ti1'];
        $tiResponsaveis .= ' -- ';
        $tiResponsaveis .= $_POST['turnoti1'];
        $tiResponsaveis .= ' // ';
        $tiResponsaveis .= $_POST['ti2'];
        $tiResponsaveis .= ' -- ';
        $tiResponsaveis .= $_POST['turnoti2'];
        
        $qtdIntercorrencias = $qtdInterco;
        $qtdAtrasos = $qtdAtraso;
        $qtdFaltas = $qtdFalta;
        $totalHorarios = $_POST['totalHorarios'];
        $totalClientes = $_POST['totalClientes'];
        $totalSSucesso = $_POST['totalSSucesso'];
        $totalNAtendidos = $_POST['totalNAtendidos'];
        $totalAbsent = $_POST['totalAbsent'];
        $totalLivre = $_POST['totalLivre'];
        $totalVoucher = $qtdVoucher;

        $sql = "UPDATE relatorio SET enfResponsaveis = '$enfResponsaveis', tiResponsaveis = '$tiResponsaveis', 
        qtdIntercorrencias = '$qtdIntercorrencias', qtdAtrasos = '$qtdAtrasos', 
        qtdFaltas = '$qtdFaltas', totalHorarios = '$totalHorarios', totalClientes ='$totalClientes', 
        totalSSucesso = '$totalSSucesso', totalNAtendidos = '$totalNAtendidos', 
        totalAbsent = '$totalAbsent', totalLivre = '$totalLivre', totalVoucher = '$totalVoucher'
        WHERE id = '$id'";
        //echo $sql;
        mysqli_query($strcon, $sql);

        header('Location: ../relatorio.php');
    }
}

?>