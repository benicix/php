<?php

require_once 'ConexaoDAO.php';
require_once '../MODEL/Produtos.php';




class ProdutosDAO {

    function alterarProduto($tmpConn, $tmpProd, $tmpCod) {

        $nome = $tmpProd->getNome();
        $forn = $tmpProd->getCodForn();
        $cat = $tmpProd->getCodCat();
        $preco = $tmpProd->getPreco();
        $quant = $tmpProd->getQuant();

        mysqli_query($tmpConn, "Update products set productName = '$nome', SupplierID = '$forn', CategoryID = '$cat', QuantityPerUnit = '$quant', UnitPrice = '$preco' where ProductID = '$tmpCod'") or die(mysqli_error($tmpConn));
    }

    function cadastrarProduto($tmpConn, $tmpProd) {

        $nome = $tmpProd->getNome();
        $forn = $tmpProd->getCodForn();
        $cat = $tmpProd->getCodCat();
        $preco = $tmpProd->getPreco();
        $quant = $tmpProd->getQuant();

        mysqli_query($tmpConn, "Insert into products(ProductName, SupplierID, CategoryID, QuantityPerUnit,UnitPrice)values('$nome', '$forn', '$cat', '$quant', '$preco')");
    }

    function listarProdutos($tmpConn, $tmpTipo, $tmpNome) {

        if ($tmpTipo == 0) { //Listar todos os produtos    
            $rsProdutos = mysqli_query($tmpConn, "Select * from products P, suppliers S, categories C where P.supplierID = S.supplierID and P.categoryID = C.categoryID") or die(mysqli_error($tmpConn));
        } else if ($tmpTipo == 1) { //Listagem por nome
            $rsProdutos = mysqli_query($tmpConn, "Select * from products P, suppliers S, categories C where P.productName like '%$tmpNome%' and P.supplierID = S.supplierID and P.CategoryID = C.CategoryID") or die(mysqli_error($tmpConn));
        }
        

        $itens = new ArrayObject();

        while ($tblProdutos = mysqli_fetch_array($rsProdutos)) {

            $objProd = new Produtos();

            $objProd->setCod($tblProdutos['ProductID']);
            $objProd->setNome($tblProdutos['ProductName']);
            $objProd->setCodForn($tblProdutos['SupplierID']);
            $objProd->setCodCat($tblProdutos['CategoryID']);
            $objProd->setQuant($tblProdutos['QuantityPerUnit']);
            $objProd->setPreco($tblProdutos['UnitPrice']);

            $itens->append($objProd);
        }

        return $itens;
    }

    function excluirProduto($tmpConn, $tmpCod) {
        $sql = "Delete from products where ProductID = '$tmpCod'";
        mysqli_query($tmpConn, $sql) or die(mysqli_error($tmpConn));
    }

    function detalhesProduto($tmpConn, $tmpCod) {
        $objProd = new Produtos();

        $sql = "Select * from products where ProductID = '$tmpCod'";
        $rsProd = mysqli_query($tmpConn, $sql)
                or die(mysqli_error($tmpConn));

        $tblProdutos = mysqli_fetch_array($rsProd);

        $objProd->setCod($tblProdutos['ProductID']);
        $objProd->setNome($tblProdutos['ProductName']);
        $objProd->setCodForn($tblProdutos['SupplierID']);
        $objProd->setCodCat($tblProdutos['CategoryID']);
        $objProd->setQuant($tblProdutos['QuantityPerUnit']);
        $objProd->setPreco($tblProdutos['UnitPrice']);

        return $objProd;
    }

}
?>

