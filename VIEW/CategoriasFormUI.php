<?php
if(isset($_GET['acao'])){
    $acao=$_GET['acao'];
    $objCategorias= new Categorias();
    $objCategorias->setNome($_GET['html_nome']);
    $objCategorias->setDesc($_GET['html_desc']);
    $objCategorias->setCod($_GET['html_cod']);
    if($acao==1){
        $ObjBDCat->addCategoria($vConn, $objCategorias);
        $add = $objCategorias->getNome();
        echo "<script> alert('Categoria $add adicionado');</script>";
        echo "<script>location.href='CategoriasUI.php?type=0';</script>";
    }else if($acao==2){
        

        $ObjBDCat->alterarCategoria($vConn, $objCategorias);
        $nome=$objCategorias->getNome();
        

        echo "<script> alert('Categoria $nome alterado');</script>";
        echo "<script>location.href='CategoriasUI.php?type=0';</script>";
    }
    
    

}else {
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
            <div class="form-row" >
                <div class="form-group col-md-8">
                    <label for="inputemail4" >Nome</label>
                    <input type="text" class="form-control" id="html_nome" name="html_nome">
                </div>
                <div class="form-group col-md-8" >
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

                <div class="form-group col-md-8">
                    <label for="inputPassword4"> Nome</label>
                    <input type="text" class="form-control" id="html_nome" name="html_nome" value="<?=$objCate->getNome(); ?>">
                </div>
                
                <div class="form-group col-md-7">
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
    }else if($dados==2){
        $id=$_GET['id'];
        $objCategoria= $ObjBDCat->DetalhesCategorias($vConn, $id);
        if(isset($_GET['validar'])){
            
            $ObjBDCat->DeletarCategoria($vConn, $id);
            
            echo "<script>alert('registro apagado');</script>";
            echo "<script>location.href='CategoriasUI.php?type=0';</script>";
        }
        ?>
        Deseja Realmente deletar? 
        <a href="CategoriasUI.php?type=4&validar=1&dados=2&id=<?=$id;?>">sim</a>
        <a href="CategoriasUI.php?type=0">não</a>
        <?php
    }
}
?>