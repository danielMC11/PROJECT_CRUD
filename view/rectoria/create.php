<?php 
require_once "/proyecto_crud/controller/RectoriaController.php";


$obj = new RectoriaController();


$rows_inst = $obj->instituciones();
$rows_inst_munic = $obj->inst_munic();

?>
<link rel="stylesheet" type="text/css" href="/assest/css/agregarDir.css">

<div class="modal">
    <div class="modal-container">
        <h2>Agregar un nuevo Directivo</h2>
    <form action="store.php" method="POST" autocomplete="off">

        <label class="form-label">INSTITUCION</label>
            <div class="custom_select">
            <select name="codigo_ies_padre" id="cod_inst" required class="form-control">
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
        <label class="form-label">SEDE</label>
            <div class="custom_select">
            <select name="cod_inst_cod_munic" id='cod_inst_cod_munic' required class="form-control">
                            <option value=''>Seleccione Ciudad de la Sede</option>
                            <?php if ($rows_inst_munic): ?>
                            <?php foreach ($rows_inst_munic as $row_i): ?>

                            <option value='<?=$row_i['cod_inst_cod_munic']?>' data-inst=<?=$row_i['codigo_ies_padre']?>><?= $row_i['sede'] ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option>No Hay Registros</option>
                            <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NOMBRE DIRECTIVO</label>
            <input type="text" name="nomb_directivo" required class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">APELLIDO DIRECTIVO</label>
            <input type="text" name="apell_directivo" required class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
       
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CARGO</label>
            <div class="custom_select">
            <select name="cod_cargo" required class="form-control" id="cod_cargo">
                <option value="">Seleccione</option>
                <option value="car1">Rep. Legal Suplente</option>
                <option value="car2">Director</option>
                <option value="car3">Primer Rep. Legal Suplente</option>
                <option value="car4">Rector Encargado</option>
                <option value="car5">Rector Suplente</option>
                <option value="car6">Rector</option>
                <option value="car7">Segundo Rep. Legal Suplente</option>
                <option value="car8">Primer Rector Suplente</option>
                <option value="car9">Rep. Legal</option>
                <option value="car10">Rector General</option>
                <option value="car11">Primer Suplente Del Rector</option>
                <option value="car12">Rep. Legal Encargado</option>
                <option value="car13">Segundo Rector Suplente</option>
                <option value="car14">Segundo Suplente Del Rector</option>
                <option value="car15">Tercer Rep. Legal Suplente</option>

            </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">FECHA INICIO</label>
            <input type="date" name="fecha_inicio" required class="form-control" id="fecha_inicio"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">FECHA FINAL</label>
            <input type="date" name="fecha_final" required class="form-control" id="fecha_final"
                aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">ACEPTAR</button>
        <a class="btn btn-danger" href="/view/rectoria/index.php">CANCELAR</a>
    </form>
</div>
</div>

<script>
        const codInstSelect = document.getElementById('cod_inst');
        const codInst_Munic_Select = document.getElementById('cod_inst_cod_munic');

        const sedes = codInst_Munic_Select.querySelectorAll('option');



        function actualizar() {

            const selectedInst = codInstSelect.value;

            for (let i = 0; i < sedes.length; i++) {
                const sede = sedes[i]
                const InstAsociada = sede.getAttribute('data-inst');
                if (InstAsociada === selectedInst || selectedInst === '') {
                    sede.style.display = 'block';

                } else {
                    sede.style.display = 'none';
                }
            }

        }
        codInstSelect.addEventListener('change', actualizar);
</script>