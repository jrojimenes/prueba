<?php
/**
 * Created by PhpStorm.
 * User: MAQ23-LAB2-TIC
 * Date: 12/09/14
 * Time: 06:04 PM
 */
include_once('conexion.php');
require("header.php");
class usuario {

    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $telefono;
    private $calle;
    private $numero_externo;
    private $numero_interior;
    private $colonia;
    private $municipio;
    private $estado;
    private $CP;
    private $correo;
    private $usuario;
    private $contrasena;
    private $nivel;
    private $status;

    public function create($nombre,$ap,$am,$niv){
        $inser1="Insert into usuario (nombre,apellido_paterno,apellido_materno,nivel,status) values ('$nombre','$ap','$am',$niv,'active')";
        $execute1=mysql_query($inser1) or die (mysql_error());
    }

    public function readuG(){
        $sql=mysql_query("select * from usuario where status='active' order by idusuario asc ") or die (mysql_error());
       echo"<div class=table-responsive>";
       echo"<center><table class='table table-striped'>";
        echo"<tr><td>Identificador</td><td>Nombre</td><td>Apellido paterno</td><td>Apellido materno</td><td>Nivel</td></tr>";
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['idusuario'];
            $this->nombre=$field['nombre'];
            $this->apellido_paterno=$field['apellido_paterno'];
            $this->apellido_materno=$field['apellido_materno'];
            $this->nivel=$field['nivel'];
            switch($this->nivel){
                case 1;
                    $type="Administrador";
                    break;
                case 2;
                    $type="Maestro";
                    break;
                case 3;
                    $type="Alumno";
                    break;
            }

            echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellido_paterno</td><td>$this->apellido_materno</td><td>$type</td></tr>";
        }
            echo"</table></center></div>";
        }

    public function readuS($id){
        $sql=mysql_query("select * from usuario where status='active' and idusuario='$id' order by idusuario asc ") or die (mysql_error());
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['idusuario'];
            $this->nombre=$field['nombre'];
            $this->apellido_paterno=$field['apellido_paterno'];
            $this->apellido_materno=$field['apellido_materno'];
            echo"<br> id:".$this->id;
            echo"<br> name:".$this->nombre;
            echo"<br> Apaterno:".$this->apellido_paterno;
            echo"<br> Amaterno:".$this->apellido_materno
            ;
    }
    }

    public function delete($id){
       $sql3=mysql_query("Delete from usuario where idusuario=$id");
    }


    public function update($id,$ap,$am,$nombre,$nivel){
    $up=mysql_query("Update usuario set nombre='$nombre', apellido_paterno='$ap',apellido_materno='$am',nivel='$nivel' where idusuario='$id'");
    }
}
require ('footer.php');
?>
