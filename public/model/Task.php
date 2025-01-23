<?php

	require '../manager/Manager.php';

	class Task {
		private string $titulo;
		private string $descricao;
		private $conn;

		private $data;

		public function __construct(){
			/*
				Manager::getConnection retorna um objeto do tipo PDO
				responsável pela conexão com o banco de dados
			*/ 
			$this->conn = Manager::getConnection();

		}


		public function create(string $titulo, $descricao = NULL){

			$this->titulo = $titulo;
			$this->descricao = $descricao;

			// Caso o usuário tenha omitido a descrição da tarefa
			if($descricao == NULL){
				$query = "INSERT INTO tasks (title) VALUES (:title)";
				$stmt = $this->conn->prepare($query);

				$stmt->bindParam(':title', $this->titulo);
				$stmt->execute();
				
			}else{

				$query = "INSERT INTO tasks (title, description) VALUES (:title, :description)";

				$stmt = $this->conn->prepare($query);

				$stmt->bindParam(':title', $this->titulo);
				$stmt->bindParam(':description', $this->descricao);

				$stmt->execute();	
			}

			

		}

		public function getAllTasks(){
			$query = "SELECT * FROM tasks";

			$stmt = $this->conn->query($query);
			$stmt->execute();

			/*
				PDO::FETCH_ASSOC retona um array apenas com indices
				com os nomes dos campos, sem aquela frescuragem de retornar
				tanto com os nomes como com os indices numéricos
			*/
			$this->data = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $this->data;
		}

		public function delete(){

		}

		public function edit(){

		}


		// Testes
		public function showConn(){
			var_dump($this->conn);
		}
	}