<?php
class Clientes{
    private $ClienteID, $Nome,$empresa, $endereco, $telefone, $cidade, $estado, $status;
    public function GetClienteID(){
        return $this->ClienteID;
    }
    public function SetClienteID($ClienteID){
        $this->ClienteID=$ClienteID;
    }
    public function GetNome(){
        return $this->Nome;
    }
    public function SetNome($Nome){
        $this->$Nome=$Nome;
    }
    public function GetEmpresa(){
        return $empresa;
    }
    public function SetEmpresa($empresa){
        $this->empresa=$empresa;
    }
    public function GetEndereco(){
        return $this->endereco;
    }
    public function SetEndereco($endereco){
        $this->endereco=$endereco;
    }
    public function GetTelefone(){
        return $this->telefone;
    }
    public function SetTelefone($telefone){
        $this->telefone=$telefone;
    }
    public function GetCidade(){
        return $this->cidade;
    }
    public function SetCidade($Cidade){
        $this->cidade=$Cidade;
    }
    public function GetEstado(){
        return $this->estado;
    }
    public function SetEstado($estado){
        $this->estado=$estado;
    }
    public function GetStatus(){
        return $this->status;
    }
    public function SetStatus($status){
        $this->status=$status;
    }
}
?>