<?php

class GameController {

	private $dadosDoBanco = [
			["id"=>1, "nome"=>"Peixe-boi-da-Amazônia", "extincao"=>true, "foto"=>"http://ampa.org.br/wp-content/uploads/2020/03/Peixe-boi-tratada-3-2_Easy-Resize.com_Easy-Resize.com_.jpg"],
			["id"=>2, "nome"=>"Boto-cor-de-rosa", "extincao"=>false, "foto"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Inia.jpg/800px-Inia.jpg"],
			["id"=>3, "nome"=>"Tamanduá-bandeira", "extincao"=>false, "foto"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/Myresluger2.jpg/280px-Myresluger2.jpg"]
	];

	function index(){

		$dados = $this->dadosDoBanco;
		shuffle($dados);

		render("game", ["dados"=>$dados]);
	}

	function resposta(){

		print_r($_POST);

		//ja busca no banco o animal pela id aí nao precisa fazer o foreach
		$dados = $this->dadosDoBanco;

		$animal = null;
		//busca o animal que foi selecionado
		foreach($dados as $anim){
			if ($anim['id'] == $_POST['animal']){
				$animal = $anim;
			}
		}


		if ($animal['extincao'] == true){
			render("animalCorreto", []);
		} else {
			render("animalErrado", []);
		}

	}

}

