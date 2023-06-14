<?php

require('../../codeigniter/app/Libraries/PHPExcel.php');

require('../../controller/conexao.php');

$excel = new PHPExcel();

//selecting active sheet


$dia = date("Y-m-d");
$data = date("d-m-Y");
$excel->setActiveSheetIndex(0);
//populate the data

//SELECT * FROM atendimento WHERE `dia` BETWEEN '2021-08-10' AND '2021-08-20';

$medicosHoje = mysqli_query($strcon, "select count(id) from presenca where plantao = '$dia'");
$array1 = mysqli_fetch_row($medicosHoje);
$qtd = $array1[0];



$mintercHoje = mysqli_query($strcon, "select count(id) from intercorrencia where dia = '$dia'");
$array2 = mysqli_fetch_row($mintercHoje);
$qtdInterc = $array2[0];

$excel->getActiveSheet()->getColumnDimension('A')->setWidth(115);

$responsaveis = mysqli_query($strcon, "SELECT enfResponsaveis, tiResponsaveis FROM relatorio WHERE dia = '$dia'");
while ($row = mysqli_fetch_array($responsaveis)) {
    $excel->getActiveSheet()
        ->setCellValue('A1', 'RELATÓRIO DE ENFERMAGEM TELESSAÚDE') //this is a title
        ->setCellValue('A2', $data) //this is a title
        ->setCellValue('A3', "No presente plantão na Central de Consultas On-line (CCOL) Unimed, tivemos $qtd médicos\n atendendo, divididos entre o sexto e sétimo andar da torre 2. Em relação à especialidade, dentre o número total\nde profissionais atendendo, atenderam médicos da família, clínicos, generalistas e pediatras.\nEm relação à modalidade de atendimento os médicos atendiam em Covid, PA online/covid, PA pediatria/covid, MFC/PA\nonline/covid. Quanto ao público os atendimentos foram divididos em público externo e reguladas.")
        ->setCellValue('A4', $row['enfResponsaveis'] . "\n" . $row['tiResponsaveis'])
        ->setCellValue('A5', "CONSIDERAÇÕES/INTERCORRÊNCIAS")
        ->setCellValue('A6', "Tivemos um total de $qtdInterc  registradas hoje, a serem detalhadas abaixo");
}


$sql = "SELECT * FROM intercorrencia WHERE dia = '$dia';";
//echo $sql;
$result = mysqli_query($strcon, $sql);
$linha = 7;
while ($data = mysqli_fetch_object($result)) {
    $excel->getActiveSheet()
        ->setCellValue(
            'A' . $linha,
            $data->hora . ' /-/ ' .
                $data->medico . ' /-/ ' .
                $data->descricao . ' /-/ ' .
                $data->soluc
        );
    $linha++;
}
//merging the title
$linhaatual = $linha - 1;
$dadosrel = mysqli_query($strcon, "SELECT * FROM relatorio WHERE dia = '$dia'");
while ($row = mysqli_fetch_array($dadosrel)) {
    $excel->getActiveSheet()
        ->setCellValue('A' . $linhaatual, 'OUTRAS INFORMAÇÕES')
        ->setCellValue('A' . $linhaatual, "Registramos um total de " . $row['qtdAtrasos'] . " atrasos,\n e de " . $row['qtdFaltas'] . " faltas.");
    $linhaatual++;
}

$dadosdashboard = mysqli_query($strcon, "SELECT * FROM relatorio WHERE dia = '$dia'");
while ($row = mysqli_fetch_array($dadosdashboard)) {
    $totalhorarios = $row['totalHorarios'];
    $totalcomsucesso = $row['totalClientes'];
    $totalsemsucesso = $row['totalSSucesso'];
    $totalnatendido = $row['totalNAtendidos'];
    $totalabsent = $row['totalAbsent'];
    $totallivre = $row['totalLivre'];
    $totalrealizados = $totalcomsucesso + $totalsemsucesso;
    $totaltudo = $totalrealizados + $totalnatendido + $totalabsent;

    $porcSucesso = ($totalcomsucesso / $totalhorarios) * 100;
    $porcSemSucesso = ($totalsemsucesso / $totalrealizados) * 100;
    $porcNAtendido = ($totalnatendido / $totaltudo) * 100;
    $porcAbsent = ($totalabsent / $totaltudo) * 100;
    $porcLivre = ($totallivre / $totalhorarios) * 100;
    $excel->getActiveSheet()
        ->setCellValue('A' . $linhaatual, 'DASHBOARD GERENCIAL')
        ->setCellValue('A' . $linhaatual, "No presente plantão foram disponibilizados um total de " . $row['totalHorarios'] . " horários. " . $row['totalClientes'] . " clientes foram atendidos com sucesso, o que representa ".number_format($porcSucesso,2)."% em relação ao número de horários ofertados. ".$row['totalSSucesso']." clientes foram atendidos sem sucesso, representando ".number_format($porcSemSucesso,2)."% em relação ao total de consultas realizadas. ".$row['totalNAtendidos']." clientes constam como não atendidos, representado ".number_format($porcNAtendido,2)."% do total de consultas realizadas, ".$totalabsent." clientes constam como absenteísmo, representando ".number_format($porcAbsent,2)."% do total de consultas realizadas. Em relação aos horários “sem agendamento” ficaram registrados ".$totallivre." horários livres, o que representa ".number_format($porcLivre,2)."% do total de horários ofertados (o gráfico de “horário livres apresenta os detalhamentos dos horários sem agendamento).");
}

$excel->getActiveSheet()->getStyle('A1:A' . ($linha - 1))->applyFromArray(
    array(
        'font' => array(
            'bold' => true,
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        )
    )
);
$excel->getActiveSheet()->getStyle('A1')->applyFromArray(
    array(
        'font' => array(
            'size' => 22
        )
    )
);
$excel->getActiveSheet()->getStyle('A2')->applyFromArray(
    array(
        'font' => array(
            'bold' => true,
            'size' => 14,
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        )
    )
);
$excel->getActiveSheet()->getStyle('A5')->applyFromArray(
    array(
        'font' => array(
            'bold' => true,
            'size' => 14,
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        )
    )
);
$excel->getActiveSheet()->getStyle('A1:A100')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

//aligning
$excel->getActiveSheet()->getStyle('A1:A100')->getAlignment()->setHorizontal('center');
$excel->getActiveSheet()->getStyle('A1:A100')->getAlignment()->setVertical('center');
//styling
/*
$excel->getActiveSheet()->getStyle('A4:D' . ($linha - 1))->applyFromArray(
    array(
        'borders' => array(
            'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            ),
            'vertical' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        )
    )
);*/
//redirect to browser (download) instead of saving the result as a file
//this is for MS Office Excel xls format
ob_clean();
ob_start(); # added 
header('Content-type: application/vnd.ms-excel; charset=UTF-8');

header('Content-Disposition: attachment;filename="Relatorio_Enfermagem_' . $data . '.xlsx"');

header('Cache-Control: max-age=0');
//write the result to a file
$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
//output to php output instead of filename
$file->save('php://output');