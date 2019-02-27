<form class="col-sm-12" METHOD="post">
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>"/>

    <fieldset>
        <legend>Nova Tarefa</legend>
        <label>
            Tarefa:

            <?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
                <span class="text-danger">
                <?php echo $erros_validacao['nome']; ?>
            </span>
            <?php endif; ?>

            <input type="text" name="nome" value="<?php echo $tarefa['nome'];?>" class="form-control"/>
        </label>
        <br>

        <label>
            Prazo:
            <input type="text" name="prazo" value="<?php echo traduz_data_para_exibir($tarefa['prazo']); ?>"
                   class="form-control">
        </label>

        <br>

        <label>
            Descrição:
            <textarea name="descricao" class="form-control"><?php echo $tarefa['descricao']; ?></textarea>
        </label>

        <fieldset>
            <legend>Prioridade</legend>
            <label class="form-group">
                <input type="radio" name="prioridade" value="1"
                    <?php echo ($tarefa['prioridade'] == 1)
                        ? 'checked'
                        : '';
                    ?>/>Baixa

                <input type="radio" name="prioridade" value="2"
                    <?php echo ($tarefa['prioridade'] == 2)
                        ? 'checked'
                        : ''; ?>
                       ?/>Media
                <input type="radio" name="prioridade" value="3"
                <?php echo ($tarefa['prioridade'] == 3)
                ? 'checked'
                : '';
                ?>/>Alta
            </label>
        </fieldset>

        <label class="form-group">
            Tarefa Concluida:
            <input type="checkbox" name="concluida" value="1"/>
        </label>
        <hr>

        <input type="submit" value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>" class="btn btn-info"/>
    </fieldset>
</form>
