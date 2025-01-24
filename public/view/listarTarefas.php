<?php
	// FUNCAO TEMP MODAL PARA EDITAR TAREFA

	function showButtonTriggerToModal(){
		echo <<< BLOCK
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit">
				Editar
			</button>
		BLOCK;
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

<!-- Inicio da tabela -->
<table class="table table-hover text-center">
		<thead>
			<tr>
				<th>Tarefa</th>
				<th>Descrição</th>
				<th>Concluida</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach ($tasks as $fields) {
					echo "<tr>";

					echo "<td hidden id=\"idTask\" value=\"{$fields['id']}\">";
					echo "</td>";

					echo "<td>";
					echo $fields['title'];
					echo "</td>";

					
					if( $fields['description'] == 'NULL'){
						echo "<td>";
						echo "";
						echo "</td>";
					}else{
						echo "<td>";
						echo $fields['description'];
						echo "</td>";
					}

					if( $fields['is_finished'] == 0){
						echo "<td>";
						echo "Não";
						echo "</td>";
					}else{
						echo "<td>";
						echo "Sim";
						echo "</td>";
					}
					// Botão para abrir modal e editar tarefa
					echo "<td>";
					showButtonTriggerToModal();
					echo "</td>";

					echo "</tr>";
				}	
		?>
		

		</tbody>
	</table>
	<!-- Fim da tabela -->

	<!-- Código do modal -->
	<div class="modal fade" id="modalEdit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text">Editar Tarefa</h3>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body modal-dialog-scrollable">

					<!-- Sim, um formulário dentro de um fuckin' modal kkkkk -->
					<form class="form-control" method="POST" action="../view/a.php">

						<div class="mb-2">
							<input  hidden="" class="form-control" id="task-id-input" type="text"name="id">

							<label class="label mb-2">Editar título:</label>
							<input class="form-control" type="text" name="titulo" placeholder="Insira um título para a tarefa">

							<label class="form-label mb-2">Editar descrição:</label>
							<textarea class="form-control" type="text" name="descricao" placeholder="Insira uma descrição para a tarefa"></textarea>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-warning">Editar</button>
						</div>
					</form>

				</div>
				
			</div>
		</div>
	</div>
	<!-- Fim do código do modal -->

	<!--
		Código para passar o ID da tarefa ao clicar no botão para o modal.
		Javascript é uma bosta mesmo puta que pariu
	 -->
	<script type="text/javascript">
		const editButons = document.querySelectorAll(".btn");

		editButons.forEach((button) => {
			button.addEventListener("click", (event) => {
				const row = event.target.closest("tr");

				const taskId = row.querySelector("#idTask").getAttribute("value");

				// Essa linha coloca o valor da variável taskId no modal correspondente
				document.getElementById("task-id-input").value = taskId;
			});
		});
	</script>
</body>
</html>