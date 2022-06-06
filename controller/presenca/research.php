<?php
$output = "";

function readMedicoList()
{
    require 'controller/conexao.php';

    $dia = date("Y-m-d");

    $sql = "SELECT medico, crm FROM presenca WHERE plantao GROUP BY medico;";

    echo $sql;
    $result = mysqli_query($strcon, $sql);

    //echo $result;

    while ($row = mysqli_fetch_array($result)) :; ?>

        <option id="<?php echo $row['crm'] ?>" value="<?php echo $row['medico'] ?>"><?php echo $row['crm'] ?></option>

    <?php endwhile;
}

if (isset($_POST["medico"])) {
    require '../../controller/conexao.php';
    $nomemedico = $_POST["medico"];
    $dia = date("Y-m-d");

    $sql = "SELECT * FROM medico WHERE medico = '$nomemedico' GROUP BY medico;";
    //echo $sql;
    $output = "";
    $result = mysqli_query($strcon, $sql);
    //echo $sql;
    //$result = mysqli_query($strcon, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output = array(
            'id' => $row['id'],
            'medico'  => $row['medico'],
            'crm'  => $row['crm'],
            'tipocontratacao'  => $row['tipocontratacao'],
            'adm'  => $row['adm'],
            'email'  => $row['email'],
            'modalidade'  => $row['modalidade'],
            'especialidade'  => $row['especialidade'],
            'mv'  => $row['mv'],
            'usuario'  => $row['usuario'],
            'prestador'  => $row['prestador'],
            'certificadodigital'  => $row['certificadodigital'],
            'empresatelessaude'  => $row['empresatelessaude'],
            'consolsol'  => $row['consolsol'],
            'plataforma'  => $row['plataforma'],
            'login'  => $row['formaLogin'],
            'origem'  => $row['origem'],
            'empresa'  => $row['empresapj'],
            'obs'  => $row['obs'],
        );
    }
    //    select id, medico, cartaovacina, cartaodevacina from medico where cartaovacina <> "" OR cartaodevacina <> "";
    echo json_encode($output);
}

function readMedicoListGestDados()
{
    require 'controller/conexao.php';

    $dia = date("Y-m-d");

    $sql = "SELECT medico, crm FROM medico GROUP BY medico;";

    //echo $sql;
    $result = mysqli_query($strcon, $sql);

    //echo $result;

    while ($row = mysqli_fetch_array($result)) :; ?>

        <option id="<?php echo $row['crm'] ?>" value="<?php echo $row['medico'] ?>"><?php echo $row['crm'] ?></option>

    <?php endwhile;
}

function readMedicoListCoop()
{
    require 'controller/conexao.php';

    $dia = date("Y-m-d");

    $sql = "SELECT medico, crm FROM medico WHERE tipocontratacao = 'COOPERADO' GROUP BY medico;";

    echo $sql;
    $result = mysqli_query($strcon, $sql);

    //echo $result;

    while ($row = mysqli_fetch_array($result)) :; ?>

        <option id="<?php echo $row['crm'] ?>" value="<?php echo $row['medico'] ?>"><?php echo $row['crm'] ?></option>

    <?php endwhile;
}

function readMedicoDia()
{
    require 'controller/conexao.php';
    $dia = date("Y-m-d");
    $sql = "SELECT medico, crm FROM presenca WHERE plantao LIKE '$dia%' GROUP BY medico;";
    $result = mysqli_query($strcon, $sql);
    //echo $result;
    while ($row = mysqli_fetch_array($result)) :; ?>
        <option id="<?php echo $row['crm'] ?>" value="<?php echo $row['medico'] ?>"><?php echo $row['crm'] ?></option>



    <?php endwhile;
}


