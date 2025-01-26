<?php

	require '../manager/Manager.php';

	class Task {

		// ATRIBUTOS

		private int $id;
		private $titulo;
		private $descricao;
		private $concluida;
		
		private $conn;
		private $dados;

		// MÉTODOS

		// Função construtora que realiza uma conexão com o banco de dados
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
			$this->dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $this->dados;
		}

		public function delete($id){
			$this->id = $id;

			$query = "DELETE FROM tasks WHERE id=:id";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':id', $this->id);
			$stmt->execute();


		}

		// Método de edição de tarefas
		public function update(int $id, $titulo = null, $descricao = null){

			$this->id = $id;
			$this->titulo = $titulo;
			$this->descricao = $descricao;

			// var_dump($this->id, $this->titulo);
			// die();

			/*
				Se o usuário quiser editar somente o título:
			*/
			if($this->descricao === null){
				
				try{
					$query =  "UPDATE tasks SET title=:title WHERE id=:id";
					$stmt = $this->conn->prepare($query);

					$stmt->execute([
						':title' => $this->titulo,
						':id' => $this->id
					]);	
				}catch(PDOException $e){
					echo "Erro ao atualizar o título da tarefa: " . $e->getMessage();
				}
				

			}
			// Se o usuário quiser editar somente a descrição
			elseif($this->titulo === null){

				try{
					$query =  "UPDATE tasks SET description = :description WHERE id = :id";
					$stmt = $this->conn->prepare($query);

					$stmt->execute([
						':description' => $this->descricao,
						':id' => $this->id
					]);	
				}catch(PDOException $e){
					echo "Erro ao atualizar a descrição tarefa: " . $e->getMessage();
				}
			}
			// Se o usuário informa tanto o título com a descrição da tarefa
			else{
				try{
					$query =  "UPDATE tasks SET title = :title, description = :description WHERE id = :id";
					$stmt = $this->conn->prepare($query);

					$stmt->execute([
						':title' => $this->titulo,
						':description' => $this->descricao,
						':id' => $this->id
					]);	
				}catch(PDOException $e){
					echo "Erro ao atualizar a tarefa: " . $e->getMessage();
				}
			}

		}


		// Testes
		public function showConn(){
			var_dump($this->conn);
		}
	}