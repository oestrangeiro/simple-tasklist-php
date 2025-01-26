<?php
	require '../inc/functions.php';	
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

			    // ID da tarefa (oculto)
			    echo "<td hidden data-task-id=\"{$fields['id']}\"></td>";

			    
			    echo "<td class=\"task-title\">";
			    echo $fields['title'];
			    echo "</td>";

			    
			    echo "<td>";
			    echo $fields['description'] !== 'NULL' ? $fields['description'] : '';
			    echo "</td>";

			    
			    echo "<td>";
			    echo $fields['is_finished'] == 0 ? 'Não' : 'Sim';
			    echo "</td>";

			    // Botões de ação
			    echo "<td>";
			    echo "<button class=\"btn btn-primary edit-button\" data-bs-toggle=\"modal\" data-bs-target=\"#modalEdit\">Editar</button>";
			    echo "<button class=\"btn btn-danger delete-button\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\">Excluir</button>";
			    echo "</td>";

			    echo "</tr>";
			}

		?>
	</tbody>
	</table>
	<!-- Fim da tabela -->

	<!-- Código do modal de edição -->
	
	<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  		<div class="modal-dialog">
    	<div class="modal-content">
     	<div class="modal-header">
        	<h1 class="modal-title fs-5" id="modalEditLabel">Editar Tarefa</h1>
        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      	</div>
      	<div class="modal-body">

        <!-- Formulário de Edição -->
        <form method="POST" action="/controller/editar.php">
        	<input type="hidden" id="task-id-input" name="id-tarefa">
        	<div class="mb-3">
            	<label for="titulo-tarefa" class="form-label">Título da Tarefa</label>
            	<input type="text" class="form-control" name="titulo-tarefa" placeholder="Insira o título">
          	</div>
      		<div class="mb-3">
            	<label for="descricao-tarefa" class="form-label">Descrição da Tarefa</label>
            	<textarea class="form-control" name="descricao-tarefa" placeholder="Insira a descrição"></textarea>
          	</div>
        <div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
        	</form>
    	</div>
    </div>
  	</div>
</div>

	<!-- Fim do código do modal de edição -->

	<!-- Código do modal de remoção -->
	<!-- Modal de Remoção -->
	<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
		<div class="modal-dialog">
	    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h1 class="modal-title fs-5" id="modalDeleteLabel">Deletar Tarefa</h1>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	    	</div>
      		<div class="modal-body">
      			<form class="form-control" method="POST" action="/controller/deletar.php">
      				<div class="mb-2">
      					<p><strong>Título:</strong> <span id="delete-task-title"></span></p>
        				<input type="hidden" id="delete-task-id" name="task-id">		
      				</div>
      				
        			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-danger">Deletar</button>
	      			</div>
      			</form>
	        		
	    	</div>
	    	</div>
  		</div>
	</div>

	<!--
		Código para passar o ID da tarefa ao clicar no botão para o modal.
		Javascript é uma bosta mesmo puta que pariu
	 -->
	<script type="text/javascript">
		// Seleciona todos os botões de exclusão
		document.querySelectorAll(".delete-button").forEach((button) => {
		  button.addEventListener("click", (event) => {
		    // Localiza a linha correspondente ao botão clicado
		    const row = event.target.closest("tr");

		    // Captura o ID e o título da tarefa
		    const taskId = row.querySelector("[data-task-id]").getAttribute("data-task-id");
		    const taskTitle = row.querySelector(".task-title").textContent;

		    // Preenche os campos do modal
		    document.getElementById("delete-task-id").value = taskId;
		    document.getElementById("delete-task-title").textContent = taskTitle;
		  });
		});
	</script>

	<!-- Script para o modal de edição -->
	<script type="text/javascript">
		// Seleciona todos os botões de edição
		document.querySelectorAll(".edit-button").forEach((button) => {
		  button.addEventListener("click", (event) => {
		    // Localiza a linha correspondente ao botão clicado
		    const row = event.target.closest("tr");

		    // Captura o ID, título e descrição da tarefa
		    const taskId = row.querySelector("[data-task-id]").getAttribute("data-task-id");
		    const taskTitle = row.querySelector(".task-title").textContent;
		    const taskDescription = row.querySelector("td:nth-child(3)").textContent.trim(); // Assume a descrição como a terceira célula (ajuste se necessário)

		    // Preenche os campos do modal de edição
		    document.getElementById("task-id-input").value = taskId;
		    document.querySelector("input[name='titulo-tarefa']").value = taskTitle;
		    document.querySelector("textarea[name='descricao-tarefa']").value = taskDescription || ""; // Evita `undefined` se descrição for vazia
		  });
		});

	</script>
</body>
</html>