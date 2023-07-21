<?php
require_once "/proyecto_crud/view/head/head.php";
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";
if(isset($_GET['cod_admon'])) {
    $obj=new InstitucionesMunicipioController();
    $rows = $obj->reporte($_GET['cod_admon']);
} else {
    echo "HUBO UN ERROR :(";
    exit;
}
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">CODIGO INSTITUCION</th>
            <th scope="col">NOMBRE INSTITUCION</th>
            <th scope="col">ACTO ADMINISTRATIVO</th>
            <th scope="col">MUNICIPIO</th>
            <th scope="col">DEPARTAMENTO</th>
            <th scope="col">SECTOR</th>
            <th scope="col">ESTADO</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <th><?= $row['cod_inst'] ?></th>
                    <th><?= $row['nomb_inst'] ?></th>
                    <th><?= $row['nomb_admon'] ?></th>
                    <th><?= $row['nomb_munic'] ?></th>
                    <th><?= $row['nomb_depto'] ?></th>
                    <th><?= $row['nomb_sector'] ?></th>
                    <th><?= $row['nomb_estado'] ?></th>
                    <th> 
                        <a href="show_inst_mun.php?cod_inst=<?= $row['cod_inst'] ?>&cod_munic=<?= $row['cod_munic'] ?>" class="btn btn-success"><i class="material-icons">visibility</i></a>
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
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">