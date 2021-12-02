<?php

require_once "conexion/conexion.php";
require_once "respuestas.class.php";

class pacientes extends conexion {

    private $table = "pacientes";

    public function listaPacientes($pagina = 1){
        $inicio = 0;
        $cantidad = 100;
        // $cantidad = 50;
        if ($pagina > 1) {
            $inicio = (($cantidad) * ($pagina - 1)) + 1;
            $cantidad =  $cantidad * $pagina;
        }
        $query = "SELECT PacienteId,Nombre,DNI,Telefono,Correo FROM ". $this->table. " limit $inicio, $cantidad";
        $datos = parent::obtenerDatos($query);

        return($datos);
    }

    public function obtenerPaciente($id){
        $query = "SELECT * FROM " . $this->table . " WHERE PacienteId = '$id'";
        return parent::obtenerDatos($query);
    }
}

?>