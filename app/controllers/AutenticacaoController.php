<?php
use models\Signup;

class AutenticacaoController {

    function index(){
        #variáveis que serao passados para a view
        $send = [];
        #chama a view
        render("login", $send);
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
            render("signup", $send);
        }
        
    }
    function logout(){
        session_destroy();
        redirect("autenticacao");
    }

    

}