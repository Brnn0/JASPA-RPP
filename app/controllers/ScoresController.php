<?php
use models\Usuario;
use models\Score;
/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class ScoresController {

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/scores/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Score();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		

		#recupera a lista com todos as pontuacoes
        $scoresModel = new Score();
        $send['scores'] = $scoresModel->all();
		
		#chama a view
		render("scores", $send);
	}

	function salvar($id=null){

		$model = new Score();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("scores/index/$id");
	}

	function deletar(int $id){
		
		$model = new Score();
		$model->delete($id);

		redirect("scores/index/");
	}


}
