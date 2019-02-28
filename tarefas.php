<?php
session_start();
include 'banco.php';
include 'ajudantes.php';


$exibir_tabela = true;
$tem_erros = false;
$erros_validacao = array();


if (tem_post()) {
    $tarefas = array();

    if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
        $tarefas['nome'] = $_POST['nome'];
    } else {
        $tem_erros = true;
        $erros_validacao['nome'] = "O nome da tarefa é obrigatorio";
    }

    if (isset($_POST['descricao'])) {
        $tarefas['descricao'] = $_POST['descricao'];
    } else {
        $tarefas['descricao'] = '';
    }

    if (isset($_POST['prazo']) && strlen($_POST['prazo']) > 0) {
        if (validar_data($_POST['prazo'])) {
            $tarefas['prazo'] = traduz_data_para_banco($_POST['prazo']);
        }else{
            $tem_erros = true;
            $erros_validacao['prazo'] = 'O prazo não é uma data válida!';
        }
    } else {
        $tarefas['prazo'] = '';
    }

    $tarefas['prioridade'] = $_POST['prioridade'];

    if (isset($_POST['concluida'])) {
        $tarefas['concluida'] = 1;
    } else {
        $tarefas['concluida'] = 0;
    }

    $_SESSION['lista_tarefas'][] = $tarefas;

    if (!$tem_erros) {
        gravar_tarefa($conexao, $tarefas);
        header('Location: tarefas.php');
        die();
    }

}

$lista_tarefas = buscar_tarefas($conexao);

$tarefa = array(
    'id' => 0,
    'nome' => (isset($_POST['nome'])) ?
        $_POST['nome'] : '',
    'descricao' => (isset($_POST['descricao'])) ?
        $_POST['descricao'] : '',
    'prazo' => (isset($_POST['prazo'])) ?
        traduz_data_para_banco($_POST['prazo']) : '',
    'prioridade' => (isset($_POST['prioridade'])) ?
        $_POST['prioridade'] : 1,
    'concluida' => (isset($_POST['concluida'])) ?
        $_POST['concluida'] : ''
);

include "template.php";




