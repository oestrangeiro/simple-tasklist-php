<?php

	// Script básico de rotas com base na action

	$action = $_GET['action'];

	// Com base no valor da action, traço a rota para o controller

	switch ($action) {

		case 'adicionar':
			include '../controller/adicionar.php';
			break;

		case 'editar':
			include '../controller/editar.php';

			break;

		case 'listar':
			include '../model/listarTarefa.php';
			break;
		default:
			header('Location: ../index.php');
			break;
	}