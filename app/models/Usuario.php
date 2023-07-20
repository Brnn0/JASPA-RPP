<?php

namespace models;

class Usuario extends Model {
    
    public function findById($id){
        $stmt = $this->pdo->prepare("select * from usuarios where id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $stmt = $this->pdo->prepare("select * from usuarios");
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }

    public function save($data){
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (loginUsuario, senhaUsuario) 
                                        VALUES 
                                    (:loginUsuario, :senhaUsuario)");
        if ($stmt->execute($data)) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function update($id, $data){
        #seta a ID
        $data["id"] = $id;

        $stmt = $this->pdo->prepare("UPDATE usuarios SET 
                                        loginUsuario = :loginUsuario,
                                        senhaUsuario = :senhaUsuario
                                    WHERE id = :id");
        if ($stmt->execute($data)) {
            return $id;
        } else {
            return false;
        }
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        return $stmt->execute(["id"=>$id]);
    }
    
}

