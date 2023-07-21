<link rel="stylesheet" type="text/css" href="/assest/css/consulta.css">
<div class="modal">
    <div class="modal-container">
        <h2>Consulta por Departamentos y Municipios</h2>
        <form action="cobertura.php" method="GET" autocomplete="on">
            <div class="sm-3">
                <label for="exampleInputEmail1" class="form-label">DEPARTAMENTO</label>
                <div class="custom_select">
                    <select name="cod_depto" required class="form-control" id="cod_depto">
                        <option value="">Seleccione departamento</option>
                        <option value="dp1">Casanare</option>
                        <option value="dp2">Cundinamarca</option>
                        <option value="dp3">Tolima</option>
                        <option value="dp4">Meta</option>
                        <option value="dp5">Antioquia</option>
                        <option value="dp6">Chocó</option>
                        <option value="dp7">Boyacá</option>
                        <option value="dp8">Quindío</option>
                        <option value="dp9">Santander</option>
                        <option value="dp10">Caquetá</option>
                        <option value="dp11">Archipiélago de San Andrés Providencia y Santa Catalina</option>
                        <option value="dp12">Córdoba</option>
                        <option value="dp13">Sucre</option>
                        <option value="dp14">Arauca</option>
                        <option value="dp15">Nariño</option>
                        <option value="dp16">Amazonas</option>
                        <option value="dp17">Bogotá D.C.</option>
                        <option value="dp18">Magdalena</option>
                        <option value="dp19">Norte de Santander</option>
                        <option value="dp20">Risaralda</option>
                        <option value="dp21">La Guajira</option>
                        <option value="dp22">Cesar</option>
                        <option value="dp23">Cauca</option>
                        <option value="dp24">Putumayo</option>
                        <option value="dp25">Caldas</option>
                        <option value="dp26">Huila</option>
                        <option value="dp27">Valle del Cauca</option>
                        <option value="dp28">Bolívar</option>
                        <option value="dp29">Atlántico</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">MUNICIPIO</label>
                <div class="custom_select">
                    <select name="cod_munic" class="form-control" id="cod_munic" disable>
                        <option value="">Seleccione Municipio</option>
                        <option value="mu1" data-depto="dp23">Popayán</option>
                        <option value="mu2" data-depto="dp5">El Carmen de Viboral</option>
                        <option value="mu3" data-depto="dp20">Pereira</option>
                        <option value="mu4" data-depto="dp5">Caucasia</option>
                        <option value="mu5" data-depto="dp9">San Gil </option>
                        <option value="mu6" data-depto="dp2">Villa de San Diego de Ubaté</option>
                        <option value="mu7" data-depto="dp11">San Andrés </option>
                        <option value="mu8" data-depto="dp9">Barrancabermeja </option>
                        <option value="mu9" data-depto="dp29">Puerto Colombia</option>
                        <option value="mu10" data-depto="dp10">Florencia</option>
                        <option value="mu11" data-depto="dp7">Sogamoso</option>
                        <option value="mu12" data-depto="dp24">Sibundoy</option>
                        <option value="mu13" data-depto="dp19">Ocaña</option>
                        <option value="mu14" data-depto="dp15">San Andrés de Tumaco</option>
                        <option value="mu15" data-depto="dp21">San Juan del Cesar</option>
                        <option value="mu16" data-depto="dp2">Chía</option>
                        <option value="mu17" data-depto="dp5">Santa Rosa de Osos</option>
                        <option value="mu18" data-depto="dp25">Manizales</option>
                        <option value="mu19" data-depto="dp2">Girardot</option>
                        <option value="mu20" data-depto="dp2">Facatativá</option>
                        <option value="mu21" data-depto="dp17">Bogotá D.C.</option>
                        <option value="mu22" data-depto="dp2">Fusagasugá</option>
                        <option value="mu23" data-depto="dp5">Marinilla</option>
                        <option value="mu24" data-depto="dp5">Copacabana</option>
                        <option value="mu25" data-depto="dp27">Zarzal</option>
                        <option value="mu26" data-depto="dp5">Puerto Berrío</option>
                        <option value="mu27" data-depto="dp15">Pasto</option>
                        <option value="mu28" data-depto="dp26">Neiva</option>
                        <option value="mu29" data-depto="dp5">Medellín</option>
                        <option value="mu30" data-depto="dp2">Nilo</option>
                        <option value="mu31" data-depto="dp27">Sevilla</option>
                        <option value="mu32" data-depto="dp27">Tuluá</option>
                        <option value="mu33" data-depto="dp7">Tunja</option>
                        <option value="mu34" data-depto="dp9">Floridablanca</option>
                        <option value="mu35" data-depto="dp6">Quibdó</option>
                        <option value="mu36" data-depto="dp18">Ciénaga</option>
                        <option value="mu37" data-depto="dp23">Puerto Tejada</option>
                        <option value="mu38" data-depto="dp12">Montería</option>
                        <option value="mu39" data-depto="dp27">Guadalajara de Buga</option>
                        <option value="mu40" data-depto="dp24">Mocoa</option>
                        <option value="mu41" data-depto="dp5">Caldas</option>
                        <option value="mu42" data-depto="dp27">Roldanillo</option>
                        <option value="mu43" data-depto="dp5">Andes</option>
                        <option value="mu44" data-depto="dp19">Pamplona</option>
                        <option value="mu45" data-depto="dp1">Yopal</option>
                        <option value="mu46" data-depto="dp3">Honda</option>
                        <option value="mu47" data-depto="dp2">Mosquera</option>
                        <option value="mu48" data-depto="dp20">Santa Rosa de Cabal</option>
                        <option value="mu49" data-depto="dp5">Apartadó</option>
                        <option value="mu50" data-depto="dp2">Cota</option>
                        <option value="mu51" data-depto="dp19">San José de Cúcuta</option>
                        <option value="mu52" data-depto="dp29">Barranquilla</option>
                        <option value="mu53" data-depto="dp3">Ibagué</option>
                        <option value="mu54" data-depto="dp8">Armenia</option>
                        <option value="mu55" data-depto="dp3">Espinal</option>
                        <option value="mu56" data-depto="dp9">Socorro</option>
                        <option value="mu57" data-depto="dp5">Sabaneta</option>
                        <option value="mu58" data-depto="dp23">Timbío</option>
                        <option value="mu59" data-depto="dp13">Coveñas</option>
                        <option value="mu60" data-depto="dp18">Santa Marta</option>
                        <option value="mu61" data-depto="dp5">Bello</option>
                        <option value="mu62" data-depto="dp27">Cartago</option>
                        <option value="mu63" data-depto="dp4">Villavicencio</option>
                        <option value="mu64" data-depto="dp2">Madrid</option>
                        <option value="mu65" data-depto="dp9">Bucaramanga</option>
                        <option value="mu66" data-depto="dp26">Rivera</option>
                        <option value="mu67" data-depto="dp13">Sincelejo</option>
                        <option value="mu68" data-depto="dp14">Arauca</option>
                        <option value="mu69" data-depto="dp5">Turbo</option>
                        <option value="mu70" data-depto="dp5">Rionegro</option>
                        <option value="mu71" data-depto="dp9">Málaga</option>
                        <option value="mu72" data-depto="dp22">Valledupar</option>
                        <option value="mu73" data-depto="dp12">Cereté</option>
                        <option value="mu74" data-depto="dp25">Pensilvania</option>
                        <option value="mu75" data-depto="dp5">Santa Fé de Antioquia</option>
                        <option value="mu76" data-depto="dp22">La Paz</option>
                        <option value="mu77" data-depto="dp21">Riohacha</option>
                        <option value="mu78" data-depto="dp7">Duitama</option>
                        <option value="mu79" data-depto="dp16">Leticia</option>
                        <option value="mu80" data-depto="dp27">Cali</option>
                        <option value="mu81" data-depto="dp22">Aguachica</option>
                        <option value="mu82" data-depto="dp7">Chiquinquirá</option>
                        <option value="mu83" data-depto="dp27">Palmira</option>
                        <option value="mu84" data-depto="dp5">Envigado</option>
                        <option value="mu85" data-depto="dp24">Puerto Asís</option>
                        <option value="mu86" data-depto="dp28">Cartagena de Indias</option>
                        <option value="mu87" data-depto="dp27">Buenaventura</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" onclick="return validar()">ACEPTAR</button>
            <a class="btn btn-danger" href="index_inst_mun.php">CANCELAR</a>
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
<?php 
require_once "/opt/lampp/htdocs/proyecto_crud/view/head/footer.php";
?>