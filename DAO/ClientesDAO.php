<?php
require_once 'ConexaoDAO.php';
require_once '../MODEL/Cliente.php';
class ClientesDAO{
    function BuscarCliente($vConn, $tmpCod, $tmpNome){
        if($tmpCod==1){
            $rsCliente=mysqli_query($vConn, "select * from customers")or die(mysqli_error($vConn));
        }else{
            $rsCliente=mysqli_query($vConn, "select * from customers companyName like '%$tmpNome%' or CantactName like '%$tmpNome%' ") or die(mysqli_error($vConn));
        }
        $arrayCliente= new ArrayObject();
        while($tblCliente = mysql_fetch_array($rsCliente)){
            $objCliente= new Clientes();
            $objCliente->SetClienteID($tblCliente['CustomerID']);
            $objCliente->SetEmpresa($tblCliente['CompanyName']);    
            $objCliente->SetCidade($tblCliente['City']);
            $objCliente->SetEndereco($tblCliente['Address']);        
            $objCliente->SetTelefone($tblCliente['Phone']);
            $objCliente->SetNome($tblCliente['ContactName']);
            $objCliente->SetEstado($tblCliente['country']);
            $objCliente->SetStatus($tblCliente['Status']);
            $arrayCliente->append($objCliente);
        }
        return $arrayCliente;
    }
}

?>