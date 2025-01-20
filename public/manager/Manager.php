<?php

	require '../database/Database.php';


	/*
		Classe que faz as inserções no banco de dados
	*/


	final class Manager extends Database{
		static protected string $basePath;


		// Método que retorna o caminho base para o projeto
		static function getBasePath(){
			self::$basePath =  dirname(__DIR__, 1) . '/';
			return self::$basePath;
		}

		// Função para debugar mais facilmente variaveis
		static function debug($variable){
			echo "<pre>";
			var_dump($variable);
			echo "<pre>";
		}
	}