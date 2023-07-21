<?php
require_once "/proyecto_crud/view/head/head.php";
require_once "/proyecto_crud/controller/RectoriaController.php";

$obj = new RectoriaController();
$rows = $obj->logs_rectoria();

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">NOMBRE DIRECTIVO</th>
            <th scope="col">NOMBRE INSTITUCION</th>
            <th scope="col">CARGO</th>
            <th scope="col">MUNICIPIO</th>
            <th scope="col">FECHA INICIO</th>
            <th scope="col">FECHA FINAL</th>
            <th scope="col">OPERACION</th>
            <th scope="col">MARCA DE TIEMPO</th>
            <th scope="col">USUARIO</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <th><?= $row['nomb_directivo_completo'] ?></th>
                    <th><?= $row['nomb_inst'] ?></th>
                    <th><?= $row['nomb_cargo'] ?></th>
                    <th><?= $row['nomb_munic'] ?></th>
                    <th><?= $row['fecha_inicio'] ?></th>
                    <th><?= $row['fecha_final'] ?></th>
                    <th><?= $row['operacion'] ?></th>
                    <th><?= $row['changed_on'] ?></th>
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