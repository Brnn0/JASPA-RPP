<?php

function validate($allRules, $data, $flashMessage=null){
    //percorre todas as regras
    foreach($allRules as $field=>$options){

        //caso so tenha uma regra, transforma ela num array com apenas um elemento
        if (array_key_exists("func",$options)){
            $options = [$options];
        }

        //percorre o array
        foreach($options as $option){

            if (!array_key_exists("params",$option)){
                $option["params"] = [];
            }

            if (!isset($data[$field])){
                setValidationError($field, "O campo '$field' não foi enviado. Verifique se esse campo realmente existe no formulário, pois ele consta na validação.");
            } else {

                //chama a funcao de validacao
                $result = $option["func"]($data[$field], ...$option["params"]);

                if ($result == false){
                    //se der falha
                    setValidationError($field, $option["msg"]);
                }
            }
            
        }

    }

    #se alguma validação tiver falhado
    if (count($_SESSION['errors'])){
        if ($flashMessage){
            setFlash("error",$flashMessage);
        }
        #volta para a página que estava
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

}


function setValidationError($field, $msg){
    if (!isset($_SESSION['errors'])){
        $_SESSION['errors'] = [];
    }
    $_SESSION['errors'][$field] = $msg;
}

function hasError($field, $return){
    if (isset($_SESSION['errors']) && isset($_SESSION['errors'][$field])){
        if ($return)
            return $return;
        else
            return true;
    } else {
        if ($return)
            return "";
        else
            return false;
    }
}

function getValidationError($field){
    if (isset($_SESSION['errors']) && isset($_SESSION['errors'][$field])){
        $msg = $_SESSION['errors'][$field];
        unset($_SESSION['errors'][$field]);
        return $msg;
    }
}

function validateRequired($value){
    if (is_array($value)){
        return true;
    }
    if ( trim($value) == ""){
        return false;
    }
    return true;
}

function validateDate($date, $format = 'Y-m-d H:i:s') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

//https://stackoverflow.com/questions/12026842/how-to-validate-an-email-address-in-php
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateEqual($str1, $str2){
    return $str1 == $str2;
}

/** Faz uma consulta ao banco para saber se já existe um registro com aquele valor
*   na coluna/tabela especificada
*/
function validateUnique($value, $fieldWithTable){
    global $pdo;
    
    list($table, $field) = explode(".",$fieldWithTable);
    
    $sql = "SELECT COUNT(*) as qtd FROM $table WHERE $field = :value";
    
    $stmt = $pdo->prepare($sql);

    $data = [':value' => $value];
    if ($stmt == false){
        print_pdo_error($sql, $data);
    }
    $stmt->execute($data);
    if ($stmt == false){
        print_pdo_error($sql, $data);
    } else {
        $rw = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $rw["qtd"] == 0;
    }
}