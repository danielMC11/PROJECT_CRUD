<?php
require_once "/proyecto_crud/controller/RectoriaController.php";
$obj = new RectoriaController();


$rows_inst = $obj->instituciones();
?>

<link rel="stylesheet" type="text/css" href="/assest/css/consulta_dir.css">
<div class="modal">
    <divc class="modal-container">
        <h2>Consultar Directivos</h2>
        <form action="reporte_dir.php" method="GET" autocomplete="off">
            <div class="mb-3">
            <label class="form-label">INSTITUCION</label>
            <div class="custom_select">
            <select name="codigo_ies_padre" id="cod_inst" required class="form-control">
                            <option value=''>Seleccione Institucion</option>
                            <?php if ($rows_inst): ?>
                            <?php foreach ($rows_inst as $row_i): ?>

                            <option value='<?=$row_i['codigo_ies_padre']?>'><?= $row_i['nomb_inst'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
            </select>
            </div>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                <input type="date" name="fecha_inicio" required class="form-control" id="fecha_inicio">
            </div>
            <div class="mb-3">
                <label for="fecha_final" class="form-label">Fecha final</label>
                <input type="date" name="fecha_final" required class="form-control" style="left:42px" id="fecha_final">
            </div>

            <button type="submit" class="btn btn-primary">ACEPTAR</button>
            <a class="btn btn-danger" href="index.php">CANCELAR</a>
        </form>
</div>
</div>