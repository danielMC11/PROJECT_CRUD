<?php
require_once "/proyecto_crud/controller/RectoriaController.php";
$obj = new RectoriaController();
$obj->insertar($_POST['cod_directivo'], $_POST['nomb_directivo'], $_POST['apell_directivo'], $_POST['cod_inst'],
$_POST['cod_munic'], $_POST['cod_cargo'],$_POST['fecha_inicio'],$_POST['fecha_final']);
?>