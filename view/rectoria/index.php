<?php 
require_once "/proyecto_crud/view/head/head.php";
require_once "/proyecto_crud/controller/RectoriaController.php";

// Obtener el número de página actual
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// Establecer el número de filas a mostrar por página
$obj = new RectoriaController();
$rows = $obj->index();
$rowsPerPage = 16;
$totalRows = count($rows);
$totalPages = ceil($totalRows / $rowsPerPage);

$start = ($page - 1) * $rowsPerPage;
$end = $start + $rowsPerPage;
$rowsToShow = array_slice($rows, $start, $rowsPerPage);
?>
<div class="optionIndex">
    <div class="btn">
        <a href="consulta_dir.php" class="btn-consult"><i class="fa fa-filter"></i> FILTRADO</a>
    </div>
   <div class="btn">
        <a href="create.php" class="btn-consult"><i class="fa fa-plus-circle"></i> AGREGAR DIRECTIVO</a>
    </div>

</div>
<div class="concantenor">
    <table class="table" style="flex: 1;">
        <thead>
            <tr>
                <th scope="col">CODIGO INSTITUCION</th>
                <th scope="col">DIRECTIVO</th>
                <th scope="col">INSTITUCION</th>
                <th scope="col">CARGO</th>
                <th scope="col">MUNICIPIO</th>
                <th scope="col">DESDE</th>
                <th scope="col">HASTA</th>

                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php if ($rowsToShow): ?>
            <?php foreach ($rowsToShow as $row): ?>
            <tr>
                <th><?= $row['cod_inst'] ?></th>
                <th><?= $row['nomb_directivo'] ?></th>
                <th><?= $row['nomb_inst'] ?></th>
                <th><?= $row['nomb_cargo'] ?></th>
                <th><?= $row['nomb_munic'] ?></th>
                <th><?= $row['fecha_inicio'] ?></th>
                <th><?= $row['fecha_final'] ?></th>

                <th>

                    <?php
                
                    $cod_munic = $row['cod_munic'];
                    $cod_inst = $row['cod_inst'];
                    $cod_directivo = $row['di1'];
                    $cod_cargo = $row['cod_cargo'];
                    $data_url = sprintf("show.php?cod_munic=%s&cod_inst=%s&cod_directivo=%s&cod_cargo=%s", $cod_munic, $cod_inst, $cod_directivo, $cod_cargo);
?>
                    <a
                        href="show.php?cod_munic=<?= $row['cod_munic'] ?>&cod_inst=<?= $row['cod_inst'] ?>&cod_directivo=<?= $row['cod_directivo'] ?>&cod_cargo=<?= $row['cod_cargo'] ?>"><i
                            class="fa fa-eye"></i></a>

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
    <?php if ($totalPages > 1): ?>
    <div class="pagination">
        <?php if ($page > 1): ?>
        <a href="?page=<?= ($page - 1) ?>">Anterior</a>
        <?php endif; ?>
            <?php
        $startIndex = max(1, $page - 5);
        $endIndex = min($startIndex + 12, $totalPages);  
        ?>
        <?php for ($i = $startIndex; $i <= $endIndex; $i++): ?>
        <a href="?page=<?= $i ?>" <?= ($page == $i) ? 'class="active"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
        <a href="?page=<?= ($page + 1) ?>">Siguiente</a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>
<script>

</script>