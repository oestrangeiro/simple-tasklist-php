<?php
	session_start();

	if( isset( $_GET['errMsg'] ) ){
		echo $_GET['errMsg'];
		unset($_GET['errMsg']);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tarefas</title>
	<!-- Bootstrap css de cria -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- Bootstrap js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row mb-5">
			<h3 class="text-center">Gerenciador de tarefas pessoal</h3>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div>
				<form class="form-control" method="POST" action="controller/ProcessarTarefa.php?action=adicionar">
					<div class="mb-1">
						<label class="form-label">Título da tarefa:</label>
					</div>
					<div class="mb-3">
						<input class="form-control" type="text" name="titulo-tarefa" placeholder="Adicione uma tarefa">
					</div>
					<div class="mb-1">
						<label class="form-label">Descrição da tarefa:</label>
						<span class="form-text">(opcional)</span>
					</div>
					<div class="mb-3">
						<textarea class="form-control" name="descricao-tarefa"></textarea>
					</div>
					<div class="mb-3">
						<button class="btn btn-outline-primary">Adicionar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Parte que exibe as tarefas -->
	<div class="container">
		<div class="row">
			<div class="mt-3">
				<h3 class="float-start">Tarefas adicionadas:</h3>
			</div>
			<div>
				<table class="table"></table>
			</div>
		</div>
	</div>
</body>
</html>