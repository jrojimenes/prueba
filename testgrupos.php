<?php
require_once("Grupos.php");

require('header.php');

require_once("footer.php");
/**
 * Created by PhpStorm.
 * User: Compaq
 * Date: 19/09/14
 * Time: 06:53 PM
 */
$grupo= new Grupos();
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "";
            $grup=$_POST['grup'];
            $alum=$_POST['chec$y'];
            $orden=$_POST['ord'];
            $estatus=$_POST['est'];
            $gru->creategrupo($nombre,$avatar,$orden,$estatus);
            break;
        case "Asignar";
            $fol=$_REQUEST['fol'];
            $grup=$_REQUEST['grup'];
                 for($y=0;$y<$fol;$y++){
                     if(isset($_REQUEST['chec'.$y])){
                         $ida=$_REQUEST['chec'.$y];
                         $grupo->asignagrupoalumno($ida,$grup);
                     }
                 }

            break;
        case "Delete";


            break;
    }

}


echo"
<form action='testgrupos.php' method='post'>
<center>
<select name='grup' id='grupo'>";
$e=mysql_query("select * from grupos where estatus='activo'");
$fe=mysql_num_rows($e);
for($y=0;$y<$fe;$y++){
    $idg=mysql_result($e,$y,'idg');
    $nom=mysql_result($e,$y,'nombre');
echo"<option value='$idg'>$nom</option>";
}
echo"</select>
</center><br><br>
";
$w=mysql_query("SELECT * FROM usuario WHERE nivel=3 and NOT EXISTS (SELECT * FROM asigrup  WHERE asigrup.idusuario= usuario.idusuario )") or die (mysql_error());
$fol=mysql_num_rows($w);
echo"
        <table class=\"table table-striped\">
        <tr><td>Matricula</td><td>Nombre</td><td>Apellido paterno</td><td>Apellido materno</td><td>Seleccionar</td></tr>";
for($y=0;$y<$fol;$y++){
    $mat=mysql_result($w,$y,'idusuario');
    $nom=mysql_result($w,$y,'nombre');
    $ap=mysql_result($w,$y,'apellido_paterno');
    $am=mysql_result($w,$y,'apellido_materno');
    echo"<tr><td>$mat</td><td>$nom</td><td>$ap</td><td>$am</td><td><input type='checkbox' name='chec$y' value='$mat'></td></tr>";
}
echo"<input type='hidden' value='$fol' name='fol'>";
//$grupo->asignagrupoalumno();
//$grupo->creategrupo();
//$grupo->updategrupo();

echo"
</table><center><input type='submit' value='Asignar' name='submit'></center>
</form>


<div id='result'></div>";
echo"<div  id='delet' style='display: none'></div>";
require_once("footer.php");
?>
<script type="text/javascript">
    $(function () {

        $('#grupo').click(function()
        {
            $('#result').load('result_comboG.php?idg=' + this.options[this.selectedIndex].value)

        });
    });
</script>