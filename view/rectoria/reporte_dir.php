<?php
require_once "/proyecto_crud/view/head/head.php";
require_once "/proyecto_crud/controller/RectoriaController.php";
if(isset($_GET['codigo_ies_padre']) && isset($_GET['fecha_inicio'])&& isset($_GET['fecha_final'])) {
    $obj=new RectoriaController();
    $rows = $obj->reporte_dir($_GET['codigo_ies_padre'],$_GET['fecha_inicio'],$_GET['fecha_final']);
} else {
    echo "HUBO UN ERROR :(";
    exit;
}
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">NOMBRE DIRECTIVO</th>
            <th scope="col">NOMBRE INSTITUCION</th>
            <th scope="col">CARGO</th>
            <th scope="col">MUNICIPIO</th>
            <th scope="col">DESDE</th>
            <th scope="col">HASTA</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <th><?= $row['nomb_directivo'] ?></th>
                    <th><?= $row['nomb_inst'] ?></th>
                    <th><?= $row['nomb_cargo'] ?></th>
                    <th><?= $row['nomb_munic'] ?></th>
                    <th><?= $row['fecha_inicio'] ?></th>
                    <th><?= $row['fecha_final'] ?></th>
                    <th> 
                        <a href="show.php?cod_munic=<?= $row['cod_munic'] ?>&cod_inst=<?= $row['cod_inst'] ?>&cod_directivo=<?= $row['cod_directivo'] ?>&cod_cargo=<?= $row['cod_cargo'] ?>" class="btn btn-success"><i class="material-icons">visibility</i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="tex-center">NO HAY REGISTROS</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<div>
    <a class="btn btn-danger" href="index.php">FINALIZAR</a>
    <a class="btn btn-success" href="consulta_dir.php">REGRESAR</a>
</div>