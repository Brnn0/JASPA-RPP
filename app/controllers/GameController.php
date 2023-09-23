<?php
use models\Animal;
use models\Score;

class GameController {

	function index(){

		//$dados = $this->dadosDoBanco;
		$model = new Animal();
		$dados = $model->getGame();
		$_SESSION['animais'] = $dados;

		$score = new Score();
		$scoreAtual = $score->scoreById($_SESSION["signup"]['id']);


		render("game", ["dados"=>$dados, "scoreAtual"=>$scoreAtual]);
	}

	function info($id){
		$model = new Animal();
		$animal = $model->findById($id);

		render("info", ["animal"=>$animal]);

	}

	function resposta(){

		
		$score = new Score();
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

		if ($resultado){
			$animalCerto = $animal;
			$score->save(["id_user"=>$_SESSION["signup"]['id'],  "score"=>10]);

		} else  {
			$animalCerto = false;
		}

		$scoreAtual = $score->scoreById($_SESSION["signup"]['id']);

		
		render("resultado", ["dados"=>$dados, "resultado"=>$resultado, "scoreAtual"=>$scoreAtual, "animalCerto"=>$animalCerto]);

	}

}

