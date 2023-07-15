<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

	class IndexController extends Action {

		public function recuperar() {
			
			$tarefa = Container::getModel('Tarefa'); 
			$this->view->tarefa = $tarefa->recuperarTarefa();;
			$this->render('index', 'layout2');
			
		}

		public function inserirTarefa() {

			session_start();
            
            $tarefa = Container::getModel('Tarefa');
            $tarefa->__set('nome', $_POST['tarefa']);
			$tarefa->__set('origem', $_SESSION['id']);

			session_abort();

            if($tarefa->inserir()) {
            	$this->recuperar();
			} 
        }

		public function marcarTarefa() {
			
			$tarefa = Container::getModel('Tarefa');
			$tarefa->__set('id', $_GET['id']);

			if($tarefa->marcarRealizada()) {
				$this->recuperar();
			}
		}

		public function eliminarTarefa() {

			$tarefa = Container::getModel('Tarefa');
			$tarefa->__set('id', $_GET['id']);

			if($tarefa->apagarTarefa()) {
				$this->recuperar();
			}
		}

		public function renomearTarefa() {
			
			$tarefa = Container::getModel('Tarefa');
			$tarefa->__set('id', $_POST['id_tarefa']);
			$tarefa->__set('nome', $_POST['tarefa']);

			if($tarefa->renomear()) {
				$this->recuperar();
			}

		}

	}

?>