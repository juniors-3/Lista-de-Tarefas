<?php
include "banco.php";

remover_tarefa($conexao, $_POST['id']);
header('Location: tarefas.php');