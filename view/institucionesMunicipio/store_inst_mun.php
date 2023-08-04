<?php
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";
$obj = new InstitucionesMunicipioController();
$obj->insertar($_POST['codigo_ies_padre'], $_POST['cod_munic'], $_POST['telefono'], $_POST['cod_estado'],
$_POST['acreditada']);
?>