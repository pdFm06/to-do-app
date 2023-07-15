<?php 

namespace App\Models;

use MF\Model\Model;

    class Tarefa extends Model {

        private $id;
        private $nome;
        private $id_status;
        private $origem;

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function inserir() {

            try {

                $query = "insert into tarefas (nome, id_status, origem) values (:nome, :id_status, :origem)";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':nome', $this->__get('nome'));
                $stmt->bindValue(':id_status', 1);
                $stmt->bindValue(':origem', $this->__get('origem'));
                $stmt->execute();

                return $this;

            } catch (\PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        public function recuperarTarefa() {

            try {

                $query = "
                    select 
                        id,
                        nome,
                        id_status,
                        origem
                    from
                        tarefas
                ";
                $stmt = $this->db->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll(\PDO::FETCH_ASSOC);

            } catch (\PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        public function marcarRealizada() {
            
            try {

                $query = "update tarefas set id_status = 0 where id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':id', $this->__get('id'));
                $stmt->execute();

                return true;

            } catch (\PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        public function apagarTarefa() {
            
            try {

                $query = "delete from tarefas where id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':id', $this->__get('id'));
                $stmt->execute();

                return true;

            } catch (\PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        public function renomear() {

            try {

                $query = "update tarefas set nome = :nome where id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':nome', $this->__get('nome'));
                $stmt->bindValue(':id', $this->__get('id'));
                $stmt->execute();

                return true;

            } catch (\PDOException $erro) {
                echo $erro->getMessage();
            }
        }

    } 


?>