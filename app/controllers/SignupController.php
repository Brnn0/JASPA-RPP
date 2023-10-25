<?php
use models\Signup;

class SignupController {

	function index($id = null){

		$send = [];

		$model = new Signup();
		
		
		$send['data'] = null;

		if ($id != null){
			$send['data'] = $model->findById($id);
		}

		$send['lista'] = $model->all();

		$send['tipos'] = Signup::$userTypes;

		render("signup", $send);
	}

	function salvar($id=null){
		$model = new Signup();

		$requeridos = ["nome"=>"Nome é obrigatório",
					"dataNascimento"=>"Data de nascimento é obrigatória"];
		foreach($requeridos as $field=>$msg){
			if (!validateRequired($_POST,$field)){
				setValidationError($field, $msg);
			}
		}
		if (!validateDate(_v($_POST,"dataNascimento"),"d/m/Y")){
			setValidationError("dataNascimento", 
							"Tem que ser uma data válida no formato dd/mm/yyyy");
		}
		if (count($_SESSION['errors'])){
			setFlash("error","Falha ao salvar usuário.");
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			die();
		}
		
		if ($id == null){
			$_POST['tipo'] = Signup::COMUM_USER;
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		setFlash("success","Salvo com sucesso.");
		redirect("signup/index/$id");
	}

	function deletar(int $id){
		
		$model = new Signup();
		$model->delete($id);

		redirect("signup/index/");
	}
}