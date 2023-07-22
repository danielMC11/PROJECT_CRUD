<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="/assest/css/stats_departamento.css">
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

$rows_dep = $obj->departamentos();

if(isset($_GET['cod_depto'])) {

$rows = $obj->stats_departamentos($_GET['cod_depto']);
$row = $obj->stats_departamento_nombre_y_total($_GET['cod_depto']);
$nomb_depto = $row['nomb_depto'];
$total = $row['total'];
foreach($rows as $data)
{
$municipios[] = $data['nomb_munic'];
$cantidades[] = $data['cantidad'];
}

array_push($municipios, 'Total');
array_push($cantidades, $total);

} 

?>
    
    <div class="modal">
        <div class="modal-container">
            <h2>Estadisticas por Departamentos</h2>
            <div class="container-sf">
                <form action="stats_departamento.php" method="GET" autocomplete="on">

                    <label class="form-label">DEPARTAMENTOS</label>
                    <div class="mb-3">
                        <select name="cod_depto" required class="form-control">
                            <option value=''>Seleccione Departamento</option>
                            <?php if ($rows_dep): ?>
                            <?php foreach ($rows_dep as $row_d): ?>
                            <option value='<?=$row_d['cod_depto']?>'><?= $row_d['nomb_depto'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href="stats_menu.php">CANCELAR</a>
                </form>
                <section>
                    <div style="width: 1000px;" id="center">
                        <canvas id="myChart"></canvas>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
    // === include 'setup' then 'config' above ===
    const labels = <?php echo json_encode($municipios) ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: <?php echo json_encode($nomb_depto) ?>,
            data: <?php echo json_encode($cantidades) ?>,
            backgroundColor: [
                '#7DE9C3',
                '#36E356',
                '#36633E',
                '#2AB043',
                '#7DE891'
            ],
            borderColor: [
                '#7DE9C3',
                '#36E356',
                '#36633E',
                '#2AB043',
                '#7DE891'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    </script>

</body>

</html>