<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

	class AuthController extends Action {

        public function index() {
            $this->view->erro = false;
            $this->render('login', 'layout1');
        }

        public function autenticar() {

            $usuario = Container::getModel('Usuario');

            $usuario->__set('email', $_POST['email']);
            $usuario->__set('senha', $_POST['senha']);

			$retorno = $usuario->autenticar();

		    if(!empty($retorno)) {

				session_start();

				$_SESSION['id'] = $retorno['id_usuario']; 
				$_SESSION['email'] = $retorno['email']; 
				
				header('Location: /home');

			} else {

				header('Location: /');

			}

        }

        public function criarConta() {
            $this->view->erro = false;
            $this->render('criar_conta', 'layout1');
        }

        public function cadastrar() {

            $usuario = Container::getModel('Usuario');

            $usuario->__set('nome', $_POST['nome']);
            $usuario->__set('email', $_POST['email']);
            $usuario->__set('senha', $_POST['senha']);

            $email = $usuario->recuperarEmail();

            if($usuario->validarCadastro() && empty($email)) {
                $usuario->criarConta();
                $this->render('login', 'layout1');
            } else {
                $this->view->erro = true;
                $this->render('criar_conta', 'layout1');
            }
            
        }

        public function terminarSessao() {

			session_start();
			session_destroy();

			header('Location: /');
		}
      
	}

?>