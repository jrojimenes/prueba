<?php
include_once('conexion.php');
/**
 * Created by PhpStorm.
 * User: Compaq
 * Date: 19/09/14
 * Time: 06:50 PM
 */

class Grupos {
    public $id;
    public $nombre;
    public $avatar;
    public $orden;
    public $estatus;

    public function asignagrupoalumno($ida,$idg){
     $in=mysql_query("insert into asigrup (idg,idusuario) values ($idg,$ida)") or die (mysql_error());
    }

    public function creategrupo($nombre,$avatar,$orden,$estatus){
        $in=mysql_query("insert into grupos (nombre,avatar,orden,estatus) values ('$nombre','$avatar','$orden','$estatus')") or die (mysql_error());
    }
    public function updategrupo(){
        echo"update";


    }
    public function delete_alum_group($idg){

        $delete=mysql_query("delete from asigrup where idas='$idg'");

    }
    public function readgeneral(){
        $sq=mysql_query("Select * from grupos where estatus='activo'");
        $fil=mysql_num_rows($sq);
        if($fil==0){
            echo"<center><h1>No se encontraton registros</h1></center>";
        }
        else{
          echo"
          <table class=\"table table-striped\">
          <tr><td>Matricula</td><td>Nombre</td><td>Estatus</td></tr>";
          for($y=0;$y<$fil;$y++){
           $idg=mysql_result($sq,$y,'idg');
              $nombre=mysql_result($sq,$y,'nombre');
              $estatus=mysql_result($sq,$y,'estatus');
           echo"<tr><td>$idg</td><td>$nombre</td><td>$estatus</td></tr>";
          }
          echo"</table>
          ";
        }

    }
    public function exist($id){
        echo"<table class=\"table table-striped\">";
        echo"<tr><td>Nombre</td><td>Eliminar</td></tr>";
        $yes=mysql_query("select * from asigrup where idg=$id ")or die (mysql_error());
        while($rows=mysql_fetch_array($yes)){
            $this->id=$rows['idas'];
            $this->idusuario=$rows['idusuario'];
            $this->idgrupo=$rows['idg'];

            $idu=$this->idusuario;
            $id=$this->id;
            $name=mysql_result(mysql_query("select nombre from usuario where idusuario=$idu "),0,'nombre');

            echo"<tr><td>$name</td><td><a class='delete'  name='submit' id='delete$id'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            echo"<script type='text/javascript'>
                $(function () {
                  $('#delete$id').click(function()
                  {
                  var a= document.getElementById('delete$id')+$id;
                  var url='deletealumno.php?id='+a;
                    $('#delet').load(url);
                          });
                              });
                  </script>";
        }
        echo"</table>";
    }

} 