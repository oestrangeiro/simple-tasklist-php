<?php
	session_start();

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
<body class="">
	<div class="container">
		<div class="row mb-5">
			<h3 class="text-center">Gerenciador de tarefas pessoal</h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<!-- Dash board -->
			<div class="col-2 bg-secondary">
				<div class="vstack gap-3 text-center">

					<div class="">
						<a href="../routes/router.php?action=listar">Listar Tarefas</a>
					</div>
				</div>
			</div>
			<!-- Fim do dashboard -->
			<div class="col-6">
				<form class="form-control" method="POST" action="/routes/router.php?action=adicionar">
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
</body>
</html>