<?php
use models\Signup;

class AutenticacaoController {

    private $home = "signup";

    function index(){

        if (isset($_SESSION['signup'])){
            redirect($this->home);
            die();
        }

        #variáveis que serao passados para a view
        $send = [];
        #chama a view
        render("auth/login", $send);
    }

    function logar(){

        $model = new Signup();
        #busca o usuario pelo email e senha
        $signup = $model->findByEmailAndSenha($_POST["email"],  $_POST["senha"]);
    
        if ($signup != null){
            #se encontrar salva na sessao
            $_SESSION['signup'] = $signup;
            redirect("home");
        } else {
            #caso contrario, manda para o login novamente
            $send = ["msg"=>"Login ou senha inválida"];
            render("login", $send);
        }
        
    }
    function logout(){
        session_destroy();
        redirect("account");
    }

}