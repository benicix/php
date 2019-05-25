<?php
require_once "../MODEL/Categorias.php";
require_once "../MODEL/Produtos.php";
require_once "../MODEL/Fornecedores.php";
require_once "../DAO/CategoriasDAO.php";
require_once "../DAO/ConexaoDAO.php";
require_once "../DAO/ProdutosDAO.php";
require_once "../DAO/FornecedoresDAO.php";
?>
<meta charset="UTF-8">
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
        <script src="../../js/bootstrap.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
        <link rel="stylesheet" href="../../css/bootstrap.css">    
        <link rel="stylesheet" href="../../css/estilo.css">    
    </head>
    <body>
        <div id="main" class="container-fluid">
            <?php
                include "MenuUI.php"
            ?>
            <?php
                //objetos do banco
                $ObjBD= new ConexaoDAO();
                $vConn=$ObjBD->abrirConexao();
                $ObjBDProd = new ProdutosDAO();
                $ObjBDForn =  new FornecedoresDAO();
                $ObjBDCat = new CategoriasDAO();

                if(!isset($_GET['type'])){
                   $type =0; 
                }else{
                    $type = $_GET['type'];
                }if($type==0){
                    $itens = $ObjBDCat->listarCategorias($vConn, $type, "");
                    include 'CategoriasListUI.php';

                }else if($type==1){
                    $nome=$_GET['HTML_busca'];
                    $itens = $ObjBDCat->listarCategorias($vConn, $type, $nome);
                    include 'CategoriasListUI.php';
                }
                else if($type==2){
                    $id = $_GET['id'];
                    $objCate = new Categorias();
                    $objCate = $ObjBDCat->DetalhesCategorias($vConn, $id);
                    include 'CategoDetalhes.php';
                }else if($type==3){
                    include 'CategoriasFormUI.php';
                }else if($type==4){
                    include 'CategoriasFormUI.php';
                }

            ?>
        </div>
    </body>

</html>