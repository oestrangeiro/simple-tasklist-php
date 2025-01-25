<?php

	/*
		Primeiramente verifico se, pelo menos, o campo de titulo da tarefa foi enviado vazio por algum amostradinho, caso sim, jogo ele na página inical com um aviso.
	*/

	$tituloDaTarefa;

	if(isset( $_POST['titulo-tarefa'] ) && !empty( $_POST['titulo-tarefa'] ) ){
		$tituloDaTarefa = $_POST['titulo-tarefa'];
	}else{
		header("Location: ../index.php");
	}

	$descricaoDaTarefa = $_POST['descricao-tarefa'];

	// Sanitizando as entradas
	$tituloDaTarefa = htmlspecialchars($tituloDaTarefa);

	// Incluindo a model que vai adicionar a tarefa ao banco de dados
	include '../model/adicionarTarefa.php';


