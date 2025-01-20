<?php

	// Classe que retorna a conexão com o banco de dados

	class Database{
		private static string $host = 'localhost';
		private static string $database = 'todo';
		private static string $user = 'admin';
		private static string $pass = 'admin';

		// método que inicia conexão com o banco
		// retorna uma conexão do tipo pdo
		public static function getConnection(){
			try{
				$conn = new PDO(
					'mysql:host='. self::$host .';dbname='. self::$database,
					self::$user, self::$pass
				);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				return $conn;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}