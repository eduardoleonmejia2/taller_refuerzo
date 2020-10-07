<?php

class BaseDatos {

    private $servidor="localhost";
    private $usuario="root";
    private $password="";

    //Configure aqui el nombre de la BD
    private $nombreBaseDatos="";
    
    private $conexion;

    function __construct(){}
    
    private function conectarConBaseDatos(){
    
        //Configuro la conexión:
        $this->conexion= mysqli_connect(
            $this->servidor, 
            $this->usuario,
            $this->password, 
            $this->nombreBaseDatos
        );
        
        //Valido el estado de la conexión
        if (!($this->conexion)) {
            die('Error de Conexión ('.mysqli_connect_errno().')'.mysqli_connect_error());
        } 
    }

    public function alterarBaseDatos($sentenciaSQL){ // borrar(DELETE), editar(PUT), crear(POST)
        $this->conectarConBaseDatos();
        $enlace=$this->conexion;
        $tablaBaseDatos=$enlace->query($sentenciaSQL);
        $enlace->close();
    }

    public function consultarEnBaseDatos($sentenciaSQL){ //consultar(GET)
        $this->conectarConBaseDatos();
        $enlace=$this->conexion;
        $tablaBaseDatos=$enlace->query($sentenciaSQL);
        $registrosBaseDatos = array();
        
        foreach($tablaBaseDatos as $registro){
            $registrosBaseDatos[]=$registro;  
        }

        return $registrosBaseDatos;
        $enlace->close();


    }

}


?>