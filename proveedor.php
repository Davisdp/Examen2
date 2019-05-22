<?php

class proveedor{

	private $IdProveedor;
	private $NombreEmpresa;
	private $NombreContacto;
	private $CargoContacto;
	private $Direccion;
	private $Ciudad;
	private $Region;
	private $CodPostal;
	private $Pais;
	private $Telefono;
	private $Fax;
	private $PaginaPrincipal;


	public function Proveedor() {
        $this->IdProveedor=0;
        $this->NombreEmpresa="";
       
    }
      public function getIdProveedor(){
        return $this->IdProveedor;
    }
    public function setIdProveedor($id){
        $this->IdProveedor=$id;
    }
    public function getNombreEmpresa(){
        return $this->NombreEmpresa;
    }
     public function setNombreEmpresa($nome){
         $this->NombreEmpresa=$nome;
    }
  	public function getNombreContacto(){
        return $this->NombreContacto;
    }
     public function setNombreContacto($nomc){
         $this->NombreContacto=$nomc;
    }
  	public function getCargoContacto(){
        return $this->CargoContacto;
    }
     public function setCargoContacto($cargoc){
         $this->CargoContacto=$cargoc;
    }
    public function getDireccion(){
        return $this->Direccion;
    }
     public function setDireccion($dirre){
         $this->Direccion=$dirre;
    }
    public function getCiudad(){
        return $this->Ciudad;
    }
     public function setCiudad($ciu){
         $this->Ciudad=$ciu;
    }
    public function getRegion(){
        return $this->Region;
    }
     public function setRegion($regi){
         $this->Region=$regi;
    }
    public function getCodPostal(){
        return $this->CodPostal;
    }
     public function setCodPostal($codp){
         $this->CodPostal=$codp;
    }
  	public function getPais(){
        return $this->Pais;
    }
     public function setPais($pa){
         $this->Pais=$pa;
    }
     public function getTelefono(){
        return $this->Telefono;
    }
     public function setTelefono($tell){
         $this->Telefono=$tell;
    }
    public function getFax(){
        return $this->Fax;
    }
     public function setFax($fa){
         $this->Fax=$fa;
    }
  	public function getPaginaPrincipal(){
        return $this->PaginaPrincipal;
    }
     public function setPaginaPrincipal($pagi){
         $this->PaginaPrincipal=$pagi;
    }


}


