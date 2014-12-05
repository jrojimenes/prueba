<?php
/**
 * Created by PhpStorm.
 * User: ^_^
 * Date: 26/09/2014
 * Time: 06:47 PM
 */
require_once('Grupos.php');

$new=new Grupos();
 $id=$_REQUEST['idg'];

$new->exist($id);

?>