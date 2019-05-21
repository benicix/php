<?php
require_once 'ConexaoDAO.php';
require_once '../MODEL/Fornecedores.php';

class FornecedoresDAO{
    
   function listarFornecedores($tmpConn, $tmpTipo, $tmpCod){
      
	  if($tmpTipo == 0){
			$rsFornecedores = mysqli_query($tmpConn, "Select * from suppliers");
	  }else{
			$rsFornecedores = mysqli_query($tmpConn, "Select * from suppliers where SupplierID = '$tmpCod'");
	  }
       
       
       $itens = new ArrayObject();
       
       while($tblFornecedores = mysqli_fetch_array($rsFornecedores)){
           
           $objForn = new Fornecedores();
           
           $objForn->setCod($tblFornecedores['SupplierID']);
           $objForn->setNome($tblFornecedores['CompanyName']);
           $objForn->setRepresentante($tblFornecedores['ContactName']);
           $objForn->setCargo($tblFornecedores['ContactTitle']);
           $objForn->setEndereco($tblFornecedores['Address']);
           
           
           $itens->append($objForn);
       }
       
       return $itens;
   }
    
}
?>
