<!--Se valida la fecha inicial menor a la final -->

<?php
require_once "/proyecto_crud/controller/RectoriaController.php";

if (isset($_GET['cod_munic']) && isset($_GET['cod_inst']) && isset($_GET['cod_directivo']) && isset($_GET['cod_cargo'])) {
    $obj = new RectoriaController();
    $rows_car = $obj->cargos();
    $rows_nom = $obj->acto_nombramiento();
    $data = $obj->show($_GET['cod_munic'], $_GET['cod_inst'], $_GET['cod_directivo'], $_GET['cod_cargo']);
} else {
    echo "HUBO UN ERROR :(";
    exit;
}
?>
<link rel="stylesheet" type="text/css" href="/assest/css/modificar.css">
<link rel="stylesheet" type="text/css" href="/assest/css/modificarInst.css">

<!--Se llama a la funcion validarFechas()-->
<div class="modal">
    <div class="modal-container">
        <form id="update-form" action="update.php?cod_munic=<?= $data['cod_munic'] ?>&id_cargo=<?= $data['cod_cargo'] ?>
&cod_inst=<?= $data['cod_inst'] ?>&cod_directivo=<?= $data['cod_directivo']?>" method="POST"
            onsubmit="return validarFechas()">
            <h2>MODIFICANDO REGISTRO</h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">DIRECTIVO</label>
                <div class="col-sm-10">
                    <input type="text" name="nomb_directivo" readonly class="form-control-plaintext"
                        value="<?= $data['nomb_directivo']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">MUNICIPIO</label>
                <div class="col-sm-10">
                    <input type="text" name="nomb_munic" readonly class="form-control-plaintext"
                        value="<?= $data['nomb_munic']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">CARGOS</label>
                <div class="custom_select">
                    <select name="cod_cargo" required class="form-control">
                    <option value='<?= $data['cod_cargo'] ?>'><?= $data['nomb_cargo'] ?></option>
                    <?php 
                    foreach ($rows_car as $row_c) {
                    if ($row_c['nomb_cargo'] !== $data['nomb_cargo']) {    
                    echo '<option value="' . $row_c['cod_cargo'] . '">' . $row_c['nomb_cargo'] . '</option>';                                }
                    }
                    ?> 
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">FECHA INICIO</label>
                <div  class="col-sm-10">
                    <input type="date" name="fecha_inicio" id="fecha_inicio" required class="form-control"
                        value="<?= $data['fecha_inicio'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">FECHA FINAL</label>
                <div  class="col-sm-10">
                    <input type="date" name="fecha_final" id="fecha_final" required class="form-control"
                        value="<?= $data['fecha_final'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ACTO NOMBRAMIENTO</label>
                <div class="custom_select">
                    <select name="cod_nombram" required class="form-control">
                    <option value='<?= $data['cod_nombram'] ?>'><?= $data['nomb_nombram'] ?></option>
                    <?php 
                    foreach ($rows_nom as $row_n) {
                    if ($row_n['nomb_nombram'] !== $data['nomb_nombram']) {    
                    echo '<option value="' . $row_n['cod_nombram'] . '">' . $row_n['nomb_nombram'] . '</option>';                                }
                    }
                    ?> 
                    </select>
                </div>
            </div>
            <div>
                <input type="submit" class="btn btn-success" onclick="validarCambios()" value="ACTUALIZAR">
                <a class="btn btn-danger" href="index.php">CANCELAR</a>
            </div>
        </form>
    </div>
</div>


<script>
//funcion para validar que la fecha de inicio no se mayor a la final
function validarFechas() {
    var fechaInicio = new Date(document.getElementById('fecha_inicio').value);
    var fechaFinal = new Date(document.getElementById('fecha_final').value);
    var today = new Date(); // Fecha actual

    if (fechaInicio < today) {
        alert('La fecha de inicio tiene que ser mayor a la actual.');
        return false; // Evita enviar el formulario si hay un error
    } else {

        if (fechaInicio > fechaFinal) {
            alert('La fecha de inicio no puede ser mayor a la fecha final.');
            return false; // Evita enviar el formulario si hay un error
        }

        return true; // Permite enviar el formulario si no hay errores
    }
}
</script>



<script>
  function validarCambios() {
    event.preventDefault();
    // Obtener los valores originales del formulario desde PHP
    var old_cargo = "<?php echo $data['cod_cargo']; ?>";
    var old_fecha_inicio= "<?php echo $data['fecha_inicio']; ?>";
    var old_fecha_final = "<?php echo $data['fecha_final']; ?>";
    var old_nombram = "<?php echo $data['cod_nombram']; ?>";
    
    var new_cargo = document.getElementById("update-form").cod_cargo.value;
    var new_fecha_inicio = document.getElementById("update-form").fecha_inicio.value;
    var new_fecha_final = document.getElementById("update-form").fecha_final.value;
    var new_nombram = document.getElementById("update-form").cod_nombram.value;

    if (
    old_cargo === new_cargo 
    && old_fecha_inicio === new_fecha_inicio
    && old_fecha_final === new_fecha_final
    && old_nombram === new_nombram
    ) {
            alert("No se ha realizado ninguna actualización.");
        } else {
            document.getElementById("update-form").submit();
    }


    
  }
</script>