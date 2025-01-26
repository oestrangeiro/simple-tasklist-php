<?php

	require 'Task.php';

	$taskObj = new Task();

	$taskObj->delete($id);

	header('Location: ../index.php');