<!--Se valido que no se escribiera letras en telefono -->

<?php
require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";

if (isset($_GET['cod_inst']) && isset($_GET['cod_munic'])) {
    $obj = new InstitucionesMunicipioController();
    $rows_est = $obj->estados();
    $data = $obj->show($_GET['cod_inst'], $_GET['cod_munic']);
} else {
    echo "HUBO UN ERROR :(";
    exit;
}
?>
<link rel="stylesheet" type="text/css" href="/assest/css/modificarInst.css">
<div class="modal">
    <div class="modal-container">
        <form action="update_inst_mun.php?&cod_munic=<?= $data['cod_munic']?>" method="POST"
            onsubmit="return validarFormulario()">
            <h2>MODIFICANDO REGISTRO</h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">IES</label>
                <div class="col-sm-10">
                    <input type="text" name="codigo_ies_padre" readonly class="form-control-plaintext"
                        value="<?= $data['codigo_ies_padre']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">CODIGO INSTITUCION</label>
                <div class="col-sm-10">
                    <input type="text" name="cod_inst" readonly class="form-control-plaintext"
                        value="<?= $data['cod_inst']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">INSTITUCION</label>
                <div class="col-sm-10">
                    <input type="text" name="nomb_inst" readonly class="form-control-plaintext"
                        value="<?= $data['nomb_inst']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">SECTOR</label>
                <div class="col-sm-10">
                    <input type="text" name="nomb_sector" readonly class="form-control-plaintext"
                        value="<?= $data['nomb_sector']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">CARACTER ACADEMICO</label>
                <div class="col-sm-10">
                    <input type="text" name="nomb_academ" readonly class="form-control-plaintext"
                        value="<?= $data['nomb_academ']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">DEPARTAMENTO</label>
                <div class="col-sm-10">
                    <input type="text" name="nomb_depto" required class="form-control-plaintext"
                        value="<?= $data['nomb_depto']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">MUNICIPIO</label>
                <div class="col-sm-10">
                    <input type="text" name="nomb_munic" required class="form-control-plaintext"
                        value="<?= $data['nomb_munic']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ESTADO</label>
                <div class="custom_select">
                    <select name="cod_estado" required class="form-control" id="cod_estado">
                    <option value='<?= $data['cod_estado'] ?>'><?= $data['nomb_estado'] ?></option>
                    <?php 
                    foreach ($rows_est as $row_e) {
                    if ($row_e['nomb_estado'] !== $data['nomb_estado']) {    
                    echo '<option value="' . $row_e['cod_estado'] . '">' . $row_e['nomb_estado'] . '</option>';                                }
                    }
                    ?> 
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">PROGRAMAS VIGENTES</label>
                <div style="width: 20%; margin: 50 auto" class="col-sm-10">
                    <input type="number" id="programasInput" name="programas_vigente" autocomplete="off" required
                        class="form-control" value="<?= $data['programas_vigente']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">¿ACREDITADA?</label>
                <div class="custom_select">
                    <select name="acreditada" required class="form-control" id="acreditada"
                        onchange="toggleAcreditadaSection()">
                        <option value="">Seleccione</option>
                        <option value="S">Si</option>
                        <option value="N">No</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row acreditada-section">
                <label for="staticEmail" class="col-sm-2 col-form-label">FECHA ACREDITACION</label>
                <div class="col-sm-10">
                    <input type="date" name="fecha_acreditacion" require class="form-control"
                        value="<?= $data['fecha_acreditacion'] ?>">

                </div>
            </div>
            <!--Llenado de resolucion acreditacion usando la funcion soloNumeros()-->
            <div class="mb-3 row acreditada-section">
                <label for="staticEmail" class="col-sm-2 col-form-label">RESOLUCION ACREDITACION</label>
                <div class="col-sm-10">
                    <input type="text" id="modificar" name="resolucion_acreditacion" autocomplete="off" require class="form-control"
                        maxlength="7" onkeypress="return soloNumeros(event)"
                        value="<?= $data['resolucion_acreditacion']?>">
                </div>
            </div>
            <div class="mb-3 row acreditada-section">
                <label for="staticEmail" class="col-sm-2 col-form-label">VIGENCIA ACREDITACION</label>
                <div class="col-sm-10">
                    <input type="number" id="vigenciaInput" name="vigencia" autocomplete="off" required
                        class="form-control" value="<?= $data['vigencia']?>">
                </div>
            </div>
            <!--Llenado de telefono usando la funcion soloNumeros()-->
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">TELEFONO</label>
                <div  class="col-sm-10">
                    <input type="text" name="telefono" autocomplete="off" required class="form-control" id="modificar" maxlength="10"
                        onkeypress="return soloNumeros(event)" value="<?= $data['telefono'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">DIRECCION</label>
                <div  class="col-sm-10">
                    <input type="text" name="direccion" id="modificar" autocomplete="off" required class="form-control" maxlength="100"
                        value="<?= $data['direccion'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">NATURALEZA JURIDICA</label>
                <div class="custom_select">
                    <select name="cod_juridica" required class="form-control" id="cod_juridica">
                        <option value="">Seleccione</option>
                        <option value="nj1">Municipal</option>
                        <option value="nj2">Nacional</option>
                        <option value="nj3">Fundación</option>
                        <option value="nj4">Departamental</option>
                        <option value="nj5">Corporación</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">SECCIONAL</label>
                <div class="custom_select">
                    <select name="cod_seccional" required class="form-control" id="cod_seccional">
                        <option value="">Seleccione</option>
                        <option value="ps1">Seccional</option>
                        <option value="ps2">Principal</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ACTO ADMINISTRATIVO</label>
                <div class="col-sm-10">
                    <input type="text" name="nomb_admon" readonly class="form-control-plaintext"
                        value="<?= $data['nomb_admon']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">NORMA</label>
                <div class="col-sm-10">
                    <input type="text" name="norma" readonly class="form-control-plaintext"
                        value="<?= $data['norma']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">FECHA CREACION</label>
                <div class="col-sm-10">
                    <input type="text" name="fecha_creacion" readonly class="form-control-plaintext"
                        value="<?= $data['fecha_creacion']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">NIT</label>
                <div class="col-sm-10">
                    <input type="text" name="nit" readonly class="form-control-plaintext"
                        value="<?= $data['nit']?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">PAGINA WEB</label>
                <div class="col-sm-10">
                    <input type="text" name="pagina_web" readonly class="form-control-plaintext"
                        value="<?= $data['pagina_web']?>">
                </div>
            </div>
            <div>

                <div>

                    <input type="submit" class="btn btn-success" value="ACTUALIZAR">
                    <a class="btn btn-danger" href="index_inst_mun.php">CANCELAR</a>
                </div>
        </form>
    </div>
