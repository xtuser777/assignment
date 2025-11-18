<?php

namespace App\Models;

use App\Tools\Database;
use PDO;

class Teatcher
{
    public $id = 0;
    public $year_id = 0;
    public $unit_id = 0;
    public $name = '';
    public $identity = '';
    public $document = '';
    public $dependent_children = 0;
    public $birth_date = '';
    public $address = '';
    public $neighborhood = '';
    public $city = '';
    public $postal_code = '';
    public $phone = '';
    public $cellphone = '';
    public $email = '';
    public $observations = '';
    public $civil_status_id = 0;
    public $position_id = 0;
    public $discipline_id = 0;
    public $situation_id = 0;
    public $remove = '';
    public $adido = '';
    public $readapted = '';
    public $read_room = '';
    public $computing = '';
    public $supplement_charge = '';
    public $speciality = '';
    public $tutoring = '';
    public $ambiental_education = '';
    public $robotics = '';
    public $music = '';

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from professores where idprofessor = ?;";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $model = new Teatcher();
        $model->id = $row['idprofessor'];
        $model->year_id = $row['idano'];
        $model->unit_id = $row['idunidade'];
        $model->name = $row['nome'];
        $model->identity = $row['rg'];
        $model->document = $row['cpf'];
        $model->birth_date = $row['nascimento'];
        $model->dependent_children = $row['filhosdependentes'];
        $model->address = $row['endereco'];
        $model->neighborhood = $row['bairro'];
        $model->city = $row['city'];
        $model->postal_code = $row['cep'];
        $model->phone = $row['telefone'];
        $model->cellphone = $row['celular'];
        $model->email = $row['email'];
        $model->observations = $row['observacoes'];
        $model->civil_status_id = $row['idestado_civil'];
        $model->position_id = $row['idcargo'];
        $model->discipline_id = $row['iddisciplina'];
        $model->situation_id = $row['idsituacao'];
        $model->remove = $row['remocao'];
        $model->adido = $row['adido'];
        $model->readapted = $row['readaptado'];
        $model->read_room = $row['saladeleitura'];
        $model->computing = $row['informatica'];
        $model->supplement_charge = $row['cargasuplementar'];
        $model->speciality = $row['especialidade'];
        $model->tutoring = $row['reforco'];
        $model->ambiental_education = $row['educacaoambiental'];
        $model->robotics = $row['robotica'];
        $model->music = $row['musica'];

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from professor;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $array = [];
        foreach ($rows as $row) {
            $model = new Teatcher();
            $model->id = $row['idprofessor'];
            $model->year_id = $row['idano'];
            $model->unit_id = $row['idunidade'];
            $model->name = $row['nome'];
            $model->identity = $row['rg'];
            $model->document = $row['cpf'];
            $model->birth_date = $row['nascimento'];
            $model->dependent_children = $row['filhosdependentes'];
            $model->address = $row['endereco'];
            $model->neighborhood = $row['bairro'];
            $model->city = $row['city'];
            $model->postal_code = $row['cep'];
            $model->phone = $row['telefone'];
            $model->cellphone = $row['celular'];
            $model->email = $row['email'];
            $model->observations = $row['observacoes'];
            $model->civil_status_id = $row['idestado_civil'];
            $model->position_id = $row['idcargo'];
            $model->discipline_id = $row['iddisciplina'];
            $model->situation_id = $row['idsituacao'];
            $model->remove = $row['remocao'];
            $model->adido = $row['adido'];
            $model->readapted = $row['readaptado'];
            $model->read_room = $row['saladeleitura'];
            $model->computing = $row['informatica'];
            $model->supplement_charge = $row['cargasuplementar'];
            $model->speciality = $row['especialidade'];
            $model->tutoring = $row['reforco'];
            $model->ambiental_education = $row['educacaoambiental'];
            $model->robotics = $row['robotica'];
            $model->music = $row['musica'];
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into professor(
            idano,
            idunidade,
            nome,
            rg,
            cpf,
            nascimento,
            filhosdependentes,
            endereco,
            bairro,
            city,
            cep,
            telefone,
            celular,
            email,
            observacoes,
            idestado_civil,
            idcargo,
            iddisciplina,
            idsituacao,
            remocao,
            adido,
            readaptado,
            saladeleitura,
            informatica,
            cargasuplementar,
            especialidade,
            reforco,
            educacaoambiental,
            robotica,
            musica)
        values (
            :idano,
            :idunidade,
            :nome,
            :rg,
            :cpf,
            :nascimento,
            :filhosdependentes,
            :endereco,
            :bairro,
            :city,
            :cep,
            :telefone,
            :celular,
            :email,
            :observacoes,
            :idestado_civil,
            :idcargo,
            :iddisciplina,
            :idsituacao,
            :remocao,
            :adido,
            :readaptado,
            :saladeleitura,
            :informatica,
            :cargasuplementar,
            :especialidade,
            :reforco,
            :educacaoambiental,
            :robotica,
            :musica)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idano', $this->year_id);
        $stmt->bindParam(':idunidade', $this->unit_id);
        $stmt->bindParam(':nome', $this->name);
        $stmt->bindParam(':rg', $this->identity);
        $stmt->bindParam(':cpf', $this->document);
        $stmt->bindParam(':nascimento', $this->birth_date);
        $stmt->bindParam(':filhosdependentes', $this->dependent_children);
        $stmt->bindParam(':endereco', $this->address);
        $stmt->bindParam(':bairro', $this->neighborhood);
        $stmt->bindParam(':city', $this->city);
        $stmt->bindParam(':cep', $this->postal_code);
        $stmt->bindParam(':telefone', $this->phone);
        $stmt->bindParam(':celular', $this->cellphone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':observacoes', $this->observations);
        $stmt->bindParam(':idestado_civil', $this->civil_status_id);
        $stmt->bindParam(':idcargo', $this->position_id);
        $stmt->bindParam(':iddisciplina', $this->discipline_id);
        $stmt->bindParam(':idsituacao', $this->situation_id);
        $stmt->bindParam(':remocao', $this->remove);
        $stmt->bindParam(':adido', $this->adido);
        $stmt->bindParam(':readaptado', $this->readapted);
        $stmt->bindParam(':saladeleitura', $this->read_room);
        $stmt->bindParam(':informatica', $this->computing);
        $stmt->bindParam(':cargasuplementar', $this->supplement_charge);
        $stmt->bindParam(':especialidade', $this->speciality);
        $stmt->bindParam(':reforco', $this->tutoring);
        $stmt->bindParam(':educacaoambiental', $this->ambiental_education);
        $stmt->bindParam(':robotica', $this->robotics);
        $stmt->bindParam(':musica', $this->music);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update professor
        set idano=:idano,
            idunidade=:idunidade,
            nome=:nome,
            rg=:rg,
            cpf=:cpf,
            nascimento=:nascimento,
            filhosdependentes=:filhosdependentes,
            endereco=:endereco,
            bairro=:bairro,
            city=:city,
            cep=:cep,
            telefone=:telefone,
            celular=:celular,
            email=:email,
            observacoes=:observacoes,
            idestado_civil=:idestado_civil,
            idcargo=:idcargo,
            iddisciplina=:iddisciplina,
            idsituacao=:idsituacao,
            remocao=:remocao,
            adido=:adido,
            readaptado=:readaptado,
            saladeleitura=:saladeleitura,
            informatica=:informatica,
            cargasuplementar=:cargasuplementar,
            especialidade=:especialidade,
            reforco=:reforco,
            educacaoambiental=:educacaoambiental,
            robotica=:robotica,
            musica=:musica
        where idprofessor = :idprofessor;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idano', $this->year_id);
        $stmt->bindParam(':idunidade', $this->unit_id);
        $stmt->bindParam(':nome', $this->name);
        $stmt->bindParam(':rg', $this->identity);
        $stmt->bindParam(':cpf', $this->document);
        $stmt->bindParam(':nascimento', $this->birth_date);
        $stmt->bindParam(':filhosdependentes', $this->dependent_children);
        $stmt->bindParam(':endereco', $this->address);
        $stmt->bindParam(':bairro', $this->neighborhood);
        $stmt->bindParam(':city', $this->city);
        $stmt->bindParam(':cep', $this->postal_code);
        $stmt->bindParam(':telefone', $this->phone);
        $stmt->bindParam(':celular', $this->cellphone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':observacoes', $this->observations);
        $stmt->bindParam(':idestado_civil', $this->civil_status_id);
        $stmt->bindParam(':idcargo', $this->position_id);
        $stmt->bindParam(':iddisciplina', $this->discipline_id);
        $stmt->bindParam(':idsituacao', $this->situation_id);
        $stmt->bindParam(':remocao', $this->remove);
        $stmt->bindParam(':adido', $this->adido);
        $stmt->bindParam(':readaptado', $this->readapted);
        $stmt->bindParam(':saladeleitura', $this->read_room);
        $stmt->bindParam(':informatica', $this->computing);
        $stmt->bindParam(':cargasuplementar', $this->supplement_charge);
        $stmt->bindParam(':especialidade', $this->speciality);
        $stmt->bindParam(':reforco', $this->tutoring);
        $stmt->bindParam(':educacaoambiental', $this->ambiental_education);
        $stmt->bindParam(':robotica', $this->robotics);
        $stmt->bindParam(':musica', $this->music);
        $stmt->bindParam(':idprofessor', $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "delete from professor where idprofessor = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->id);

        return $stmt->execute();
    }
}