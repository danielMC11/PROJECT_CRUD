<!-- Se modifico con respecto cuando no tiene acreditacion -->

<?php
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";
$obj = new InstitucionesMunicipioController();
$data = $obj->show($_GET['cod_inst'], $_GET['cod_munic']);

//se agrego if y else
if ($data['acreditada'] === 'N') {
    $mostrarAcreditacion = false;
} else {
    $mostrarAcreditacion = true;
}
?>
<link rel="stylesheet" type="text/css" href="/assest/css/showInst.css">
<div class="modal">
    <div class="modal-container">
        <h2 class="text-center">DETALLES DEL REGISTRO</h2>

        <table class="table container-fluid">
            <tbody>
                <tr>
                    <th class="primeraColumna" scocpe="row"> IES:</th>
                    <td class="primeraColumnaT"><?= $data['codigo_ies_padre'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">CODIGO INSTITUCION:</th>
                    <td><?= $data['cod_inst'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">INSTITUCION:</th>
                    <td><?= $data['nomb_inst'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">SECTOR:</th>
                    <td><?= $data['nomb_sector'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">CARACTER ACADEMICO:</th>
                    <td><?= $data['nomb_academ'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">DEPARTAMENTO:</th>
                    <td><?= $data['nomb_depto'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">MUNICIPIO:</th>
                    <td><?= $data['nomb_munic'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">ESTADO:</th>
                    <td><?= $data['nomb_estado'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">PROGRAMAS VIGENTES:</th>
                    <td><?= $data['programas_vigente'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">¿ACREDITADA?:</th>
                    <td><?= $data['acreditada'] ?></td>
                </tr>
                <!-- Se agrego el if y endif -->
                <?php if ($mostrarAcreditacion): ?>
                <tr>
                    <th scocpe="row">FECHA ACREDITACION:</th>
                    <td><?= $data['fecha_acreditacion'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">RESOLUCION ACREDITACION:</th>
                    <td><?= $data['resolucion_acreditacion'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">VIGENCIA ACREDITACION:</th>
                    <td><?= $data['vigencia'] ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <th scocpe="row">TELEFONO:</th>
                    <td><?= $data['telefono'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">DIRECCION:</th>
                    <td><?= $data['direccion'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">NATURALEZA JURIDICA:</th>
                    <td><?= $data['nomb_juridica'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">SECCIONAL:</th>
                    <td><?= $data['nomb_seccional'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">ACTO ADMINISTRATIVO:</th>
                    <td><?= $data['nomb_admon'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">NORMA:</th>
                    <td><?= $data['norma'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">NORMA CREACION:</th>
                    <td><?= $data['nomb_norma'] ?></td>
                </tr>

                <tr>
                    <th scocpe="row">FECHA CREACION:</th>
                    <td><?= $data['fecha_creacion'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row">NIT:</th>
                    <td><?= $data['nit'] ?></td>
                </tr>
                <tr>
                    <th scocpe="row" class="ultimaColumna">PAGINA WEB:</th>
                    <td class="ultimaColumnaTD"><?= $data['pagina_web'] ?></td>
                </tr>

            </tbody>
        </table>
        <div class="pb-3">
            <a href="index_inst_mun.php" class="btn btn-primary">REGRESAR</a>
            <a href="edit_inst_mun.php?cod_inst=<?= $data['cod_inst']?>&cod_munic=<?= $data['cod_munic'] ?>"
                class="btn btn-success">MODIFICAR</a>
        </div>
    </div>
</div>