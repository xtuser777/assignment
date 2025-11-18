<?php

$year = $_SESSION['YEAR'];
$id = '';
$unit_id = 0;
$name = '';
$identity = '';
$document = '';
$dependent_children = 0;
$birth_date = '';
$address = '';
$neighborhood = '';
$city = '';
$postal_code = '';
$phone = '';
$cellphone = '';
$email = '';
$observations = '';
$civil_status_id = 0;
$position_id = 0;
$discipline_id = 0;
$situation_id = 0;
$remove = '';
$adido = '';
$readapted = '';
$read_room = '';
$computing = '';
$supplement_charge = '';
$speciality = '';
$tutoring = '';
$ambiental_education = '';
$robotics = '';
$music = '';

?>
<h3 class="text-center">Criar novo professor</h3>
<hr>
<form action="?resource=teatchers&action=create" method="post">
    <div class="row">
        <div class="col-sm-2">
            <label for="id" class="form-label">Id:</label>
            <input type="number" class="form-control" name="id" id="id" value="<?= $id ?>">
        </div>
        <div class="col-sm-10">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $name ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label for="identity" class="form-label">RG:</label>
            <input type="text" class="form-control" name="identity" id="identity" value="<?= $identity ?>">
        </div>
        <div class="col-sm-3">
            <label for="document" class="form-label">CPF:</label>
            <input type="text" class="form-control" name="document" id="document" value="<?= $document ?>">
        </div>
        <div class="col-sm-2">
            <label for="birth_date" class="form-label">Data de nascimento:</label>
            <input type="date" class="form-control" name="birth_date" id="birth_date" value="<?= $birth_date ?>">
        </div>
        <div class="col-sm-3">
            <label for="civil_status_id" class="form-label">Estado civil:</label>
            <select class="form-control" name="civil_status_id" id="civil_status_id" value="<?= $civil_status_id ?>">
                <option value="0">Selecione</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="dependents" class="form-label">Nº Dependentes:</label>
            <input type="number" class="form-control" name="dependents" id="dependents"
                value="<?= $dependent_children ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label for="address" class="form-label">Endereço:</label>
            <input type="text" class="form-control" name="address" id="address" value="<?= $address ?>">
        </div>
        <div class="col-sm-3">
            <label for="neighborhood" class="form-label">Bairro:</label>
            <input type="text" class="form-control" name="neighborhood" id="neighborhood" value="<?= $neighborhood ?>">
        </div>
        <div class="col-sm-3">
            <label for="city" class="form-label">Cidade:</label>
            <input type="text" class="form-control" name="city" id="city" value="<?= $city ?>">
        </div>
        <div class="col-sm-2">
            <label for="postal_code" class="form-label">CEP:</label>
            <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?= $postal_code ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label for="phone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone ?>">
        </div>
        <div class="col-sm-2">
            <label for="cellphone" class="form-label">Celular:</label>
            <input type="text" class="form-control" name="cellphone" id="cellphone" value="<?= $cellphone ?>">
        </div>
        <div class="col-sm-8">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label for="observations" class="form-label">Observações:</label>
            <textarea class="form-control" name="observations" id="observations" rows="5"
                value="<?= $observations ?>"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label for="position_id" class="form-label">Cargo:</label>
            <select class="form-control" name="position_id" id="position_id" value="<?= $position_id ?>">
                <option value="0">Selecione</option>
            </select>
        </div>
        <div class="col-sm-5">
            <label for="discipline_id" class="form-label">Disciplina:</label>
            <select class="form-control" name="discipline_id" id="discipline_id" value="<?= $discipline_id ?>">
                <option value="0">Selecione</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="situation_id" class="form-label">Situação:</label>
            <select class="form-control" name="situation_id" id="situation_id" value="<?= $situation_id ?>">
                <option value="0">Selecione</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="remove" class="form-label">Remoção:</label>
            <select class="form-control" name="remove" id="remove" value="<?= $remove ?>">
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
            <label for="readapted" class="form-label">Readaptado:</label>
            <select class="form-control" name="readapted" id="readapted" value="<?= $readapted ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="read_room" class="form-label">Sala de leitura:</label>
            <select class="form-control" name="read_room" id="read_room" value="<?= $read_room ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="computing" class="form-label">Sala de informática:</label>
            <select class="form-control" name="computing" id="computing" value="<?= $computing ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="tutoring" class="form-label">Reforço:</label>
            <select class="form-control" name="tutoring" id="tutoring" value="<?= $tutoring ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="ambiental_education" class="form-label">Educação ambiental:</label>
            <select class="form-control" name="ambiental_education" id="ambiental_education" value="<?= $ambiental_education ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label for="robotics" class="form-label">Robotica:</label>
            <select class="form-control" name="robotics" id="robotics" value="<?= $robotics ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="music" class="form-label">Música:</label>
            <select class="form-control" name="music" id="music" value="<?= $music ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label for="supplement_charge" class="form-label">Carga suplementar:</label>
            <select class="form-control" name="supplement_charge" id="supplement_charge" value="<?= $supplement_charge ?>">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label for="speciality" class="form-label">Especialidade:</label>
            <input type="text" class="form-control" name="speciality" id="speciality" value="<?= $speciality ?>">
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