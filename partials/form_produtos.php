<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="<?= isset($produto) ? $produto['nome'] : '' ?>" class="form-control" id="nome" placeholder="Digite o nome">
</div>

<div class="form-group">
    <label for="valor">Valor</label>
    <input type="number" name="valor" value="<?= isset($produto) ? $produto['valor'] : '' ?>" step="any" class="form-control" id="valor" placeholder="Digite o valor">
</div>

<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" value="<?= isset($produto) ? $produto['descricao'] : '' ?>" class="form-control" id="descricao" placeholder="Digite a descrição">
</div>

<div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" name="foto" class="form-control-file" id="foto">
</div>