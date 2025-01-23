<?php

	require __DIR__ 'Task.php';

	$taskObj = new Task();

	$tasks = $taskObj->getAllTasks();

	include __DIR__ . '../view/listarTarefas.php';