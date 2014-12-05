<script src="jquery.min.js"></script>
<?php
require_once("Materia.php");
require('header.php');
$materia=new Materia();

if(isset($_REQUEST['maestro'])){
    $idu = $_REQUEST['maestro'];
}else{
    $idu = 0;
}
if(isset($_REQUEST['accion'])){
    $accion = $_REQUEST['accion'];
}else{
    $accion = 0;
}
if(isset($_REQUEST['materia'])){
    $id_materia = $_REQUEST['materia'];
}else{
    $id_materia = 0;
}
switch($accion){
    case 0:
        $materia->seleccionaMaestro($idu);
        break;
    case 1:
        $materia->vinculamaestromateria($idu,$id_materia);
        $materia->seleccionaMaestro($idu);
        break;
    case 2:
        $materia->deleteMaestroMateria($idu,$id_materia);
        $materia->seleccionaMaestro($idu);
        break;
}

 require('footer.php');