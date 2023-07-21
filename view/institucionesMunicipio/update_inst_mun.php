<?php
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";
$obj = new InstitucionesMunicipioController();
$obj->update($_POST['cod_inst'], $_GET['cod_munic'], $_POST['telefono'],$_POST['direccion'],
$_POST['cod_estado'],$_POST['programas_vigente'],$_POST['acreditada'],$_POST['fecha_acreditacion'],
$_POST['vigencia'],$_POST['resolucion_acreditacion'],$_POST['cod_juridica'],$_POST['cod_seccional']);
?>