<?php
require_once "/proyecto_crud/controller/RectoriaController.php";
$obj = new RectoriaController();
$obj->insertar($_POST['cod_inst_cod_munic'], $_POST['nomb_directivo'], 
$_POST['apell_directivo'], $_POST['cod_cargo'],$_POST['fecha_inicio'],$_POST['fecha_final']);
?>