<?php



if (isset($_POST['updateAt'])) {
    require '../conexao.php';

    $idmedico = $_POST['id'];

    $crm = $_POST['crm'];
    $medico = $_POST['nome'];
    $andar = $_POST['andar'];
    $sala = $_POST['sala'];
    $mesa = $_POST['mesa'];
    $sistema = $_POST['sistema'];
    $criticidade = $_POST['criticidade'];
    $erro = $_POST['erro'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $observacao = $_POST['observacao'];
    $ti = $_POST['ti'];

    $sql = "UPDATE atendimento SET ti = '$ti', crm = '$crm', medico = '$medico', andar = '$andar',
    sala = '$sala', mesa = '$mesa', sistema = '$sistema', criticidade = '$criticidade', erro = '$erro',
    descricao = '$descricao', status = '$status', observacao = '$observacao'  WHERE id = '$idmedico'";

    //echo $sql;

    $queryrodou = mysqli_query($strcon, $sql);

    if ($queryrodou) {
        header('Location: ../atendimento.php');
    } else {
    ?>
        <script>
            alert('erro ao atualizar médico');
        </script>
    <?php
    }
}

//CODIGO REFERENTE A ATUALIZAÇÃO DA TABELA


if (isset($_POST['atualizaatendimento'])) {

    require '../conexao.php';

    $idmedico = $_POST['id'];

    $sql = "SELECT * FROM atendimento WHERE id = '$idmedico';";

    $result = mysqli_query($strcon, $sql);

    while ($row = mysqli_fetch_array($result)) {

        $crm = $row['crm'];
        $medico = $row['medico'];
        $andar = $row['andar'];
        $sala = $row['sala'];
        $mesa = $row['mesa'];
        $sistema = $row['sistema'];
        $criticidade = $row['criticidade'];
        $erro = $row['erro'];
        $descricao = $row['descricao'];
        $status = $row['status'];
        $observacao = $row['observacao'];
        $ti = $row['ti'];
    }
    ?>
    <form action="atendimentoDAO.php" method="POST">

        <input type="hidden" id="id" name="id" value="<?php echo $idmedico ?>"></input>
        <div class="modal-body">
            <div class="form-group">
                <label for="nome">CRM do médico</label>
                <input type="text" maxlength="8" required="required" name="crm" id="crm" class="form-control" placeholder="CRM" value="<?php echo $crm ?>">
            </div>
            <div class="form-group">
                <label for="crm">Nome do médico</label>
                <input required="required" type="text" id="nome" name="nome" class="form-control" placeholder="NOME" value="<?php echo $medico ?>">
            </div>
            <div class="form-group">
                <label for="nome">Andar do médico</label>
                <input type="text" required="required" name="andar" id="andar" class="form-control" placeholder="ANDAR" value="<?php echo $andar ?>">
            </div>
            <div class="form-group">
                <label for="crm">Sala do médico</label>
                <input required="required" type="text" id="sala" name="sala" class="form-control" placeholder="SALA" value="<?php echo $sala ?>">
            </div>
            <div class="form-group">
                <label for="nome">Mesa do médico</label>
                <input type="text" required="required" name="mesa" id="mesa" class="form-control" placeholder="MESA" value="<?php echo $mesa ?>">
            </div>
            <div class="form-group">
                <label for="crm">Sistema</label>
                <input required="required" type="text" id="sistema" name="sistema" class="form-control" placeholder="TURNO" value="<?php echo $sistema ?>">
            </div>
            <div class="form-group">
                <label for="crm">Criticidade</label>
                <input required="required" type="text" id="criticidade" name="criticidade" class="form-control" placeholder="TURNO" value="<?php echo $criticidade ?>">
            </div>
            <div class="form-group">
                <label for="crm">Erro</label>
                <input required="required" type="text" id="erro" name="erro" class="form-control" placeholder="TURNO" value="<?php echo $erro ?>">
            </div>
            <div class="form-group">
                <label for="crm">Descrição</label>
                <input required="required" type="text" id="descricao" name="descricao" class="form-control" placeholder="TURNO" value="<?php echo $descricao ?>">
            </div>
            <div class="form-group">
                <label for="crm">Status</label>
                <input required="required" type="text" id="status" name="status" class="form-control" placeholder="TURNO" value="<?php echo $status ?>">
            </div>
            <div class="form-group">
                <label for="crm">Observação</label>
                <input required="required" type="text" id="observacao" name="observacao" class="form-control" placeholder="TURNO" value="<?php echo $observacao ?>">
            </div>
            <div class="form-group">
                <label for="crm">TI Responsável</label>
                <input required="required" type="text" id="ti" name="ti" class="form-control" placeholder="TURNO" value="<?php echo $ti ?>">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="updateAt" class="btn btn-info">Atualizar</button>
        </div>
    </form>
    <?php
}


?>