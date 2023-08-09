<?php 
require_once "/proyecto_crud/view/head/head.php";
require_once "/proyecto_crud/controller/RectoriaController.php";

$obj = new RectoriaController();
$rows_inst = $obj->instituciones();

?>

<link rel="stylesheet" type="text/css" href="/assest/css/agregarDir.css">

<div class="modal">
    <div class="modal-container">
        <h2>Agregar un nuevo Directivo</h2>
    <form action="store.php" method="POST" autocomplete="off">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CODIGO DIRECTIVO</label>
            <input type="text" name="cod_directivo" required class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NOMBRE DIRECTIVO</label>
            <input type="text" name="nomb_directivo" required class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">APELLIDO DIRECTIVO</label>
            <input type="text" name="apell_directivo" required class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CODIGO INSTITUCION</label>
            <input type="text" name="cod_inst" required class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CODIGO MUNICIPIO</label>
            <input type="text" name="cod_munic" required class="form-control" id="cod_munic"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CARGO</label>
            <div class="custom_select">
            <select name="cod_cargo" required class="form-control" id="cod_cargo">
                <option value="">Seleccione</option>
                <option value="car1">Rep. Legal Suplente</option>
                <option value="car2">Director</option>
                <option value="car3">Primer Rep. Legal Suplente</option>
                <option value="car4">Rector Encargado</option>
                <option value="car5">Rector Suplente</option>
                <option value="car6">Rector</option>
                <option value="car7">Segundo Rep. Legal Suplente</option>
                <option value="car8">Primer Rector Suplente</option>
                <option value="car9">Rep. Legal</option>
                <option value="car10">Rector General</option>
                <option value="car11">Primer Suplente Del Rector</option>
                <option value="car12">Rep. Legal Encargado</option>
                <option value="car13">Segundo Rector Suplente</option>
                <option value="car14">Segundo Suplente Del Rector</option>
                <option value="car15">Tercer Rep. Legal Suplente</option>

            </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">FECHA INICIO</label>
            <input type="date" name="fecha_inicio" required class="form-control" id="fecha_inicio"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">FECHA FINAL</label>
            <input type="date" name="fecha_final" required class="form-control" id="fecha_final"
                aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">ACEPTAR</button>
        <a class="btn btn-danger" href="/view/rectoria/index.php">CANCELAR</a>
    </form>
</div>
</div>