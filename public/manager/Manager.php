<?php

	require '../database/Database.php';


	/*
		Classe que retorna a conexão com o banco de dados
	*/


	final class Manager extends Database{
		
		// Função para debugar mais facilmente variaveis
		static function debug($variable){
			echo "<pre>";
			var_dump($variable);
			echo "<pre>";
		}
		
	}