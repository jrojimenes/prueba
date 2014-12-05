<?php
include_once('conexion.php');
include_once('Grupos.php');
/**
 * Created by PhpStorm.
 * User: ^_^
 * Date: 02/10/2014
 * Time: 01:04 AM
 */
$new=new Grupos();
$idg=$_REQUEST['id'];
$new->delete_alum_group($idg);
print"<meta http-equiv='refresh' content='0; url=testgrupos.php?'>";
?>