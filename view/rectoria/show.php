<?php

require_once "/proyecto_crud/controller/RectoriaController.php";
$obj = new RectoriaController();
$data = $obj->show($_GET['cod_munic'], $_GET['cod_inst'], $_GET['cod_directivo'], $_GET['cod_cargo']);
?>

<link rel="stylesheet" type="text/css" href="/assest/css/show.css">

<div class="modal">
    <div class="modal-container">
        <h1><?=$data['nomb_directivo']?></h1>
        <h2 class="text-center">DETALLES DEL DIRECTIVO</h2>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="primeraColumna">CODIGO INSTITUCION</th>
                        <td scope="col" class="primeraColumnaT"><?= $data['cod_inst'] ?></td>
                    </tr>
                    <tr>
                        <th scope="col">INSTITUCION</th>
                        <td scope="col"><?= $data['nomb_inst'] ?></td>
                    </tr>
                    <tr>
                        <th scope="col">CARGO</th>
                        <td scope="col"><?= $data['nomb_cargo'] ?></td>
                    </tr>
                    <tr>
                        <th scope="col">MUNICIPIO</th>
                        <td scope="col"><?= $data['nomb_munic'] ?></td>
                    </tr>
                    <tr>
                        <th scope="col">FECHA INICIO</th>
                        <td scope="col"><?= $data['fecha_inicio'] ?></td>
                    </tr>
                    <tr>
                        <th scope="col">FECHA FINAL</th>
                        <td scope="col"><?= $data['fecha_final'] ?></td>
                    </tr>
                    <tr>
                        <th scope="col" class="ultimaColumna">ACTO NOMBRAMIENTO</th>
                        <td scope="col" class="ultimaColumnaTD"><?= $data['nomb_nombram'] ?></td>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="pb-3">
            <a href="index.php" class="btn btn-primary">REGRESAR</a>
            <a href="edit.php?cod_munic=<?= $data['cod_munic'] ?>&cod_inst=<?= $data['cod_inst'] ?>&cod_directivo=<?= $data['cod_directivo'] ?>&cod_cargo=<?= $data['cod_cargo'] ?>" class="btn btn-success">MODIFICAR</a>
        </div>
    </div>
</div>
