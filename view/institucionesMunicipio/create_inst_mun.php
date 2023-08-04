<?php

require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";

$obj = new InstitucionesMunicipioController();

$rows_inst = $obj->instituciones();
$rows_dep = $obj->departamentos();
$rows_mun = $obj->municipios_de_departamentos();
$rows_est = $obj->estados();
$rows_nat = $obj->naturaleza_juridica();
$rows_sec = $obj->seccional();
$rows_act = $obj->acto_admon();
$rows_nor = $obj->norma_creacion();
?>
<link rel="stylesheet" type="text/css" href="/assest/css/agregarInst.css">
<div class="modal">
    <div class="modal-container">
        <h2>Agregar una Sede Nueva</h2>
        <form action="store_inst_mun.php" method="POST" autocomplete="off">
            <label class="form-label">INSTITUCION</label>
            <div class="custom_select">
            <select name="codigo_ies_padre" required class="form-control">
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
            <div class="mb-3">
                <label class="form-label">DEPARTAMENTO</label>
                <div class="custom_select">
                <select name="cod_depto" required class="form-control" id="cod_depto">
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
            </div>
            <div class="mb-3">
                <label class="form-label">MUNICIPIO</label>
                <div class="custom_select">
                <select name="cod_munic" id="cod_munic" class="form-control">
                            <option value=''>Seleccione Municipio</option>
                            <?php if ($rows_mun): ?>
                            <?php foreach ($rows_mun as $row_m): ?>
                            <option value='<?=$row_m['cod_munic']?>' data-depto='<?= $row_m["cod_depto"] ?>'
                            ><?= $row_m['nomb_munic'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
                </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">ESTADO</label>
                <div class="custom_select">
                <select name="cod_estado" class="form-control">
                            <option value=''>Seleccione Estado</option>
                            <?php if ($rows_est): ?>
                            <?php foreach ($rows_est as $row_e): ?>
                            <option value='<?=$row_e['cod_estado']?>'>
                            <?= $row_e['nomb_estado'] ?>
                            </option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
                </select>
                </div>
            </div>
            <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">PROGRAMAS VIGENTES</label>
                <div class="col-sm-10">               
                    <input type="number" name="programas_vigente" 
                    autocomplete="off" required class="form-control">
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
                    <input type="date" name="fecha_acreditacion" require class="form-control">

                </div>
            </div>
            <!--Llenado de resolucion acreditacion usando la funcion soloNumeros()-->
            <div class="mb-3 row acreditada-section">
                <label for="staticEmail" class="col-sm-2 col-form-label">RESOLUCION ACREDITACION</label>
                <div class="col-sm-10">
                    <input type="text" id="modificar" name="resolucion_acreditacion" autocomplete="off" require class="form-control"
                        maxlength="7" onkeypress="return soloNumeros(event)">
                </div>
            </div>
            <div class="mb-3 row acreditada-section">
                <label for="staticEmail" class="col-sm-2 col-form-label">VIGENCIA ACREDITACION</label>
                <div class="col-sm-10">
                    <input type="number" id="vigenciaInput" name="vigencia" autocomplete="off" required
                        class="form-control">
                </div>
            </div>
            <!--Llenado de telefono usando la funcion soloNumeros()-->
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">DIRECCION</label>
                <div class="col-sm-10">
                    <input type="text" name="direccion" autocomplete="off" required class="form-control">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">TELEFONO</label>
                <div class="col-sm-10">
                    <input type="text" name="telefono" autocomplete="off" required class="form-control" maxlength="10"
                        onkeypress="return soloNumeros(event)">
                </div>
            </div>
            
            <label class="form-label">NATURALEZA JURIDICA</label>
            <div class="custom_select">
            <select name="cod_juridica" required class="form-control">
                            <option value=''>Seleccione Naturaleza Juridica</option>
                            <?php if ($rows_nat): ?>
                            <?php foreach ($rows_nat as $row_n): ?>

                            <option value='<?=$row_n['cod_juridica']?>'><?= $row_n['nomb_juridica'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
            </select>
            </div>
            <label for="exampleInputEmail1" class="form-label">SECCIONAL</label>
            <div class="custom_select">
            <select name="cod_seccional" required class="form-control">
                            <option value=''>Seleccione Seccional</option>
                            <?php if ($rows_sec): ?>
                            <?php foreach ($rows_sec as $row_s): ?>

                            <option value='<?=$row_s['cod_seccional']?>'><?= $row_s['nomb_seccional'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
            </select>
            </div>
            <label class="form-label">ACTO ADMINISTRATIVO</label>
            <div class="custom_select">
            <select name="cod_admon" required class="form-control">
                            <option value=''>Seleccione Acto Administrativo</option>
                            <?php if ($rows_act): ?>
                            <?php foreach ($rows_act as $row_a): ?>

                            <option value='<?=$row_a['cod_admon']?>'><?= $row_a['nomb_admon'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
            </select>
            </div>
            <label class="form-label">NORMA CREACION</label>
            <div class="custom_select">
            <select name="cod_norma" required class="form-control">
                            <option value=''>Seleccione Norma Creacion</option>
                            <?php if ($rows_nor): ?>
                            <?php foreach ($rows_nor as $rows_n): ?>

                            <option value='<?=$rows_n['cod_norma']?>'><?= $rows_n['nomb_norma'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
            </select>
            
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">NORMA</label>
                <div class="col-sm-10">
                    <input type="text" name="norma" autocomplete="off" required class="form-control">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">FECHA CREACION</label>
                <div class="col-sm-10">
                     <input type="date" name="fecha_creacion" require class="form-control">

                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">NIT</label>
                <div class="col-sm-10">
                    <input type="text" name="nit"  class="form-control-plaintext">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">PAGINA WEB</label>
                <div class="col-sm-10">
                    <input type="text" name="pagina_web" class="form-control-plaintext">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">ACEPTAR</button>
            <a class="btn btn-danger" href="/view/institucionesMunicipio/index_inst_mun.php">CANCELAR</a>
        </form>
    </div>
</div>
<script>
const codDeptoSelect = document.getElementById('cod_depto');
const codMunicSelect = document.getElementById('cod_munic');
const municipios = codMunicSelect.querySelectorAll('option');

const deptoOptions = Array.from(codDeptoSelect.options);
deptoOptions.sort((a, b) => a.text.localeCompare(b.text));
deptoOptions.forEach((option) => codDeptoSelect.appendChild(option));

// Ordenar las opciones de municipio alfabéticamente
const municOptions = Array.from(codMunicSelect.options);
municOptions.sort((a, b) => a.text.localeCompare(b.text));
municOptions.forEach((option) => codMunicSelect.appendChild(option));

// Función para mostrar u ocultar opciones de municipio según el departamento seleccionado
function actualizarMunicipios() {
    const selectedDepto = codDeptoSelect.value;
    codMunicSelect.disabled = selectedDepto === '';

    // Establecer la opción "Seleccione Municipio" como la opción por defecto
    codMunicSelect.value = '';

    for (let i = 0; i < municipios.length; i++) {
        const municipio = municipios[i];
        const deptoAsociado = municipio.getAttribute('data-depto');

        if (deptoAsociado === selectedDepto || selectedDepto === '') {
            municipio.style.display = 'block';
        } else {
            municipio.style.display = 'none';
        }
    }
}

function validar() {
    var codDeptoSelect = document.getElementById("cod_depto");
    var codMunicSelect = document.getElementById("cod_munic");

    if (codDeptoSelect.value == "") {
        alert("Por favor, seleccione al menos el departamento antes de enviar el formulario.");
        return false;
    }
    return true;
}

// Llamar a la función al cargar la página y cuando se cambie el departamento seleccionado
actualizarMunicipios();
codDeptoSelect.addEventListener('change', actualizarMunicipios);
</script>

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