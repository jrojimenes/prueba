
<?php
include_once('conexion.php');
/**
 * Created by PhpStorm.
 * User: Compaq
 * Date: 19/09/14
 * Time: 06:41 PM
 */

class Materia{
    public $id;
    public $nombre;
    public $avatar;
    public $orden;
    public $estatus;


    public function createmateria($nombre){
        $sql=mysql_query("Insert into materias (nombre,estatus) values ('$nombre','activo')");
    }
    public function updatemateria($nombre,$idm){
        $sql1=mysql_query("Update materia set nombre='$nombre' where idm='$idm' ");
    }
    public function deleteMaestroMateria($idmaestro,$idmateria){
        if ($idmateria > 0){
            $delete01 = "DELETE FROM vinculamateria WHERE idusuario = $idmaestro AND idm = $idmateria";
            $delete01 = mysql_query($delete01) or die("Error  $delete01");
        }

    }
    public function readgeneral(){
           $sql3=mysql_query("Select * from materias where estatus='activo'");
           echo"<br><br><br><center><table class=\"table table-striped\">
      <tr><td>Matricula</td><td>Nombre</td><td>Estatus</td></tr>";
      while($field= mysql_fetch_array($sql3)){
            $this->idm=$field['idm'];
            $this->nombre=$field['nombre'];
            $this->status=$field['estatus'];
      echo"
      <tr><td>$this->idm</td><td>$this->nombre</td><td>$this->status</td></tr>";
      }
       echo"</table></center>";
    }
    public function readespecifico(){
        echo"readespe";


    }

    public function asignarmateriamaestro($idmaestro){
        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped\">";
        echo "<form action=testmateria.php method=POST id=materias>";
        echo "<tr><td colspan=2 align=center><strong>Vincular materias</strong></td></tr>";
        echo "<tr><td>Materia: </td><td><select id=materia name=materia>";
        $sql01 = "SELECT * FROM materias WHERE estatus = 'activo' ORDER BY nombre ASC";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $idmateria = $field['idm'];
            $opcion =($field['nombre']);

            $sql03="SELECT * FROM vinculamateria WHERE idusuario = $idmaestro AND idm = $idmateria";
            $result03 = mysql_query($sql03)or die("No se ejecuta consulta $sql03");
            $existe = mysql_num_rows($result03);
            if($existe > 0){
                echo "<option value=0></option>";
            }else{
                echo "<option value=$idmateria>$opcion</option>";
            }
        }
        echo "</select></td></tr>";
        //echo "<a href=\"javascript: enviar()\">Search</a>";
        echo "<input type=hidden id=accion name=accion value=1>";
        echo "<input type=hidden id=maestro name=maestro value=$idmaestro>";
        echo "<tr><td colspan=2 align=center><input type=submit value=Asignar></td></tr>"; // onclick=window.location.href='TestMateria.php?accion=1&maestro=$id_maestro'

        echo "</form>";
        echo "</table>";
        echo "</div>";
    }

    public function seleccionaMaestro($idmaestro){
        echo "<div class=table-responsive>";
        echo "<form action=contro.php method=Post name=maestro id=maestro target='_self'>";
        echo "<div></div><table class=\"table table-striped\">";
        echo "<tr><td>Maestro: </td><td><select name=idu>";
        if($idmaestro==0){
        $sql02 = "SELECT * FROM usuario WHERE nivel = 2 AND status = 'active' ORDER BY nombre ASC";
        $result02 = mysql_query($sql02)or die("Error $sql02");
        while($field = mysql_fetch_array($result02)){
            $id_maestro = ($field['idusuario']);
            $opcion = ($field['idusuario'].$field['nombre']." ".$field['apellido_paterno']." ".$field['apellido_materno']);

                echo "<option value=$id_maestro>$opcion</option>";
        }
        }else{
            $sql02 = "SELECT * FROM usuario WHERE nivel = 2 AND idusuario = '$idmaestro' ORDER BY nombre ASC";
            $result02 = mysql_query($sql02)or die("Error $sql02");
            while($field = mysql_fetch_array($result02)){
                $id_maestro = ($field['idusuario']);
                $opcion = ($field['idusuario'].$field['nombre']." ".$field['apellido_paterno']." ".$field['apellido_materno']);
                    echo "<option value=$id_maestro>$opcion</option>";
            }

        }
        echo "</select></td></tr>";

        echo "<tr><td colspan=2 align=center><input type=submit id=submit value=Seleccionar></td></tr>";
        echo "</table>";


        //echo "<div id=mensaje>";
        //echo "</div>";

        echo "</form>";
        echo "</div>";
    }
    public function vinculamaestromateria($idu,$idm){
         if($idm==0){
             echo"La materia seleccionada no es valida";
         }else{
        $sr=mysql_query("Insert into vinculamateria (idusuario,idm) values($idu,$idm)");
         }

    }


    public function teacherstart($idu)
    {

        $usuario=mysql_query("select * from usuario where idusuario='$idu'");
        $name=mysql_result($usuario,0,'nombre');
        echo"<legend>Maestro $name</legend>";
        $asign = mysql_query(" select * from vinculamateria where idusuario='$idu' ");
        $exist = mysql_num_rows($asign);
        if ($exist == 0) {

            echo "Sin materias asignadas";
        } else {
            echo "<table class=\"table table-striped\" ><tr><td align='center'><h1>Materias</h1></td></tr>";
            for ($e = 0; $e < $exist; $e++) {
                $ida = mysql_result($asign, $e, 'idv');
                $idma = mysql_result($asign, $e, 'idm');

                $namema = mysql_result(mysql_query("select nombre from materias where idm=$idma"), 0, 'nombre');

                echo "<tr><td>$namema</td></tr>";


            }
            echo "</table>";

        }

    }








} 