<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class TitleBySubscription
{
    public $subscription_id = 0;
    public $year_id = 0;
    public $teatcher_id = 0;
    public $title_id = 0;
    public $value = 0.0;

    public static function fromRow($row)
    {
        $model = new TitleBySubscription();
        $model->subscription_id = $row['idinscricao'];
        $model->year_id = $row['idano'];
        $model->teatcher_id = $row['idprofessor'];
        $model->title_id = $row['idtitulo'];
        $model->value = $row['valor'];

        return $model;
    }

    public function findOne($title_id, $subscription_id, $year_id, $teatcher_id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "SELECT * 
                FROM titulo_por_inscricao 
                WHERE idinscricao = :idinscricao 
                AND idano = :idano 
                AND idprofessor = :idprofessor 
                AND idtitulo = :idtitulo;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idinscricao', $subscription_id);
        $stmt->bindParam(':idano', $year_id);
        $stmt->bindParam(':idprofessor', $teatcher_id);
        $stmt->bindParam(':idtitulo', $title_id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = TitleBySubscription::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM titulo_por_inscricao;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = TitleBySubscription::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "INSERT 
                INTO titulo_por_inscricao (idinscricao,idano,idprofessor,idtitulo,valor)
                VALUES (:idinscricao, :idano, :idprofessor, :idtitulo, :valor);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idinscricao', $this->subscription_id);
        $stmt->bindParam(':idano', $this->year_id);
        $stmt->bindParam(':idprofessor', $this->teatcher_id);
        $stmt->bindParam(':idtitulo', $this->title_id);
        $stmt->bindParam(':valor', $this->value);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "UPDATE titulo_por_inscricao 
                SET 
                    idinscricao = :idinscricao, 
                    idano = :idano, 
                    idprofessor = :idprofessor, 
                    idtitulo = :idtitulo, 
                    valor = :valor
                WHERE idinscricao = :idinscricao 
                AND idano = :idano 
                AND idprofessor = :idprofessor 
                AND idtitulo = :idtitulo;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idinscricao', $this->subscription_id);
        $stmt->bindParam(':idano', $this->year_id);
        $stmt->bindParam(':idprofessor', $this->teatcher_id);
        $stmt->bindParam(':idtitulo', $this->title_id);
        $stmt->bindParam(':valor', $this->value);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "DELETE 
                FROM titulo_por_inscricao 
                WHERE idinscricao = :idinscricao 
                AND idano = :idano 
                AND idprofessor = :idprofessor 
                AND idtitulo = :idtitulo;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idinscricao', $this->subscription_id);
        $stmt->bindParam(':idano', $this->year_id);
        $stmt->bindParam(':idprofessor', $this->teatcher_id);
        $stmt->bindParam(':idtitulo', $this->title_id);

        return $stmt->execute();
    }
}