<html>
<head>
    <meta charset="utf-8"/>
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <h1>Tarefa: <?php echo $tarefa['nome']; ?></h1>
    <p>
        <a href="tarefas.php">Voltar para a lista de tarefas</a>
    </p>

    <p>
        <strong>Concluida:</strong>
        <?php echo traduz_concluida($tarefa['concluida']); ?>
    </p>

    <p>
        <strong>Descrição:</strong>
        <?php echo nl2br($tarefa['descricao']); ?>
    </p>
    <p>
        <strong>Prazo:</strong>
        <?php echo traduz_data_para_exibir($tarefa['prazo']); ?>
    </p>
    <p>
        <strong>Prioridade:</strong>
        <?php echo traduz_prioridade($tarefa['prioridade']); ?>
    </p>

    <h2>Anexos</h2>

    <h2>Anexos</h2>

    <?php if (count($anexos) > 0) : ?>
        <table>
            <tr>
                <th>Arquivo</th>
                <th>Opções</th>
            </tr>
            <?php foreach ($anexos as $anexo) : ?>
                <tr>
                    <td><?php echo $anexo['nome']; ?> </td>
                    <td>
                        <a href="anexos/<?php echo $anexo['arquivo']; ?> ">
                            Download
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>Não há anexos para esta tarefa.</p>
    <?php endif; ?>


    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Novo anexo</legend>

            <input type="hidden"
                   name="tarefa_id" value="<? echo $tarefa['id']; ?>"/>

            <label>
                <?php if ($tem_erros && isset($erros_validacao['anexo'])): ?>
                    <span class="erro">
               <?php echo $erros_validacao['anexo']; ?>
           </span>
                <?php endif; ?>

                <input type="file" name="anexo"/>

            </label>
            <input type="submit" value="Cadastrar"/>
        </fieldset>
    </form>


</div>
</body>
</html>