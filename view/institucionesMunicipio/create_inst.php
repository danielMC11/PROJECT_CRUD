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


