<?php

namespace models;

class Signup extends Model {

    protected $table = "usuarios";
    #nao esqueça da ID
    protected $fields = ["id","nome", "dataNascimento", "email", "tipo", "senha"];

    const COMUM_USER = 1;
    const ADMIN_USER = 5;

    public static $userTypes = [Signup::COMUM_USER=>"Usuário comum", Signup::ADMIN_USER=>"Admin"];

    public function findByEmailAndSenha($email, $senha){
        $sql = "SELECT * FROM {$this->table} "
                ." WHERE email = :email and senha = :senha";
        $stmt = $this->pdo->prepare($sql);
        $data = [':email' => $email, ":senha"=>hash("sha256", $senha)];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    #sobrescreve a funcao salve da classe mae Model
    public function save($data){
        if (_v($data,"senha") != ""){
            $data["senha"] = hash("sha256", $data["senha"]);
        } else
        if (_v($data,"senha") == ""){
            #caso a senha nao seja enviada
            #remove do data, para que nao seja alterada
            #a senha anterior que já está salva
            unset($data["senha"]);
        }
        #chama a funcao save original da classe mae
        return parent::save($data);
    }
    
    public function update($id, $data){
        if (_v($data,"senha") != ""){
            $data["senha"] = hash("sha256", $data["senha"]);
        } else
        if (_v($data,"senha") == ""){
            unset($data["senha"]);
        }
        return parent::update($id, $data);
    }

    public function scores(){
        $sql = "SELECT *,sum(score) AS total FROM usuarios
        LEFT JOIN score ON score.id_user = usuarios.id
        GROUP BY usuarios.id ORDER BY total DESC LIMIT 10";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt == false){
            $this->showError($sql);
        }

        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }
    
}
