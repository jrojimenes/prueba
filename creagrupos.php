<?php
include('Grupos.php');
/**
 * Created by PhpStorm.
 * User: Compaq
 * Date: 26/09/14
 * Time: 07:07 PM
 */
$gru = new Grupos();

if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Alta";
            $nombre=$_POST['nombre'];
            $avatar=$_POST['av'];
            $orden=$_POST['ord'];
            $estatus=$_POST['est'];
            $gru->creategrupo($nombre,$avatar,$orden,$estatus);
            break;
        case "Modificar";


            break;
        case "Delete";


            break;
    }

}
include("header.php");
echo"<form action='creagrupos.php' method='Post' name='materia'>
<center><table class=\"table table-striped\">
<tr><td colspan='4' align='center'><strong><p>Crear Grupos</p></strong></td></tr>
<tr><td colspan='2' align='rigth'>Nombre</td><td colspan='2'><input type='text' name='nombre'></td></tr>
<tr><td colspan='2' align='rigth'>Avatar</td><td colspan='2'><input type='text' name='av'></td></tr>
<tr><td colspan='2' align='rigth'>Orden</td><td colspan='2'><input type='text' name='ord'></td></tr>
<tr><td colspan='2' align='rigth'>Estatus</td><td colspan='2'>
<input type='radio' value='activo' name='est' checked>Activo<input type='radio' name='est' value='inactivo'>Inactivo
</td></tr>
<tr><td colspan='3' align='center'><input type='submit' name='submit' value='Alta'></td></tr>
</table></center></form>
";

$gru->readgeneral();
include("footer.php");