<?php 

namespace App;

use MF\Init\Bootstrap;

	class Route extends Bootstrap {

		protected function initRoutes() {

			$routes['index'] = array(
				'route' => '/',
				'controller' => 'authController',
				'action' => 'index'
			);

			$routes['autenticar'] = array(
				'route' => '/autenticar',
				'controller' => 'authController',
				'action' => 'autenticar'
			);

			$routes['criar_conta'] = array(
				'route' => '/criar_conta',
				'controller' => 'authController',
				'action' => 'criarConta'
			);

			$routes['cadastrar'] = array(
				'route' => '/cadastrar',
				'controller' => 'authController',
				'action' => 'cadastrar'
			);

			$routes['cadastrar'] = array(
				'route' => '/cadastrar',
				'controller' => 'authController',
				'action' => 'cadastrar'
			);

			$routes['home'] = array(
				'route' => '/home',
				'controller' => 'indexController',
				'action' => 'recuperar'
			);

			$routes['inserir_tarefa'] = array(
				'route' => '/inserir_tarefa',
				'controller' => 'indexController',
				'action' => 'inserirTarefa'
			);

			$routes['marcar_tarefa'] = array(
				'route' => '/marcar_tarefa',
				'controller' => 'indexController',
				'action' => 'marcarTarefa'
			);

			$routes['eliminar_tarefa'] = array(
				'route' => '/eliminar_tarefa',
				'controller' => 'indexController',
				'action' => 'eliminarTarefa'
			);

			$routes['renomear_tarefa'] = array(
				'route' => '/renomear_tarefa',
				'controller' => 'indexController',
				'action' => 'renomearTarefa'
			);

			$routes['encerrar'] = array(
				'route' => '/encerrar',
				'controller' => 'authController',
				'action' => 'terminarSessao'
			);

		
			$this->setRoutes($routes);
		}
	}

?>