function readPresenca()
{
    require 'controller/conexao.php';

    $dia = date("Y-m-d");
    $voucher = "";

    $sql = "SELECT id, crm, medico,
    turno, chegada, saida, intervalo, voucher, 
    obs, andar, sala, mesa 
    FROM presenca 
    WHERE plantao LIKE '$dia%';";
    //echo $sql;
    $result = mysqli_query($strcon, $sql);
    //$row = mysqli_fetch_array($result);


    ?>
    <table id="dataTable" class="table table-sm bg-secondary text-white">
        <thead>
            <tr>
                <th class="border text-center bg-success">CRM</th>
                <th class="border text-center bg-success">NOME</th>
                <th class="border text-center bg-success">TURNO</th>
                <th class="border text-center bg-success">CHEGADA</th>
                <th class="border text-center bg-success">SAIDA</th>
                <th class="border text-center bg-success">INTERVALO</th>
                <th class="border text-center bg-success">VOUCHER</th>
                <th class="border text-center bg-success">OBS</th>
                <th class="border text-center bg-primary">ANDAR</th>
                <th class="border text-center bg-primary">SALA</th>
                <th class="border text-center bg-primary">MESA</th>
                <th class="border text-center">
                <th class="border text-center">
            </tr>
        </thead>
        <tbody id="corpoTabela">
            <?php
            $i = 1;
            while ($row = mysqli_fetch_array($result)) :;
                $chegadaDoMedico = "";
                $saidaDoMedico = "";
                if ($row['chegada'] != null) {
                    $horaChegadaBanco = date_create($row['chegada']);
                    $chegadaDoMedico = date_format($horaChegadaBanco, 'H:i:s');
                }
                if ($row['saida'] != null) {
                    $horaSaidaBanco = date_create($row['saida']);
                    $saidaDoMedico = date_format($horaSaidaBanco, 'H:i:s');
                }
            ?>

                <tr>
                    <form class="presencaForm" method="POST">
                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border"><input name="crm" style="background-color: #858796; color: #fff; width: 100px; height: 50px;" type="text" autocomplete="off" class="border-0 text-center" maxlength="8" id="crm" value="<?php echo $row['crm'] ?>"></td>

                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="nomeForm"><input name="nome" style="background-color: #858796; color: #fff; width: 250px; height: 50px;" type="text" autocomplete="off" class="border-0 text-center" id="medico" value="<?php echo $row['medico'] ?>">
                        </td>
                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="turnoForm"><input name="turno" style="background-color: #858796; color: #fff; width: 100px; height: 50px;" type="text" autocomplete="off" class="border-0 text-center" id="turno" value="<?php echo $row['turno'] ?>">
                        </td>
                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="<?php echo $row['chegada'] ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input name="chegadaForm" class="me-2" style="background-color: #858796; color: #fff;" type="checkbox" onchange="pegaHora('chegada<?php echo $row['id']; ?>')" aria-label="Checkbox for following text input">
                                        <input name="chegada" style="background-color: #858796; color: #fff; width: 70px; text-align: center;" type="text" class="border-0 form-control" id="chegada<?php echo $row['id']; ?>" value="<?php echo $chegadaDoMedico ?>" aria-label="Text input with checkbox">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="<?php echo $row['saida'] ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input name="saida" class="me-2" type="checkbox" onchange="pegaHora('saida<?php echo $row['id']; ?>')" aria-label="Checkbox for following text input">
                                        <input name="saida" style="background-color: #858796; color: #fff; width: 70px; text-align: center;" type="text" class="border-0 form-control" id="saida<?php echo $row['id']; ?>" value="<?php echo $saidaDoMedico ?>" aria-label="Text input with checkbox">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="intervalo"><input name="intervalo" style="background-color: #858796; color: #fff; height: 50px;" type="text" autocomplete="off" class="border-0 text-center" id="intervalo" value="<?php echo $row['intervalo'] ?>"></td>

                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="voucher">
                            <input name="voucher" style="background-color: #858796; color: #fff;" type="checkbox" class="border-0 text-center" id="voucher" value="<?php echo $row['voucher'] ?>" <?php if ($row['voucher'] == 'sim') echo "checked='checked'";  ?>>
                        </td>
                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="<?php echo $row['obs'] ?>">
                            <textarea name="obs" style="background-color: #858796; color: #fff; width: 200px; height: 50px;" autocomplete="off" class="border-0 text-center" id="obs"><?php echo $row['obs'] ?></textarea>
                        </td>
                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="<?php echo $row['andar'] ?>">
                            <input name="andar" style="background-color: #858796; color: #fff; width: 70px; height: 50px;" type="text" autocomplete="off" class="border-0 text-center" id="andar" value="<?php echo $row['andar'] ?>">
                        </td>
                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="<?php echo $row['sala'] ?>">
                            <input name="sala" style="background-color: #858796; color: #fff; width: 70px; height: 50px;" type="text" autocomplete="off" class="border-0 text-center" id="sala" value="<?php echo $row['sala'] ?>">
                        </td>
                        <input type="hidden" id="idcrmmedico" name="idcrmmedico" value="<?php echo $row['id']; ?>"></input>
                        <td class="border" name="<?php echo $row['mesa'] ?>">
                            <input name="mesa" style="background-color: #858796; color: #fff; width: 70px; height: 50px;" type="text" autocomplete="off" class="border-0 text-center" id="mesa" value="<?php echo $row['mesa'] ?>">
                        </td>
                        <td>
                            <button type="submit" name="presencaForm" value="<?php echo $row['id'] ?>" class="btn btn-sm btn-info">Atualizar</a>
                        </td>
                    </form>
                    <form class="delete" method="POST">
                        <input type="hidden" id="idmedico" class="idmedico" name="idmedico" value="<?php echo $row['id']; ?>"></input>
                        <input type="hidden" id="nome" name="nome" value="<?php echo $row['medico'] ?>"></input>
                        <td>
                            <button onclick="return confirm('Deseja realmente retirar o(a) médico(a) <?php echo $row['medico'] ?> dos presentes de hoje?');" id="delete" class="btn btn-sm btn-danger">Excluir</button>
                        </td>
                    </form>
                </tr>
            <?php
            endwhile;

            ?>
        </tbody>
        <div class="alert alert-success" id="success" style="display:none"></div>
        <div class="alert alert-danger" id="danger" style="display:none"></div>

    <?php
}
    ?>

    <?php
    if (isset($_GET['atualizarPresenca'])) {

        include '../../controller/conexao.php';

        $dia = $_GET['atualizarPresenca'];

        $sql = "SELECT id, crm, medico, andar, sala, mesa, turno FROM presenca WHERE plantao LIKE '$dia%';";

        //echo $sql;

        $result = mysqli_query($strcon, $sql);
        $output .= ' <table id="presenca" class="table bg-success bg-gradient rounded text-white">
        <thead>
            <tr>
                <th class="border">CRM</th>
                <th class="border">NOME</th>
                <th class="border">ANDAR</th>
                <th class="border">SALA</th>
                <th class="border">MESA</th>
                <th class="border">TURNO</th>
                <th colspan="col-2" class="border">

                </th>
            </tr>
            ';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '
            <tr>

                <td class="border" style="white-space: nowrap">' . $row["crm"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["medico"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["andar"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["sala"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["mesa"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["turno"] . '</td>

                <td class="border" style="white-space: nowrap">Não é possível excluir registros passados!</td>

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
        $output .= '
    </table>';
        echo $output;
    }


    if (isset($_GET['atualizarEscala'])) {


        include '../../controller/conexao.php';

        $dia = $_GET['atualizarEscala'];

        $sql = "SELECT crm, medico, especialidade, modalidade, publico, obs FROM presenca WHERE plantao LIKE '$dia%';";

        //echo $sql;

        $result = mysqli_query($strcon, $sql);
        $output .= ' <table id="presenca" class="table bg-success bg-gradient rounded text-white">
        <thead>
            <tr>
                <th class="border">CRM</th>
                <th class="border">NOME</th>
                <th class="border">ESPECIALIDADE</th>
                <th class="border">MODALIDADE</th>
                <th class="border">PUBLICO</th>
                <th class="border">OBSERVAÇÃO</th>
                <th colspan="col-2" class="border">

                </th>
            </tr>
            ';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '
            <tr>

                <td class="border" style="white-space: nowrap">' . $row["crm"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["medico"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["especialidade"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["modalidade"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["publico"] . '</td>

                <td class="border" style="white-space: nowrap">' . $row["obs"] . '</td>

                <td class="border" style="white-space: nowrap">Não é possível excluir registros passados!</td>

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
        $output .= '</table';
        echo $output;
    }

    if (isset($_GET['atualizar'])) {
        require 'controller/conexao.php';
        $dia = $_GET['atualizar'];
        $sql = "SELECT crm, medico, andar, sala, mesa, dia, ti, turno FROM presenca WHERE dia = '$dia';";
        echo $sql;
        $result = mysqli_query($strcon, $sql);
        $output .= ' <table id="presenca" class="table bg-success bg-gradient rounded text-white">
                  <thead>
                    <tr>
                      <th scope="col">CRM</th>
                      <th scope="col">NOME</th>
                      <th scope="col">ANDAR</th>
                      <th scope="col">SALA</th>
                      <th scope="col">MESA</th>
                      <th scope="col">DIA</th>
                      <th scope="col">TI</th>
                      <th scope="col">TURNO</th>
                      <th scope="col-2">
                        <input type="text" name="dia" id="dia" class="form-control" placeholder="Escolha uma data" />
                      </th>
                    </tr>
            ';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '
                    <tr>
        
                        <td scope="col" class="border">' . $row["crm"] . '</td>
        
                        <td scope="col" class="border">' . $row["medico"] . '</td>
        
                        <td scope="col" class="border">' . $row["andar"] . '</td>
        
                        <td scope="col" class="border">' . $row["sala"] . '</td>
        
                        <td scope="col" class="border">' . $row["mesa"] . '</td>
        
                        <td scope="col" class="border">' . $row["dia"] . '</td>
        
                        <td scope="col" class="border">' . $row["ti"] . '</td>
        
                        <td scope="col" class="border">' . $row["turno"] . '</td>
        
                        <td scope="col" class="border">botoes</td>
        
                    </tr>
                    ';
            }
        } else {
            $output .= '
                    <tr>
                        <td colspan="9">Nada encontrado</td>
                    </tr>
                    ';
        }
        $output .= '</table';
        echo $output;
    }
    ?>