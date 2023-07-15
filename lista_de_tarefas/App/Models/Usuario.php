<?php 

namespace App\Models;

use MF\Model\Model;

    class Usuario extends Model {

        private $id;
        private $nome;
        private $email;
        private $senha;

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function criarConta() {

            try {

                $query = "insert into usuarios (nome, email, senha) values (:nome, :email, :senha)";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':nome', $this->__get('nome'));
                $stmt->bindValue(':email', $this->__get('email'));
                $stmt->bindValue(':senha', $this->__get('senha'));
                $stmt->execute();

                return true;

            } catch (\PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        public function validarCadastro() {
			$valido = true;

			if (strlen($this->__get('nome')) < 3) {
				$valido = false;
			}

			if (strlen($this->__get('email')) < 3) {
				$valido = false;
			}

			if (strlen($this->__get('senha')) < 3) {
				$valido = false;
			}

			return $valido;
		}

        public function recuperarEmail() {

            try {

                $query = "select email from usuarios where email = :email";                
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':email', $this->__get('email'));
                $stmt->execute();

                return $stmt->fetch(\PDO::FETCH_ASSOC);

            } catch (\PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        public function autenticar() {
            
            try {

                $query = "select id_usuario, nome, email, senha from usuarios where email = :email and senha = :senha";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':email', $this->__get('email'));
                $stmt->bindValue(':senha', $this->__get('senha'));
                $stmt->execute();

                return $stmt->fetch(\PDO::FETCH_ASSOC);

            } catch (\PDOException $erro) {
                echo $erro->getMessage();
            }
        }

    } 


?>