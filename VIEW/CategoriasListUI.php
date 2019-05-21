<br>
<form action="CategoriasUI.php" method="GET">
    <div id="top" class="form-row">
        <div class="col-md-4">
            <h2>Categorias</h2>
        </div>
        <div class="form-group col-md-4">
            <input type="text" name="HTML_busca" class="form-control" placeholder="Categoria">
        </div>
        <div class="form-group col-md-3">
            <input type="hidden" name="type" value="1">
            <input type="submit" value="Buscar" class="btn btn-primary">
        </div>
        <div class="col-md-1">
            <a href="CategoriasUI.php?type=3&dados=0">adicionar</a>
        </div>
    </div>
</form>
<hr>

<div id="list" class="row">
    <div class="table-responsive col-md-12">
        <table class="table table-striped table-dados" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th class="action">ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=0;i<count($itens);$i++){
                        
                    ?>
                    <tr>
                        <td><font class="FntData"><?= $itens[$i]->getCod();?></font></td>
                        <td><font class="FntData"><a href="CategoriasUI.php?type=2&id=<?= $itens[$i]->getCod();?>"><?=$itens[$i]->getNome();?></a></font></td>
                        <td><font class="FntData"><?=$itens[$i]->getDesc();?></font></td>
                        <td class="actions">
                            <a class="btn btn-warning" href="CategoriasUI.php?type=3&dados=1&id=<?=$itens[$i]->getCod();?>">editar</a>
                            <a class="btn btn-danger" href="CategoriasUI.php?type=4&id=<?=$itens[$i]->getCod();?>">excluir</a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>