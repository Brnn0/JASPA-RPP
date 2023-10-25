<?php
use models\Animal;
use models\Signup;
/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class AnimaisController {

	#construtor, é iniciado sempre que a classe é chamada
	function __construct() {
		#se nao existir é porque nao está logado
		if (!isset($_SESSION["signup"])){
			redirect("autenticacao");
			die();
		}


		#proibe o usuário de entrar caso não tenha autorização
		if ($_SESSION['signup']['tipo'] < Signup::ADMIN_USER){
			header("HTTP/1.1 401 Unauthorized");
			die();
		}


	}

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/usuarios/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Animal();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		#chama a view
		render("animais", $send);
	}

	
	function salvar($id=null){

		$model = new Animal();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("animais/index/$id");
	}

	function deletar(int $id){
		
		$model = new Animal();
		$model->delete($id);

		redirect("animais/index/");
	}


}
