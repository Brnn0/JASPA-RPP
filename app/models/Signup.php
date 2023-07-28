<?php

namespace models;

class Signup extends Model {

    protected $table = "usuarios";
    #nao esqueça da ID
    protected $fields = ["id","nome", "dataNascimento", "email", "tipo", "senha"];

    const COMUM_USER = 1;
    const ADMIN_USER = 5;
    public static $userTypes = [Signup::COMUM_USER=>"Usuário comum", Signup::ADMIN_USER=>"Admin"];
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
        #filtra, para que só tenha nos values os campos que realmente existem na tabela
        $values = array_intersect_key($data, array_flip($this->fields));
        $fields = array_keys($values);

        $sql = "INSERT INTO usuarios (".implode(",",$fields).") 
                    VALUES 
                (:".implode(",:",$fields).")";
        
        #caso voce queira ver como está o SQL descomente a linha
        #dd($sql);
        
        $stmt = $this->pdo->prepare($sql);
       
        if ($stmt == false){
            $this->showError($sql, $values);
        }

        if ($stmt->execute($values)) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }

    }
    
    
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
    public function all(){
        $sql = "SELECT usuarios.* FROM usuarios "
                ." LEFT JOIN usuarios ON usuarios.id_login = logins.id ";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }
        return $list;
    }
    
}

