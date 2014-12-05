<meta charset="utf-8">
<script src="jquery.min.js"></script>
<?php
include_once('conexion.php');
    require ('Materia.php');
    require ('header.php');
    $materia = new Materia();
    $id_maestro = $_POST['idu'];
    $sql04 = "SELECT * FROM usuario WHERE idusuario = $id_maestro";
    $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
    $existe = mysql_num_rows($result04);
    if ($existe > 0) {
        $nombre = $id_maestro;
        $nombre .= mysql_result($result04, 0, 'nombre');
        $nombre .= " " . mysql_result($result04, 0, 'apellido_paterno');
        $nombre .= " " . mysql_result($result04, 0, 'apellido_materno');
        $nombre = ($nombre);
        echo "<br>Maestro: <strong>".$nombre."</strong>";
    }

    echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped\">";
        echo "<tr><td colspan=2 align=center><strong>Materias Asignadas</strong></td></tr>";
        $sql01 = "SELECT * FROM vinculamateria WHERE idusuario = $id_maestro";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id = $field['idm'];
                $sql04 = "SELECT * FROM materias WHERE idm = $id";
                $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
                $nombre =(mysql_result($result04,0,'nombre'));
            echo "<tr><td>$nombre</td><td><a href=testmateria.php?accion=2&maestro=$id_maestro&materia=$id>Eliminar</a></td></tr>";
        }
        echo "</table>";
    echo "</div>";


    $materia->asignarmateriamaestro($id_maestro);

    require ('footer.php');
?>



