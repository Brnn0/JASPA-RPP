<?php
use models\Animal;
use models\Score;
use models\Signup;

class RankingController {

	function index(){

		//$dados = $this->dadosDoBanco;
		$model = new Signup();
		$dados = $model->scores();


		render("ranking", ["dados"=>$dados]);
	}

	

}

