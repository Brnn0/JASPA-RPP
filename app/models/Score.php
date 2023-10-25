<?php

namespace models;

class Score extends Model {

     protected $table = "score";
     #nao esqueça da ID
     protected $fields = ["id_user","id","score"];

     public function scoreById($id){
          $sql = "SELECT sum(score) as total FROM {$this->table} WHERE id_user = :id";
          $stmt = $this->pdo->prepare($sql);
          $data = [':id' => $id];
          $stmt->execute($data);
          if ($stmt == false){
              $this->showError($sql,$data);
          }

          $total = $stmt->fetch(\PDO::FETCH_ASSOC)['total'];
          
          if ($total == ""){
               $total = "0";
          }

          return $total;
      }

}

