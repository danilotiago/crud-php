<div class="form-group">
    <label for="id_cliente">Cliente</label>
    <select name="id_cliente" class="form-control" id="id_cliente">
        <option value="">Selecione</option>
        <?php foreach($clientes as $key => $cliente): ?>
            <?php if($cliente['id'] == $pedido['id_cliente']): ?>
                <option value="<?= $cliente['id'] ?>" selected><?= $cliente['nome'] ?></option>
            <?php else: ?>
                <option value="<?= $cliente['id'] ?>"><?= $cliente['nome'] ?></option>
            <?php endif ?>
        <?php endforeach ?>
    </select>
</div>

<div class="form-group">
    <label for="id_produto">Produto</label>
    <select name="id_produto" class="form-control" id="id_produto">
        <option value="">Selecione</option>
        <?php foreach($produtos as $key => $produto): ?>
            <?php if($produto['id'] == $pedido['id_produto']): ?>
                <option value="<?= $produto['id'] ?>" selected><?= $produto['nome'] ?></option>
            <?php else: ?>
                <option value="<?= $produto['id'] ?>"><?= $produto['nome'] ?></option>
            <?php endif ?>
        <?php endforeach ?>
    </select>
</div>

<div class="form-group">
    <label for="quantidade">Quantidade</label>
    <input type="number" name="quantidade" class="form-control" id="quantidade" value="<?= isset($pedido) ? $pedido['quantidade'] : '' ?>" placeholder="Digite o nome">
</div>

<div class="form-group">
    <label for="valor">Valor</label>
    <input type="number" name="valor" class="form-control" id="valor" value="<?= isset($pedido) ? $pedido['valor'] : '' ?>" placeholder="Digite o nome">
</div>