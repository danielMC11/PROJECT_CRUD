<?php

require_once "/proyecto_crud/controller/InstitucionesMunicipioController.php";

$obj = new InstitucionesMunicipioController();

$rows_inst = $obj->instituciones();
$rows_dep = $obj->departamentos();
$rows_mun = $obj->municipios_de_departamentos();
$rows_est = $obj->estados();
?>
<link rel="stylesheet" type="text/css" href="/assest/css/agregarInst.css">
<div class="modal">
    <div class="modal-container">
        <h2>Agregar una Sede Nueva</h2>
        <form action="store_inst_mun.php" method="POST" autocomplete="off">
            <label for="exampleInputEmail1" class="form-label">INSTITUCION</label>
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
                <label for="exampleInputEmail1" class="form-label">DEPARTAMENTO</label>
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
                <label for="exampleInputEmail1" class="form-label">MUNICIPIO</label>
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
            <!--Llenado de telefono usando la funcion soloNumeros()-->
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">TELEFONO</label>
                <div class="col-sm-10">
                    <input type="text" name="telefono" autocomplete="off" required class="form-control" maxlength="10"
                        onkeypress="return soloNumeros(event)">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ESTADO</label>
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
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ACREDITADA</label>
                <div class="custom_select">
                <select name="acreditada" required class="form-control" id="cod_estado">
                    <option value="">Seleccione</option>
                    <option value="S">SI</option>
                    <option value="N">NO</option>
                </select>
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