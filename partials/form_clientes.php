<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome" value="<?= isset($cliente) ? $cliente['nome'] : '' ?>">
</div>
<div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail" value="<?= isset($cliente) ? $cliente['email'] : '' ?>">
</div>
<div class="form-group">
    <label for="data_cadastro">Data de cadastro</label>
    <input class="form-control" name="data_cadastro" type="date" id="data_cadastro" value="<?= isset($cliente) ? $cliente['data_cadastro'] : '' ?>">
</div>
<div class="form-group">
    <label for="pagamento_id">Tipo de pagamento</label>
    <select name="pagamento_id" class="form-control" id="pagamento_id">
        <option value="">Selecione</option>
        <?php foreach($pagamentos as $key => $pagamento): ?>
            <?php if($pagamento['id'] == $cliente['pagamento_id']): ?>
                <option value="<?= $pagamento['id'] ?>" selected><?= $pagamento['nome'] ?></option>
            <?php else: ?>
                <option value="<?= $pagamento['id'] ?>"><?= $pagamento['nome'] ?></option>
            <?php endif ?>
        <?php endforeach ?>
    </select>
</div>