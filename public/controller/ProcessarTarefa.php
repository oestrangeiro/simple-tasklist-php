<?php

	require_once '../manager/Manager.php';

	$tituloDaTarefa = $_POST['titulo-tarefa'];
	$descricaoDaTarefa = $_POST['descricao-tarefa'];
	$action = $_GET['action'];


	/*
		Primeiramente verifico se, pelo menos, o campo de titulo da tarefa foi enviado vazio por algum amostradinho, caso sim, jogo ele na página inical com um aviso.
	*/

	if( empty( $tituloDaTarefa ) ){
		header('Location: ../index.php?errMsg=tituloVazio');
	}

	/*
		Se a descrição da tarefa for vazia, seto como NULL
	*/

	if( empty( $descricaoDaTarefa ) ){
		$descricaoDaTarefa = 'NULL';
	}

	// echo $tituloDaTarefa . "<br>";
	// echo $descricaoDaTarefa . "<br>";
	// echo $action . "<br>";

	$conn = Manager::getConnection();

	/*
		Com base na action, adiciono a tarefa
	*/

	switch ($action){
		case 'adicionar':
				include '../model/adicionarTarefa.php';
			break;
		
		default:
			# code...
			break;
	}
