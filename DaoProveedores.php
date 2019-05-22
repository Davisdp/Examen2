<?php 
include 'credenciales.php';
include 'proveedor.php';

class DAOProveedores{

	 private $con;
    
    public function __construct() {
        
    }
    public function conectar(){
        try {
             $this->con= new mysqli(SERVIDOR, USUARIO, CONTRA,BD) or die ("Error al conectar");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
  
    }
    public function desconectar(){
        $this->con->close();
    }

    public function getTabla(){
        $sql ="select * from proveedor";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
       
        $tabla ="<table class='table-responsive-sm table-striped table-dark text-center table-bordered'>"
                . "<thead class='thead-dark'>";
        
        $tabla .="<tr>"
                    . "<th>ID PROVEEDOR</th>"
                    . "<th>NOMBRE DE EMPRESA</th>"
                    . "<th>NOMBRE DE CONTACTO</th>"
                    . "<th>CARGO DE CONTACTO ($)</th>"
                    . "<th>DIRECCION</th>"
                    . "<th>CIUDAD</th>"
                    . "<th>REGION</th>"
                    . "<th>CODIGO POSTAL</th>"
                    . "<th>PAIS</th>"
                    . "<th>TELEFONO</th>"
                    . "<th>FAX</th>"
                    . "<th>PAGINA PRINCIPAL</th>"
                    . "<th>SELECCIONAR</th>"
              	    . "</tr></thead><tbody>";
        
        while($fila = mysqli_fetch_assoc($res)){
            $tabla .= "<div class='table-responsive'><tr class='table-info'>"
                        . "<td><font color='red'>".$fila["IdProveedor"]."</td>"
                        . "<td><font color='red'>".$fila["NombreEmpresa"]."</td>"
                        . "<td><font color='red'>".$fila["NombreContacto"]."</td>"
                        . "<td><font color='red'>".$fila["CargoContacto"]."</td>"
                        . "<td><font color='red'>".$fila["Direccion"]."</td>"
                        . "<td><font color='red'>".$fila["Ciudad"]."</td>"
                        . "<td><font color='red'>".$fila["Region"]."</td>"
                        . "<td><font color='red'>".$fila["CodPostal"]."</td>"
                        . "<td><font color='red'>".$fila["Pais"]."</td>"
                        . "<td><font color='red'>".$fila["Telefono"]."</td>"
                        . "<td><font color='red'>".$fila["Fax"]."</td>"
                         . "<td><font color='red'>".$fila["PaginaPrincipal"]."</td>"
                        . "<td><a href=\"javascript:cargar('".$fila["IdProveedor"]."','".$fila["NombreEmpresa"]."','".$fila["NombreContacto"]."','".$fila["CargoContacto"]."','".$fila["Direccion"]."','".$fila["Ciudad"]."','".$fila["Region"]."','".$fila["CodPostal"]."','".$fila["Pais"]."','".$fila["Telefono"]."','".$fila["Fax"]."','".$fila["PaginaPrincipal"]."')\">Select</a></td>"
                    . "</tr>";  
        }
        $tabla .="</tbody></table>";
        $res->close();
        return $tabla;
 
    }

     public function insertar($obj){
        $prove = new proveedor();
        $prove = $obj;
        $sql="insert into proveedor values(".$prove->getIdProveedor().",'".$prove->getNombreEmpresa()."','".$prove->getNombreContacto()."','".$prove->getCargoContacto()."','".$prove->getDireccion()."','".$prove->getCiudad()."','".$prove->getRegion()."',".$prove->getCodPostal().",'".$prove->getPais()."',".$prove->getTelefono().",".$prove->getFax().",'".$prove->getPaginaPrincipal()."')";
        $this->conectar();
        if($this->con->query($sql)){
            
            echo "<script>swal({title:'Exito',text:'El registro fue insetado satisfactoriamente',type:'success'});</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no se pudo insertar',type:'error'});</script>";
        }  
        $this->desconectar();
    }
    public function modificar($obj){
       $provee = new proveedor();
       $provee = $obj;
        $sql="update proveedor set NombreEmpresa='".$provee->getNombreEmpresa()."',NombreContacto='".$provee->getNombreContacto()."',CargoContacto='".$provee->getCargoContacto()."',Direccion='".$provee->getDireccion()."',Ciudad='".$provee->getCiudad()."'"
                . ",Region='".$provee->getRegion()."',CodPostal=".$provee->getCodPostal().",Pais='".$provee->getPais()."',Telefono=".$provee->getTelefono().",Fax=".$provee->getFax().",PaginaPrincipal='".$provee->getPaginaPrincipal()."' where IdProveedor=".$provee->getIdProveedor()."";
        $this->conectar();
        if($this->con->query($sql)){
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue modificado satisfactoriamente',type:'success'});</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no se pudo modificar',type:'error'});</script>";
        }  
        $this->desconectar();
    }

      public function eliminar($IdProveedor){
        $sql="delete from proveedor where IdProveedor=$IdProveedor";
        $this->conectar();
        if($this->con->query($sql)){
         
            echo "<script>swal({title:'Exito',text:'El registro fue eliminado satisfactoriamente',type:'success'});</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no se pudo eliminar',type:'error'});</script>";
        }  
        $this->desconectar();
    }

      public function getFiltro($buscar){
        $sql ="select * from proveedor where IdProveedor like '%$buscar%' or NombreEmpresa like'%$buscar%' or NombreContacto like'%$buscar%' or CargoContacto like'%$buscar%' or Direccion like'%$buscar%'"
                ."or Ciudad like'%$buscar%' or Region like'%$buscar%' or CodPostal like'%$buscar%' or Pais like'%$buscar%' or Telefono like'%$buscar%' or Fax like'%$buscar%' or PaginaPrincipal like'%$buscar%'";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        if($buscar == "")
        {
          echo "<script>swal({title:'Error',text:'Favor digite datos  para la busqueda favor verificar',type:'error'});</script>"; 
        }else{
                            
        $tabla = "<table class='table-responsive table-dark text-center table-bordered'>"
                . "<thead class='thead-dark'>";
        
        $tabla .="<tr>"
                    . "<th>ID PROVEEDOR</th>"
                    . "<th>NOMBRE DE EMPRESA</th>"
                    . "<th>NOMBRE DE CONTACTO</th>"
                    . "<th>CARGO DE CONTACTO ($)</th>"
                    . "<th>DIRECCION</th>"
                    . "<th>CIUDAD</th>"
                    . "<th>REGION</th>"
                    . "<th>CODIGO POSTAL</th>"
                    . "<th>PAIS</th>"
                    . "<th>TELEFONO</th>"
                    . "<th>FAX</th>"
                    . "<th>PAGINA PRINCIPAL</th>"
                    . "<th>SELECCIONAR</th>"
              	    . "</tr></thead><tbody>";
        
           while($fila = mysqli_fetch_assoc($res)){
            $tabla .= "<tr class='table-warning'>"
                        . "<td><font color='red'>".$fila["IdProveedor"]."</td>"
                        . "<td><font color='red'>".$fila["NombreEmpresa"]."</td>"
                        . "<td><font color='red'>".$fila["NombreContacto"]."</td>"
                        . "<td><font color='red'>".$fila["CargoContacto"]."</td>"
                        . "<td><font color='red'>".$fila["Direccion"]."</td>"
                        . "<td><font color='red'>".$fila["Ciudad"]."</td>"
                        . "<td><font color='red'>".$fila["Region"]."</td>"
                        . "<td><font color='red'>".$fila["CodPostal"]."</td>"
                        . "<td><font color='red'>".$fila["Pais"]."</td>"
                        . "<td><font color='red'>".$fila["Telefono"]."</td>"
                        . "<td><font color='red'>".$fila["Fax"]."</td>"
                         . "<td><font color='red'>".$fila["PaginaPrincipal"]."</td>"
                        . "<td><a href=\"javascript:cargar('".$fila["IdProveedor"]."','".$fila["NombreEmpresa"]."','".$fila["NombreContacto"]."','".$fila["CargoContacto"]."','".$fila["Direccion"]."','".$fila["Ciudad"]."','".$fila["Region"]."','".$fila["CodPostal"]."','".$fila["Pais"]."','".$fila["Telefono"]."','".$fila["Fax"]."','".$fila["PaginaPrincipal"]."')\">Select</a></td>"
                    . "</tr>";  
                    }
        $tabla .="</tbody></table>";
        $res->close();
        return $tabla;
        }
                     
      }
      
}
