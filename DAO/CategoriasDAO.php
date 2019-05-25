<?php

require_once 'ConexaoDAO.php';
require_once '../MODEL/Categorias.php';

class CategoriasDAO {

    function listarCategorias($tmpConn, $tmpTipo, $tmpCod) {
       if($tmpTipo == 0){
			$rsCategorias = mysqli_query($tmpConn, "Select * from categories");
	   }else{
        	$rsCategorias = mysqli_query($tmpConn, "Select * from categories where CategoryName like '%$tmpCod%'");
	   }
	   
        $itens = new ArrayObject();

        while($tblCategorias = mysqli_fetch_array($rsCategorias)) {
            $objCat = new Categorias();

            $objCat->setCod($tblCategorias['CategoryID']);
            $objCat->setDesc($tblCategorias['Description']);
            $objCat->setNome($tblCategorias['CategoryName']);

            $itens->append($objCat);
        }

        return $itens;
    }

    function alterarCategoria($tmpConn,$obj) {
        
        //$tmpConn->exec("set names utf8");
        
        $nome = $obj->getNome();
        $desc = $obj->getDesc();
        $cod = $obj->getCod();
        

        
        //$conn->exec("Call inserirCategoria('$nome','$desc')");
        mysqli_query($tmpConn,"Update categories set description = '$desc', CategoryName='$nome' where CategoryID = '$cod'") or die(mysqli_error($tmpConn));        
    }
    function AddCategoria($vConn, $tmpCate){
        $nome=$tmpCate->getNome();
        $desc=$tmpCate->getDesc();
        $cod=$tmpCate->getCod();
        mysqli_query($vConn, "insert into categories(CategoryName, Description, CategoryID) values('$nome', '$desc','$cod')") or die (mysqli_error($vConn));

    }
    
    function DetalhesCategorias($vConn, $id)
    {
        $objCategoria = new Categorias();
        $rsCategoria = mysqli_query($vConn, "select *from categories where CategoryID = '$id'") or die(mysqli_error($vConn));

        $tblCategoria = mysqli_fetch_array($rsCategoria);

        $objCategoria->setCod($tblCategoria['CategoryID']);
        $objCategoria->setDesc($tblCategoria['Description']);
        $objCategoria->setNome($tblCategoria['CategoryName']);

        return $objCategoria;
    }
    function DeletarCategoria($vConn, $tmpCategoria){
        mysqli_query($vConn, "delete from categories where CategoryID = '$tmpCategoria'") or die (mysqli_error($vConn));
        
    }
    
    

}
