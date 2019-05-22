<?php

include 'DAOProveedores.php';
$proveedor = new proveedor();
$provee = new proveedor();
$dao = new DAOProveedores();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORMULARIO DE REGISTRO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="sweetalert/sweetalert2.css">
    
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="sweetalert/sweetalert2.js"></script>
    
    <script src="js/jquery.js"></script>
    <script>
        function cargar(cod,nom,nomc,nomca,dirre,ciudad,reg,codp,pa,tel,fax,pag){
        document.formulario.txtCodigo.value=cod;
        document.formulario.txtNombre.value=nom;
        document.formulario.txtNombreC.value=nomc;
        document.formulario.txtCargo.value=nomca;
        document.formulario.txtDireccion.value=dirre;
        document.formulario.txtCiudad.value=ciudad;
        document.formulario.txtRegion.value=reg;
        document.formulario.txtCodigoPostal.value=codp;
        document.formulario.txtPais.value=pa;
        document.formulario.txtTelefono.value=tel;
        document.formulario.txtFax.value=fax;
        document.formulario.txtPaginaprincipal.value=pag;
    }
    </script>
    
    
</head>
<body>
    <div align="center">
        <h4>Formulario registro de Proveedores</h4><hr>
        <div class="form-group" style="position: relative; margin: auto; width: 500px;">
            <form method="POST" action="#" name="formulario">
                <input type="text" name="txtCodigo" value="" size="30" placeholder="Codigo"
                       class="form-control"/><br>
                 <input type="text" name="txtNombre" value="" size="30" placeholder="Nombre de empresa"
                       class="form-control"/><br>
                <input type="text" name="txtNombreC" value="" size="30" placeholder="Nombre de contacto"
                       class="form-control"/><br>
                <input type="text" name="txtCargo" value="" size="30" placeholder="Cargo de contacto"
                       class="form-control"/><br>
                 <input type="text" name="txtDireccion" value="" size="30" placeholder="Direccion"
                       class="form-control"/><br>
                <input type="text" name="txtCiudad" value="" size="30" placeholder="Ciudad"
                       class="form-control"/><br>
                <input type="text" name="txtRegion" value="" size="30" placeholder="Region"
                       class="form-control"/><br>
                <input type="text" name="txtCodigoPostal" value="" size="30" placeholder="Codigo Postal"
                       class="form-control"/><br>
                <input type="text" name="txtPais" value="" size="30" placeholder="Pais"
                       class="form-control"/><br>
                <input type="text" name="txtTelefono" value="" size="30" placeholder="Telefono"
                       class="form-control"/><br>
                <input type="text" name="txtFax" value="" size="30" placeholder="Fax"
                       class="form-control"/><br>
                <input type="text" name="txtPaginaprincipal" value="" size="30" placeholder="Pagina principal"
                       class="form-control"/><br>
                 <input type="submit" value="Guardar" name="btnGuardar" class="btn-primary"/>
                 <input type="submit" value="Eliminar" name="btnEliminar" class="btn-danger"/>
                 <input type="submit" value="Modificar" name="btnModificar" class="btn-dark"/>
            </form>
            <br><br><h4>Filtrar</h4><hr>
            <div class="form-inline" style="position: relative; margin: auto; width: 600px;">
                <form method="POST" action="#" name="busqueda">
                    <input type="text" name="txtBusqueda" value="" size="10" placeholder="Buscar...?"
                           class="form-control" style="width: 250px;">
                    <input type="submit" value="Buscar" name="btnBuscar" class="btn-success"/>
                    <input type="submit" value="Reiniciar" name="btnreset" class="btn-link"/>
                    <hr>
                </form>
            </div>
                <br><br>
        </div>
        
        
    </div>
    
     
    <?php
    if(isset($_REQUEST["btnGuardar"])){
        $proveedor->setIdProveedor($_REQUEST["txtCodigo"]);
        $proveedor->setNombreEmpresa($_REQUEST["txtNombre"]);
        $proveedor->setNombreContacto($_REQUEST["txtNombreC"]);
        $proveedor->setCargoContacto($_REQUEST["txtCargo"]);
        $proveedor->setDireccion($_REQUEST["txtDireccion"]);
        $proveedor->setCiudad($_REQUEST["txtCiudad"]);
        $proveedor->setRegion($_REQUEST["txtRegion"]);
        $proveedor->setCodPostal($_REQUEST["txtCodigoPostal"]);
        $proveedor->setPais($_REQUEST["txtPais"]);
        $proveedor->setTelefono($_REQUEST["txtTelefono"]);
        $proveedor->setFax($_REQUEST["txtFax"]);
        $proveedor->setPaginaPrincipal($_REQUEST["txtPaginaprincipal"]);
        
       
        $dao->insertar($proveedor);
        echo $dao->getTabla(); 
        
    }elseif(isset($_REQUEST["btnModificar"])){
        $provee->setIdProveedor($_REQUEST["txtCodigo"]);
        $provee->setNombreEmpresa($_REQUEST["txtNombre"]);
        $provee->setNombreContacto($_REQUEST["txtNombreC"]);
        $provee->setCargoContacto($_REQUEST["txtCargo"]);
        $provee->setDireccion($_REQUEST["txtDireccion"]);
        $provee->setCiudad($_REQUEST["txtCiudad"]);
        $provee->setRegion($_REQUEST["txtRegion"]);
        $provee->setCodPostal($_REQUEST["txtCodigoPostal"]);
        $provee->setPais($_REQUEST["txtPais"]);
        $provee->setTelefono($_REQUEST["txtTelefono"]);
        $provee->setFax($_REQUEST["txtFax"]);
        $provee->setPaginaPrincipal($_REQUEST["txtPaginaprincipal"]);
        
        $dao->modificar($provee);
        echo $dao->getTabla(); 
        
    }elseif(isset($_REQUEST["btnEliminar"])){
        $IdProveedor = $_REQUEST["txtCodigo"];
        $dao->eliminar($IdProveedor);
        echo $dao->getTabla();
    }elseif(isset($_REQUEST["btnBuscar"])){ 
        echo $dao->getFiltro($_REQUEST["txtBusqueda"]);
    }else{
         echo $dao->getTabla();
    }

    ?>
    
</body>
</html>