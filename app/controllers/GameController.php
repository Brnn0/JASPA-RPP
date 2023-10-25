<?php
use models\Animal;
use models\Score;

class GameController {

	function index(){
		
		if (isset($_GET['erro'])){
			$dados = $_SESSION['animais'];
		} else {
			//$dados = $this->dadosDoBanco;
			$model = new Animal();
			$dados = $model->getGame();
			$_SESSION['animais'] = $dados;
		}

		

		$score = new Score();
		$scoreAtual = "";
		if (isset($_SESSION["signup"])):
			$scoreAtual = $score->scoreById($_SESSION["signup"]['id']);
		endif;


		render("game", ["dados"=>$dados, "scoreAtual"=>$scoreAtual]);
	}

	function info($id){
		$model = new Animal();
		$animal = $model->findById($id);

		render("info", ["animal"=>$animal]);

	}


	function responder(){
		
		if (!isset($_POST['animal'])){
			header('Location: ' . str_replace("?erro=1","",$_SERVER['HTTP_REFERER']) . "?erro=1");
			die();
		}
		
		$score = new Score();
		$dados = $_SESSION['animais'];

		$animal = null;
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

		$_SESSION['animal'] = $animal;
		$_SESSION['resultado'] = $resultado;
		$_SESSION['animalCerto'] = $animalCerto;

		redirect("game/resposta");
	}


	function resposta(){

		$score = new Score();
		$scoreAtual = "";
		if (isset($_SESSION["signup"])):
			$scoreAtual = $score->scoreById($_SESSION["signup"]['id']);
		endif;

		$dados = $_SESSION['animais'];
		$animal = $_SESSION['animal'];
		$resultado = $_SESSION['resultado'];
		$animalCerto = $_SESSION['animalCerto'];
		
		render("resultado", ["dados"=>$dados, "resultado"=>$resultado, "scoreAtual"=>$scoreAtual, "animalCerto"=>$animalCerto]);

	}

}

 