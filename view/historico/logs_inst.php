<?php
require_once "/proyecto_crud/view/head/head.php";
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";

$obj = new InstitucionesMunicipioController();
$rows = $obj->logs_instituciones();

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">CÓDIGO INSTITUCION</th>
            <th scope="col">NOMBRE INSTITUCION</th>
            <th scope="col">OPERACION</th>
            <th scope="col">MARCA DE TIEMPO</th>
            <th scope="col">USUARIO</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <th><?= $row['cod_inst'] ?></th>
                    <th><?= $row['nomb_inst'] ?></th>
                    <th><?= $row['operacion'] ?></th>
                    <th><?= $row['marca_de_tiempo'] ?></th>
                    <th><?= $row['user_id'] ?></th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="tex-center">NO HAY REGISTROS</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>