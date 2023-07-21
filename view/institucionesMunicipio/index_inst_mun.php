<?php
require_once "/proyecto_crud/view/head/head.php";
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";

// Obtener el número de página actual
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// Establecer el número de filas a mostrar por página
$rowsPerPage = 16;

$obj = new InstitucionesMunicipioController();
$rows = $obj->index();

// Calcular el total de filas y páginas
$totalRows = count($rows);
$totalPages = ceil($totalRows / $rowsPerPage);

// Obtener las filas correspondientes a la página actual
$start = ($page - 1) * $rowsPerPage;
$end = $start + $rowsPerPage;
$rowsToShow = array_slice($rows, $start, $rowsPerPage);
?>
<div class="optionIndex">
    <div class="btn">
        <a href="create_inst_mun.php" class="btn-consult"><i class="fa fa-plus-circle"></i> AGREGAR INSTITUCION</a>
    </div>
    <div class="btn">
        <a href="consulta.php" class="btn-consult"><i class="fa fa-filter"></i> FILTRO POR DEPARTAMENTO</a>
    </div>
    <div class="btn">
        <a href="consulta_reporte_inst_mun.php" class="btn-consult"> <i class="fa fa-filter"></i> FILTRO POR ACTO
            ADMINISTRATIVO</a>
    </div>
</div>
<div style="display: flex;" class="tabla">
    <div style="flex: 1;">
        <table class="table" style="flex: 1;">
            <thead>
                <tr class="firts-child">
                    <th scope="col">IES</th>
                    <th scope="col">CODIGO INSTITUCION</th>
                    <th scope="col">NOMBRE INSTITUCION</th>
                    <th scope="col">SECTOR</th>
                    <th scope="col">CARACTER ACADEMICO</th>
                    <th scope="col">DEPARTAMENTO</th>
                    <th scope="col">MUNICIPIO</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">¿ACREDITADA?</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($rowsToShow): ?>
                <?php foreach ($rowsToShow as $row): ?>
                <tr>
                    <th><?= $row['codigo_ies_padre'] ?></th>
                    <th><?= $row['cod_inst'] ?></th>
                    <th><?= $row['nomb_inst'] ?></th>
                    <th><?= $row['nomb_sector'] ?></th>
                    <th><?= $row['nomb_academ'] ?></th>
                    <th><?= $row['nomb_depto'] ?></th>
                    <th><?= $row['nomb_munic'] ?></th>
                    <th><?= $row['nomb_estado'] ?></th>
                    <th><?= $row['acreditada'] ?></th>
                    <th>
                        <a href="show_inst_mun.php?cod_inst=<?= $row['cod_inst'] ?>&cod_munic=<?= $row['cod_munic'] ?>"
                            class="btn btn-success"><i class="fa fa-eye"></i></a>

                    </th>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4" class="tex-center">NO HAY REGISTROS</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
            <a href="?page=<?= ($page - 1) ?>"><-</a>
            <?php endif; ?>
            <?php
        $startIndex = max(1, $page - 5);
        $endIndex = min($startIndex + 12, $totalPages);  
        ?>
            <?php for ($i = $startIndex; $i <= $endIndex; $i++): ?>
            <a href="?page=<?= $i ?>" <?= ($page == $i) ? 'class="active"' : '' ?>><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
            <a href="?page=<?= ($page + 1) ?>">-></a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>


</div>
</div>

<!--icono de modificar -->