<?php

	require 'Task.php';

	session_start();

	$taskObj = new Task();
	$taskObj->create($tituloDaTarefa, $descricaoDaTarefa);

	header('Location: ../index.php');