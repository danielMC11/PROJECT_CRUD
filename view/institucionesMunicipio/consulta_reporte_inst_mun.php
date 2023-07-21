<link rel="stylesheet" type="text/css" href="/assest/css/consulta_acto.css">
<div class="modal">
    <div class="modal-container">
        <h2>Filtrado Por Acto Administrativo</h2>
        <form action="reporte_inst_mun.php" method="GET" autocomplete="on">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ACTO AMINISTRATIVO</label>
                <div class="custom_select">
                    <select name="cod_admon" required class="form-control" id="cod_admon">
                        <option value="">Seleccione</option>
                        <option value="adm2">GOBIERNO DEPARTAMENTAL DE ANTIOQUIA</option>
                        <option value="adm3">Asamblea Departamental del Magdalena</option>
                        <option value="adm4">TELECOM</option>
                        <option value="adm5">Presidencia de la República</option>
                        <option value="adm6">Congreso de Colombia</option>
                        <option value="adm7">Asamblea Departamental de Santander</option>
                        <option value="adm8">Comando del Ejército Nacional</option>
                        <option value="adm9">Congreso de la República</option>
                        <option value="adm10">Asamblea Departamental de Cundinamarca</option>
                        <option value="adm11">GOBIERNO DEPARTAMENTAL</option>
                        <option value="adm12">MINISTERIO DE EDUCACION NACIONAL</option>
                        <option value="adm13">Gobierno Nacional</option>
                        <option value="adm14">Ministerio de Defensa</option>
                        <option value="adm15">GOBIERNO DEPARTAMENTAL DEL QUINDIO</option>
                        <option value="adm16">Consejo Superior Universitario</option>
                        <option value="adm17">ICFES</option>
                        <option value="adm18">GOBIERNO DEPARTAMENTAL DEL VALLE</option>
                        <option value="adm19">MINISTERIO DE JUSTICIA</option>
                        <option value="adm20">GOBERNACION DEL ATLANTICO</option>
                        <option value="adm21">Concejo Municipal de Armenia</option>
                        <option value="adm22">Consejo Directivo</option>
                        <option value="adm23">Concejo Municipal de Tulua</option>
                        <option value="adm24">MINISTERIO DE EDUCACION NACIONAL</option>
                        <option value="adm25">GOBERNACION DEL VALLE</option>
                        <option value="adm26">SIN DATO</option>
                        <option value="adm27">Gobierno Nacional</option>
                        <option value="adm28">GOBERNACION DEL ATLANTICO</option>
                        <option value="adm29">Presidencia de la Repúiblica</option>
                        <option value="adm30">Gobierno Departamental de Antioquia</option>
                        <option value="adm31">Asamblea Departamental de Bolivar</option>
                        <option value="adm32">Gobernacion del Norte de Santander</option>
                        <option value="adm33">Ministerio de Gobierno</option>
                        <option value="adm34">Congreso de la Republica</option>
                        <option value="adm35">GOBIERNO DEPARTAMENTAL DE SANTANDER</option>
                        <option value="adm36">Asamblea Departamental del Atlantico</option>
                        <option value="adm37">Consejo de Fundadores de la UNISANPABLO</option>
                        <option value="adm38">ASAMBLEA GENERAL</option>
                        <option value="adm39">CONGRESO DE COLOMBIA</option>
                        <option value="adm40">CONGRESO DE LA REPUBLICA</option>
                        <option value="adm41">Asamblea Departamental de Antioquia</option>
                        <option value="adm42">MINISTERIO DE GOBIERNO</option>
                        <option value="adm43">Congreso</option>
                        <option value="adm44">Concejo Municipal</option>
                        <option value="adm45">GOBERNACION DEL DEPARTAMENTO DE BOLIVAR</option>
                        <option value="adm46">Concejo Municipal de Envigado</option>
                        <option value="adm47">Congreso de la Republica</option>
                        <option value="adm48">Ministerio de Educaci¿n Nacional</option>
                        <option value="adm49">MINISTERIO DE GOBIERNO</option>
                        <option value="adm50">Gobernacion Departamental de Antioquia</option>
                        <option value="adm51">Gobernacion Departamental de Santander</option>
                        <option value="adm52">Ministerio de Educacion Nacional</option>
                        <option value="adm53">GOBIERNO DEPARTAMENTAL DE SANTANDER</option>
                        <option value="adm54">Gobernacion de Santander</option>
                        <option value="adm55">Comando del Ej¿rcito Nacional</option>
                        <option value="adm56">Asamblea Departamental de Caldas</option>
                        <option value="adm57">GOBERNACION DEPARTAMENTO DEL ATLANTICO</option>
                        <option value="adm58">MINISTERIO DE EDUCACION NACIONAL</option>
                        <option value="adm59">MINISTERIO DE EDUCACION</option>
                        <option value="adm60">Gobierno Departamental de la Guajira</option>
                        <option value="adm61">Asamblea Departamental del Tolima</option>
                        <option value="adm62">Ministerio de Educacion Nacional</option>
                        <option value="adm63">Asamblea Departamental del Valle</option>
                        <option value="adm64">MINISTERIO DE JUSTICIA</option>
                        <option value="adm65">Concejo Municipal de Cali</option>
                        <option value="adm66">Gobernaci¿n de Nari¿o</option>
                        <option value="adm67">Asamblea</option>
                        <option value="adm68">Ministerio de Educación Nacional</option>
                        <option value="adm69">Honorable Consejo Superior de Envigado</option>
                        <option value="adm70">el Libertador Sim¿n Bolivar</option>
                        <option value="adm71">Asamblea Departamental de Sucre</option>
                        <option value="adm72">ARQUIDIOCESIS DE MANIZALES</option>
                        <option value="adm73">Asamblea del Tolima</option>
                        <option value="adm74">Gobierno Departamental de Nari¿o</option>
                        <option value="adm75">Ministerio de Justicia</option>
                        <option value="adm76">Asamblea Departamental de Cundinamarca</option>
                        <option value="adm77">CONGRESO</option>
                        <option value="adm78">Ministerio de Defensa</option>
                        <option value="adm79">Gobernaci¿n Departamento del Atl¿ntico</option>
                        <option value="adm80">Congreso de Colombia</option>
                        <option value="adm1">_</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">ACEPTAR</button>
            <a class="btn btn-danger" href="index_inst_mun.php">CANCELAR</a>
        </form>
    </div>
</div>