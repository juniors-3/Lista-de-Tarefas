<?php
session_start();
?>


<html>
<head>
    <title>Agenda de Contatos</title>
</head>
<body>
<h1>Agenda de Contatos</h1>
<form>
    <fieldset>
        <legend>Novo Contato</legend>
        <label>
            Nome:
            <input type="text" name="nome"/>
        </label>
        <label>
            Telefone:
            <input type="tel" name="telefone"/>
        </label>
        <label>
            E-mail:
            <input type="email" name="email"/>
        </label>
        <input type="submit" value="Adicionar"/>
    </fieldset>
</form>

<?php
if (isset($_GET['nome'])) {
    $_SESSION['contato'][] = $_GET['nome'];
    $_SESSION['contato'][] = $_GET['telefone'];
    $_SESSION['contato'][] = $_GET['email'];

    $_SESSION['lista'][] = $_SESSION['contato'];
    unset($_SESSION['contato']);
}

$lista_contatos = array();

if (isset($_SESSION['lista'])) {
    $lista_contatos = $_SESSION['lista'];
}


?>

<table>
    <tr>
        <th>Contatos</th>
    </tr>

    <?php foreach ($lista_contatos as $contato) { ?>
        <tr>
            <td>
                <?php echo $contato['0']; ?>
            </td>

            <td>
                <?php echo $contato['1']; ?>
            </td>

            <td>
                <?php echo $contato['2']; ?>
            </td>
        </tr>

    <?php } ?>
</table>


</body>
</html>
