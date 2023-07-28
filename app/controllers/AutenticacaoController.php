<?php
use models\Signup;

class AutenticacaoController {

    function index(){
        #variáveis que serao passados para a view
        $send = [];
        #chama a view
        render("signup", $send);
    }
    function logar(){

        $model = new Signup();
        #busca o usuario pelo email e senha
        $user = $model->findByEmailAndSenha($_POST["email"],  $_POST["senha"]);
    
        if ($user != null){
            #se encontrar salva na sessao
            $_SESSION['user'] = $user;
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
