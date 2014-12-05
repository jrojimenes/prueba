<?php
require_once("Materia.php");
$new=new Materia();
/**
 * Created by PhpStorm.
 * User: Compaq
 * Date: 25/09/14
 * Time: 12:38 PM
 */
echo"<form action='Asignamateria.php' method='Post' name='asigna'>
<br><br><br><br><center><table>
<tr><td colspan='2'>Maestros</td><td colspan='2'>Materias</td></tr>
<tr>
<td colspan='2'>
<select name='idu'>";
$sq=mysql_query("Select * from usuario where nivel='2'order by idusuario") or die (mysql_error());
$field=mysql_num_rows($sq);
for($y=0; $y<$field;$y++){
   $idu=mysql_result($sq,$y,'idusuario');
   $nombre=mysql_result($sq,$y,'nombre');

    echo"<option value='$idu'>$nombre</option>";
}
echo"</select>
</td>
<td colspan='2'>
<div id='mat' name='idm'></div>
<select name='idm'>";
$u=$idu;
$sq1=mysql_query("select * from vi") or die (mysql_error());
$f=mysql_num_rows($sq1);
if($f==0){
    $sq2=mysql_query("Select * from materias where estatus='activo'");
}
else{
$idm=mysql_result($sq,$y,'idm');
$sq2=mysql_query("Select * from materias where idm!='$idm'");
}
    $field=mysql_num_rows($sq2);
for($y=0; $y<$field;$y++){
    $idm=mysql_result($sq2,$y,'idm');
    $nombre=mysql_result($sq2,$y,'nombre');
    echo"<option value='$idm'>$nombre</option>";

}
echo"</select></td>
</tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td colspan='4'></td></tr>
<tr><td align='right' colspan='2'><input type='submit' value='Vincular' name='submit'></td></tr>
</table></center>
<div align='center'>


</div>
</form>
";
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Vincular";
            $idusuario=$_POST['idu'];
            $idmateria=$_POST['idm'];
            $new->asignarmateriamaestro($idusuario,$idmateria);
            break;
        case "Modificar";


            break;
        case "Delete";


            break;
    }

}
