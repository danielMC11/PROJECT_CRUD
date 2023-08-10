<?php
require_once "/proyecto_crud/controller/RectoriaController.php";
$obj = new RectoriaController();
$obj->update($_POST['fecha_inicio'], $_POST['fecha_final'],$_POST['cod_cargo'], $_POST['cod_nombram'], $_GET['cod_directivo'], $_GET['cod_inst'],
$_GET['cod_munic'], $_GET['id_cargo']);
?>

