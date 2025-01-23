<?php

	/*
		Primeiramente verifico se, pelo menos, o campo de titulo da tarefa foi enviado vazio por algum amostradinho, caso sim, jogo ele na página inical com um aviso.
	*/

	$tituloDaTarefa = $_POST['titulo-tarefa'];
	$descricaoDaTarefa = $_POST['descricao-tarefa'];
	$action = $_GET['action'];

	if( empty( $tituloDaTarefa ) ){
		header('Location: ../index.php?errMsg=tituloVazio');
	}

	// var_dump($tituloDaTarefa, $action);
	// die();

	/*
		Se a descrição da tarefa for vazia, seto como NULL
	*/

	if( empty( $descricaoDaTarefa ) ){
		$descricaoDaTarefa = 'NULL';
	}	

	/*
		Com base na action, adiciono a tarefa
	*/

	switch ($action){
		case 'adicionar':
				include '../model/adicionarTarefa.php';
			break;
		
		case 'editar':
			echo "Editando tarefa";
			break;
		case 'listar':
			include '../model/listarTarefa.php';
		default:
			# code...
			break;
	}
