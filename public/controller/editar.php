<?php

	$idDaTarefa = $_POST['id-tarefa'];
	$tituloDaTarefa;
	$descricaoDaTarefa;


	// Checa se o título foi informado
	if( isset( $_POST['titulo-tarefa'] ) && !empty( $_POST['titulo-tarefa'] ) ) {
		$tituloDaTarefa = $_POST['titulo-tarefa'];
	}else{
		$tituloDaTarefa = null;
	}

	// Checa se a tarefa foi informada
	if( isset( $_POST['descricao-tarefa'] ) && !empty( $_POST['descricao-tarefa'] ) ) {
		$descricaoDaTarefa = $_POST['descricao-tarefa'];
	}else{
		$descricaoDaTarefa = null;
	}

	include '../model/editarTarefa.php';