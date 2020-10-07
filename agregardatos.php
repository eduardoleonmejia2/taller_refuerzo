<?php

include("basedatos.php");

if(isset($_POST["botonenviar"])){
    $cedula=$_POST["cedula"];
    $nombre=$_POST["nombre"];
    $apellidos=$_POST["apellidos"];
    $edad=$_POST["edad"];
    $telefono=$_POST["telefono"];
    $direccion=$_POST["direccion"];
    $operacion= new basedatos();
    $consulta="INSERT INTO usuarios(cedula, nombre, apellidos, edad, telefono, direccion) 
    VALUES ('$cedula','$nombre','$apellidos','$edad','$telefono','$direccion')";

    $operacion-> alterarBaseDatos($consulta);

}

?>