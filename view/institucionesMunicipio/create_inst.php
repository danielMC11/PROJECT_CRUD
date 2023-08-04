<link rel="stylesheet" type="text/css" href="/assest/css/agregarInst.css">
<div class="modal">
    <div class="modal-container">
        <h2>Agregar una Institucion Nueva</h2>
        <form action="store_inst.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NOMBRE DE INSTITUCION</label>
                <input type="text" name="nomb_inst" required class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SECTOR</label>
                <div class="custom_select">
                <select name="cod_sector" required class="form-control" id="cod_sector">
                    <option value="">Seleccione sector</option>
                    <option value="se1">OFICIAL</option>
                    <option value="se2">PRIVADO</option>
                </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">CODIGO CARACTER ACADEMICO</label>
                <div class="custom_select">
                <select name="cod_academ" required class="form-control" id="cod_academ">
                    <option value="">Seleccione caracter academico</option>
                    <option value="ca1">Universidad</option>
                    <option value="ca2">Institución Técnica Profesional</option>
                    <option value="ca3">Institución Tecnológica</option>
                    <option value="ca4">Institución Universitaria/Escuela Tecnológica</option>
                </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ACEPTAR</button>
            <a class="btn btn-danger" href="/view/institucionesMunicipio/index_inst.php">CANCELAR</a>
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