</div>

<!--Digitar solo numeros de telefono-->
<script>
function soloNumeros(event) {
    var charCode = event.which ? event.which : event.keyCode;
    if (charCode < 48 || charCode > 57) {
        event.preventDefault();
        return false;
    }
    return true;
}
</script>

<!--Despliegue de atributos con respecto a la acreditacion cuando es S o N -->
<script>
function toggleAcreditadaSection() {
    var selectAcreditada = document.getElementById("acreditada");
    var acreditadaValue = selectAcreditada.value;
    var acreditadaSections = document.getElementsByClassName("acreditada-section");

    if (acreditadaValue == "S") {
        for (var i = 0; i < acreditadaSections.length; i++) {
            acreditadaSections[i].style.display = "block";
            acreditadaSections[i].querySelectorAll("input, select").forEach(function(element) {
                element.removeAttribute("disabled");
            });
        }
    } else if (acreditadaValue == "N") {
        for (var i = 0; i < acreditadaSections.length; i++) {
            acreditadaSections[i].style.display = "none";
            acreditadaSections[i].querySelectorAll("input, select").forEach(function(element) {
                element.setAttribute("disabled", "disabled");
            });
        }
    }
}


// Ejecutar la función al cargar la página para establecer el estado inicial
toggleAcreditadaSection();
</script>

<!-- Validar la fecha de acreditacion mayor a la del dia actual -->
<script>
function validarFormulario() {
    // Obtener el valor de la fecha de acreditación
    var fechaAcreditacion = document.getElementsByName('fecha_acreditacion')[0].value;
    // Obtener la fecha actual
    var fechaActual = new Date().toISOString().split('T')[0];

    var acreditacion = document.getElementsByName('acreditada')[0].value;

    if (acreditacion == 'S') {
        if (fechaAcreditacion > fechaActual) {
            // Mostrar una alerta al usuario
            alert("La fecha de acreditación no puede ser mayor a la fecha actual.");
            // Evitar el envío del formulario
            return false;
        } else {
            return true;
        }
    }
}
</script>

<!--Vigencia acreditacion sea entre 1 y 10 -->
<script>
var vigenciaInput = document.getElementById("vigenciaInput");

vigenciaInput.addEventListener("input", function() {
    var value = parseInt(vigenciaInput.value);
    if (isNaN(value) || value < 1 || value > 10) {
        vigenciaInput.value = "";
    }
});
</script>

<!--Programas vigentes sea entre 1 y 999 -->
<script>
var programasInput = document.getElementById("programasInput");

programasInput.addEventListener("input", function() {
    var value = parseInt(programasInput.value);
    if (isNaN(value) || value < 1 || value > 999) {
        programasInput.value = "";
    }
});
</script>