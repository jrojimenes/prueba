<?php
require_once("db.php");
/**
 * Created by PhpStorm.
 * User: Compaq
 * Date: 25/09/14
 * Time: 07:19 PM
 */
$u=$_REQUEST['idu'];
$sq1=mysql_query("SELECT a.idusuario, a.nombre AS maestro,b.nombre AS materia, c.idusuario, c.idm FROM usuario AS a, materias AS b, vinculamateria AS c WHERE c.idusuario='$u' AND a.idusuario=c.idusuario") or die (mysql_error());
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
echo"</select>";