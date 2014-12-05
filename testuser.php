
<?php
require_once('usuario.php');
require("header.php");
$usu=new usuario();


//$new->create('Marco','Casarrubias','Roman',1);
//$new->update(1);
//$new->delete(8);

//$new->readuS(2);

require_once("footer.php");
echo"
<div>
<form name='alumno' action='testuser.php' method='Post'>
<center><table class=\"table table-striped\">
<tr><td>Nombres:</td><td><input type='text' name='nombre' required='true'></td></tr>
<tr><td>Apellido Paterno:</td><td><input type='text' name='ap' required='true'></td></tr>
<tr><td>Apellido Materno:</td><td><input type='text' name='am' required='true'></td></tr>
<tr><td>Nivel:</td><td>
<select name='nivel'>
<option value='1'>Administrador</option>
<option value='2'>Maestro</option>
<option value='3'>Alumno</option>
</select></td></tr>
<tr><td colspan='2'><input type='submit' name='submit' value='alta'></td></tr>
        <tr><td>Eliminar</td><td><input type='text' name='ide'><input type='submit' name='submit' value='delete'></td></tr>
        <tr><td>Actualizar</td><td><input type='text' name='up'><input type='submit' name='submit' value='up'></td></tr>
        <tr><td>Consultar</td><td><input type='text' name='sql'><input type='submit' name='submit' value='Busca'></td></tr>
         </table></center>
        </form>
</div>

";
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "alta":
            $usu->create($_POST['nombre'],$_POST['ap'],$_POST['am'],$_POST['nivel']);
            break;
        case "delete":
            $usu->delete($_POST['ide']);
            break;
        case "up":
            $usu->update($_POST['up'],$_POST['ap'],$_POST['am'],$_POST['nombre'],$_POST['nivel']);
            break;
        case "Busca":
            if($_POST['sql']==''){
                $usu->readuG();
            }else{
                $usu->readuS($_POST['sql']);
            }
            break;
    }
}
$usu->readuG();
require ('footer.php');
?>