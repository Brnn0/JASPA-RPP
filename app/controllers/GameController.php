<?php
use models\Animal;

class GameController {

	function index(){

		//$dados = $this->dadosDoBanco;
		$model = new Animal();
		$dados = $model->getGame();
		$_SESSION['animais'] = $dados;

		render("game", ["dados"=>$dados]);
	}

	function resposta(){

		//ja busca no banco o animal pela id aí nao precisa fazer o foreach
		$dados = $_SESSION['animais'];

		$animal = null;
		//busca o animal que foi selecionado
		foreach($dados as $anim){
			if ($anim['id'] == $_POST['animal']){
				$animal = $anim;
			}
		}

		$resultado = $animal['situacao'] == true;

		
		render("resultado", ["dados"=>$dados, "resultado"=>$resultado]);

	}

}

