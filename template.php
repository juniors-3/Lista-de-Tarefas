<html>
<head>
    <meta charset="utf-8"/>
    <title>Gerenciador de Tarefas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</head>
<body>
<div class="container">

    <h1>Gerenciador de Tarefas</h1>
    <hr>
    <?php include('formulario.php'); ?>

    <?php if ($exibir_tabela) : ?>
        <?php include('tabela.php') ?>
    <?php endif; ?>

</div>
</body>
</html>