<?php

	/*
		Script de algumas funções singulares, mas simples de mais para serem
	 	métodos de classes.
	 	Como: funções que exibem modais específicos para edição, remoção de registros, etc...
	 */

	 // Função que exibe o botão para o gatilho do modal de edição da tarefa
	 function showButtonTriggerToModalEdit(){
		echo <<< BLOCK
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit">
				Editar
			</button>
		BLOCK;
	}

	// Função que exibe o botão para o gatilho do modal de remoção da tarefa
	function showButtonTriggerToModalDelete(){
		echo <<< BLOCK
			<button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#modalDelete">
				Deletar
			</button>
		BLOCK;
	}