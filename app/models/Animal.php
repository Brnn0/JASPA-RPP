<?php

namespace models;

class Animal extends Model {
    
    public function findById($id){
        $stmt = $this->pdo->prepare("select * from animais where id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $stmt = $this->pdo->prepare("select * from animais");
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }

    public function save($data){
        $stmt = $this->pdo->prepare("INSERT INTO animais (nome, foto, ameaca, info, situacao) 
                                        VALUES 
                                    (:nome, :foto, :ameaca, :info, :situacao)");
        if ($stmt->execute($data)) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function update($id, $data){
        #seta a ID
        $data["id"] = $id;

        $stmt = $this->pdo->prepare("UPDATE animais SET 
                                        nome = :nome,
                                        foto = :foto,
                                        ameaca = :ameaca,
                                        info = :info,
                                        situacao = :situacao
                                    WHERE id = :id");
        if ($stmt->execute($data)) {
            return $id;
        } else {
            return false;
        }
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM animais WHERE id = :id");
        return $stmt->execute(["id"=>$id]);
    }
    
}

