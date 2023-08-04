<?php
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";
$obj = new InstitucionesMunicipioController();
$obj->insertar(
$_POST['codigo_ies_padre'], 
$_POST['cod_munic'], 
$_POST['cod_estado'], 
$_POST['programas_vigente'],
$_POST['acreditada'], 
$_POST['fecha_acreditacion'], 
$_POST['resolucion_acreditacion'], 
$_POST['vigencia'],
$_POST['direccion'],
$_POST['telefono'],
$_POST['cod_juridica'],
$_POST['cod_seccional'],
$_POST['cod_admon'],
$_POST['cod_norma'],
$_POST['norma'],
$_POST['fecha_creacion'],
$_POST['nit'],
$_POST['pagina_web']);
?>