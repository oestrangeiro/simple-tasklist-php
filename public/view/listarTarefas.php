<?php

	require __DIR__ . "/model/Task.php";

	$taskObj = new Task();
	$tasks = $taskObj->getAllTasks();

	echo "<pre>";
	print_r($tasks);
	echo "</pre>";