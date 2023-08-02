<?php
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";
$obj = new InstitucionesMunicipioController();
$obj->insertar_inst($_POST['nomb_inst'], $_POST['cod_sector'], $_POST['cod_academ']);
?>