<?php
require_once("Materia.php");
require('header.php');
$mate = new Materia();
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Alta";
            $nombre=$_POST['nombre'];
            $new->createmateria($nombre);
            break;
        case "Modificar";


            break;
        case "Delete";


            break;
    }

}
/**
 * Created by PhpStorm.
 * User: Compaq
 * Date: 19/09/14
 * Time: 06:52 PM
 */
//$materia= new Materia();
//$materia->createmateria();
//$materia->deletemateria();
//$materia->updatemateria();


echo"
<form action='crearmaterias.php' method='Post' name='materia'>";
$mate->readgeneral();
echo"<br><br><center><table>
<tr><td colspan='4'></td></tr>
<tr><td>Nombre</td><td><input type='text' name='nombre'></td><td align='center'><input type='submit' name='submit' value='Alta'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
</table></center>
<br><br><br><br>
</form>
";

require('footer.php');