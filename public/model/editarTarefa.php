<?php
	session_start();

	require 'Task.php';
	

	$taskObj = new Task();

	$taskObj->update($idDaTarefa, $tituloDaTarefa, $descricaoDaTarefa);

	// Joga o caba pro index
	header('Location: ../index.php');
