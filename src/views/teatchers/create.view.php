<?php

use App\Controllers\TeatchersController;

$teatchersController = new TeatchersController();

$fields = [];

$fields['idano'] = intval($_SESSION['YEAR']);
$fields['idprofessor'] = '';
$fields['idunidade'] = filter_input(INPUT_POST, 'idunidade', FILTER_SANITIZE_NUMBER_INT);
$fields['nome'] = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$fields['rg'] = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$fields['cpf'] = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$fields['filhosdependentes'] = filter_input(INPUT_POST, 'filhosdependentes', FILTER_SANITIZE_NUMBER_INT);
$fields['nascimento'] = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
$fields['endereco'] = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$fields['bairro'] = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$fields['cidade'] = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$fields['cep'] = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$fields['telefone'] = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$fields['celular'] = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$fields['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$fields['observacoes'] = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING);
$fields['idestado_civil'] = filter_input(INPUT_POST, 'idestado_civil', FILTER_SANITIZE_NUMBER_INT);
$fields['idcargo'] = filter_input(INPUT_POST, 'idcargo', FILTER_SANITIZE_NUMBER_INT);
$fields['iddisciplina'] = filter_input(INPUT_POST, 'iddisciplina', FILTER_SANITIZE_NUMBER_INT);
$fields['idsituacao'] = filter_input(INPUT_POST, 'idsituacao', FILTER_SANITIZE_NUMBER_INT);
$fields['remocao'] = filter_input(INPUT_POST, 'remocao', FILTER_SANITIZE_STRING);
$fields['adido'] = filter_input(INPUT_POST, 'adido', FILTER_SANITIZE_STRING);
$fields['readaptado'] = filter_input(INPUT_POST, 'readaptado', FILTER_SANITIZE_STRING);
$fields['saladeleitura'] = filter_input(INPUT_POST, 'saladeleitura', FILTER_SANITIZE_STRING);
$fields['informatica'] = filter_input(INPUT_POST, 'informatica', FILTER_SANITIZE_STRING);
$fields['cargasuplementar'] = filter_input(INPUT_POST, 'cargasuplementar', FILTER_SANITIZE_STRING);
$fields['especialidade'] = filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_STRING);
$fields['reforco'] = filter_input(INPUT_POST, 'reforco', FILTER_SANITIZE_STRING);
$fields['educacaoambiental'] = filter_input(INPUT_POST, 'educacaoambiental', FILTER_SANITIZE_STRING);
$fields['robotica'] = filter_input(INPUT_POST, 'robotica', FILTER_SANITIZE_STRING);
$fields['musica'] = filter_input(INPUT_POST, 'musica', FILTER_SANITIZE_STRING);

?>
<h3 class="text-center">Criar novo professor</h3>
<hr>
<form action="?resource=teatchers&action=create" method="post">
    <div class="row">
        <div class="col-sm-4">
            <label for="idunidade" class="form-label">Unidade:</label>
            <select name="idunidade" id="idunidade" class="form-control">
                <option value="0">Selecione</option>
            </select>
        </div>
        <div class="col-sm-8">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label for="rg" class="form-label">RG:</label>
            <input type="text" class="form-control" name="rg" id="rg" value="<?= $rg ?>">
        </div>
        <div class="col-sm-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="<?= $cpf ?>">
        </div>
        <div class="col-sm-2">
            <label for="nascimento" class="form-label">Data de nascimento:</label>
            <input type="date" class="form-control" name="nascimento" id="nascimento" value="<?= $nascimento ?>">
        </div>
        <div class="col-sm-3">
            <label for="idestado_civil" class="form-label">Estado civil:</label>
            <select class="form-control" name="idestado_civil" id="idestado_civil" value="<?= $idestado_civil ?>">
                <option value="0">Selecione</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="filhosdependentes" class="form-label">Nº Dependentes:</label>
            <input type="number" class="form-control" name="filhosdependentes" id="filhosdependentes"
                value="<?= $filhosdependentes ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" class="form-control" name="endereco" id="endereco" value="<?= $endereco ?>">
        </div>
        <div class="col-sm-3">
            <label for="bairro" class="form-label">Bairro:</label>
            <input type="text" class="form-control" name="bairro" id="bairro" value="<?= $bairro ?>">
        </div>
        <div class="col-sm-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" class="form-control" name="cidade" id="cidade" value="<?= $cidade ?>">
        </div>
        <div class="col-sm-2">
            <label for="cep" class="form-label">CEP:</label>
            <input type="text" class="form-control" name="cep" id="cep" value="<?= $cep ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="<?= $telefone ?>">
        </div>
        <div class="col-sm-2">
            <label for="celular" class="form-label">Celular:</label>
            <input type="text" class="form-control" name="celular" id="celular" value="<?= $celular ?>">
        </div>
        <div class="col-sm-8">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label for="observacoes" class="form-label">Observações:</label>
            <textarea class="form-control" name="observacoes" id="observacoes" rows="5"
                value="<?= $observacoes ?>"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label for="idcargo" class="form-label">Cargo:</label>
            <select class="form-control" name="idcargo" id="idcargo" value="<?= $idcargo ?>">
                <option value="0">Selecione</option>
            </select>
        </div>
        <div class="col-sm-5">
            <label for="iddisciplina" class="form-label">Disciplina:</label>
            <select class="form-control" name="iddisciplina" id="iddisciplina" value="<?= $iddisciplina ?>">
                <option value="0">Selecione</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="idsituacao" class="form-label">Situação:</label>
            <select class="form-control" name="idsituacao" id="idsituacao" value="<?= $idsituacao ?>">
                <option value="0">Selecione</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="remocao" class="form-label">Remoção:</label>
            <select class="form-control" name="remocao" id="remocao" value="<?= $remocao ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label for="adido" class="form-label">Adido:</label>
            <select class="form-control" name="adido" id="adido" value="<?= $adido ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="readaptado" class="form-label">Readaptado:</label>
            <select class="form-control" name="readaptado" id="readaptado" value="<?= $readaptado ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="saladeleitura" class="form-label">Sala de leitura:</label>
            <select class="form-control" name="saladeleitura" id="saladeleitura" value="<?= $saladeleitura ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="informatica" class="form-label">Sala de informática:</label>
            <select class="form-control" name="informatica" id="informatica" value="<?= $informatica ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="reforco" class="form-label">Reforço:</label>
            <select class="form-control" name="reforco" id="reforco" value="<?= $reforco ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="educacaoambiental" class="form-label">Educação ambiental:</label>
            <select class="form-control" name="educacaoambiental" id="educacaoambiental" value="<?= $educacaoambiental ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label for="robotica" class="form-label">Robotica:</label>
            <select class="form-control" name="robotica" id="robotica" value="<?= $robotica ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="musica" class="form-label">Música:</label>
            <select class="form-control" name="musica" id="musica" value="<?= $musica ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="cargasuplementar" class="form-label">Carga suplementar:</label>
            <select class="form-control" name="cargasuplementar" id="cargasuplementar" value="<?= $cargasuplementar ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label for="especialidade" class="form-label">Especialidade:</label>
            <input type="text" class="form-control" name="especialidade" id="especialidade" value="<?= $especialidade ?>">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-2">
            <a href="?resource=teatchers&action=index" role="button" class="btn btn-light w-100">Voltar</a>
        </div>

        <div class="col-sm-2 ms-auto">
            <button type="submit" class="btn btn-success w-100">Salvar</button>
        </div>
    </div>
</form>