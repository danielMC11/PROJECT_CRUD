<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    section,
    p {
        margin-top: 10%;
        display: flex;
        justify-content: center;
    }
    </style>
</head>

<body>
    <?php

require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";

$obj = new InstitucionesMunicipioController();


$rows = $obj->stats_normas($_GET['cod_norma']);

foreach($rows as $data)
{
$normas[] = array($data['nomb_norma']);
$cantidades[] = array($data['cantidad']);
}


?>
    <link rel="stylesheet" type="text/css" href="/assest/css/stats_norma.css">

    <div class="modal">
        <div class="modal-container">

            <h2>Estadisticas por Normas</h2>

            <section>
                <div style="width: 1000px;" id="center">
                    <canvas id="myChart"></canvas>
                </div>
            </section>
            <div class="btn">

                <a href="/view/institucionesMunicipio/stats_menu.php" class="btn-regresar">Regresar</a>
            </div>
        </div>
    </div>

    <script>
    // === include 'setup' then 'config' above ===
    const labels = <?php echo json_encode($normas) ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: 'Normas Creación',
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
            indexAxis: 'x',
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