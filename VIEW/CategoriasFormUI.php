<?php
if(isset($_GET['acao'])){

}else if(isset($_GET['dados'])){
    $dados= $_GET['dados'];
    ?>
    <div id="top" class="row">
    <div class="col-md-12">
        <h2>Categorias</h2>

    </div>
    </div>
    <hr/>
    <?php
    if($dados==0){
        ?>
      

    
        <form action="CategoriasUI.php" method="GET">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputemail4">Nome</label>
                    <input type="text" class="form-control" id="html_nome" name="html_nome">
                </div>
                <div class="form-group col-md-6" >
                    <label for="inputpassword4" > Descrição</label>
                    <input type="text" class="form-control" id="html-desc" name="html_desc">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="hidden" name="acao" value="1">
                    <input type="hidden" name="type" value="3">
                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
            </div>
        </form>
        <?php
    }else if($dados==1) {
        $id=$_GET['id'];
        $objCate = $ObjBDCat->DetalhesCategorias($vConn, $id);
        
        ?>
        <form action="CategoriasUI.php" method="GET">
            <div class="form-row">
                <div class="form-group col-md-2" >
                    <label for="inputEmail4" > Código</label>
                    <input type="text" class="form-control" id="html_cod" name="html_cod" value="<?= $objCate->getCod();?>">
                </div>

                <div class="form-group col-md-5">
                    <label for="inputPassword4"> Nome</label>
                    <input type="text" class="form-control" id="html_nome" name="html_nome" value="<?=$objCate->getNome(); ?>">
                </div>
                
                <div class="form-group col-md-5">
                    <label for="inputPassword4"> Descrição</label>
                    <input type="text" class="form-control" id="html_desc" name="html_desc" value="<?= $objCate->getDesc();?>">
                </div>

            </div>
            <div class="form-row">  
                <div class="form-group col-md-12" style="text-align:right">
                    <input type="hidden" name="acao" value="2">
                    <input type="hidden" name="type" value="3">
                    <input type="hidden" name="id" value="<?=$objCate->getCod();?>">
                    <input type="submit" class="btn btn-primary" value="Alterar Item">

                </div>

            </div>
        </form>
        <?php
    }
}
?>