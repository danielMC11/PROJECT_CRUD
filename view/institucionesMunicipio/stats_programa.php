<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    section,
    p {
        display: flex;
        justify-content: center;
    }
    </style>
</head>

<body>
    <?php
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";

$obj = new InstitucionesMunicipioController();

$rows_inst = $obj->instituciones();
$rows_dep = $obj->departamentos_por_instituciones();
$rows_mun = $obj->municipios_de_departamentos_por_instituciones();


if($_GET['cod_inst'] != null && $_GET['cod_depto'] != null && $_GET['cod_munic'] != null) {
$row = $obj->stats_p($_GET['cod_inst'],$_GET['cod_depto'],$_GET['cod_munic']);
$nomb_u_depto = $row['nombre_inst_dept'];
$munic = array($row['nomb_munic']);
$programas = array($row['programas_vigente']);
}elseif($_GET['cod_inst'] != null && $_GET['cod_depto'] != null && $_GET['cod_munic'] == null){

$rows_p = $obj->stats_p($_GET['cod_inst'],$_GET['cod_depto'],$_GET['cod_munic']);

$row_nom_sum = $obj->nombre_and_total($_GET['cod_inst'],$_GET['cod_depto']);
$nomb_u_depto = $row_nom_sum['nombre_inst_dept'];


foreach($rows_p as $data)
{
$munic[] = $data['nomb_munic'];
$programas[] = $data['programas_vigente'];
}

}
?>
    <link rel="stylesheet" type="text/css" href="/assest/css/stats_programa.css">
    <div class="modal">
        <div class="modal-container">
            <h2>Estadisticas por Programas</h2>
            <div class="container-sf">
                <form action="stats_programa.php" method="GET" autocomplete="on">

                    <label class="form-label">INSTITUCIONES</label>
                    <div class="custom_select">
                        <select name="cod_inst" id="cod_inst" required class="form-control">
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

                    <label class="form-label">DEPARTAMENTOS</label>
                    <div class="custom_select">
                        <select name="cod_depto" id="cod_depto" required class="form-control">
                            <option value=''>Seleccione Departamento</option>
                            <?php if ($rows_dep): ?>
                            <?php foreach ($rows_dep as $row_d): ?>
                            <option value='<?=$row_d['cod_depto']?>' data-inst="<?= $row_d["codigo_ies_padre"] ?>">
                                <?= $row_d['nomb_depto'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <label class="form-label">MUNICIPIOS</label>
                    <div class="custom_select">
                        <select name="cod_munic" id="cod_munic" class="form-control">
                            <option value=''>Seleccione Municipio</option>
                            <?php if ($rows_mun): ?>
                            <?php foreach ($rows_mun as $row_m): ?>
                            <option value='<?=$row_m['cod_munic']?>' data-depto='<?= $row_m["cod_depto"] ?>'
                                data_inst='<?= $row_m["cod_ies"] ?>'><?= $row_m['nomb_munic'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-progress">Submit</button>
                    <a class="btn btn-danger" href="stats_menu.php">CANCELAR</a>
                </form>



                <section>
                    <div style="width: 500px;" id="center">
                        <canvas id="myChart"></canvas>
                    </div>
                </section>
            </div>
        </div>


        <script>
        const data = {
            labels: <?php echo json_encode($munic) ?>,
            datasets: [{
                label: <?php echo json_encode($nomb_u_depto) ?>,
                data: <?php echo json_encode($programas) ?>,
                backgroundColor: [
                    '#1BEB9B',
                    '#17EB30',
                    '#A2EB0D',
                    '#68EB75',
                    '#07EB68'
                ],
                hoverOffset: 4
            }]
        };


        const config = {
            type: 'doughnut',
            data: data,
        };




        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        </script>


        <script>
        const codInstSelect = document.getElementById('cod_inst');
        const codDeptoSelect = document.getElementById('cod_depto');
        const departamentos = codDeptoSelect.querySelectorAll('option');



        function actualizar() {

            const selectedInst = codInstSelect.value;

            for (let i = 0; i < departamentos.length; i++) {
                const departamento = departamentos[i]
                const InstAsociada = departamento.getAttribute('data-inst');
                if (InstAsociada === selectedInst || selectedInst === '') {
                    departamento.style.display = 'block';

                } else {
                    departamento.style.display = 'none';
                }
            }


            const selectedDepto = codDeptoSelect.value;

            const codMunicSelect = document.getElementById('cod_munic');
            const municipios = codMunicSelect.querySelectorAll('option');


            for (let j = 0; j < municipios.length; j++) {
                const municipio = municipios[j];
                const deptoAsociado = municipio.getAttribute('data-depto');
                const InstAsociado = municipio.getAttribute('data_inst');


                if (deptoAsociado === selectedDepto && InstAsociado === selectedInst) {
                    municipio.style.display = 'block';
                } else {
                    municipio.style.display = 'none';
                }
            }





        }
        actualizar();
        codInstSelect.addEventListener('change', actualizar);
        codDeptoSelect.addEventListener('change', actualizar);
        </script>




</body>

</html>