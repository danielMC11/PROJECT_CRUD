<link rel="stylesheet" type="text/css" href="/assest/css/consulta_dir.css">
<div class="modal">
    <divc class="modal-container">
        <h2>Consultar Directivos</h2>
        <form action="reporte_dir.php" method="GET" autocomplete="off">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">INSTITUCION</label>
                <div class="custom_select">
                    <select name="codigo_ies_padre" required class="custom_select" id="cod_depto">
                        <option value="">Seleccione institucion</option>
                        <option value="1101">UNIVERSIDAD NACIONAL DE COLOMBIA</option>
                        <option value="1105">UNIVERSIDAD PEDAGOGICA NACIONAL</option>
                        <option value="1106">UNIVERSIDAD PEDAGOGICA Y TECNOLOGICA DE COLOMBIA - UPTC</option>
                        <option value="1110">UNIVERSIDAD DEL CAUCA</option>
                        <option value="1111">UNIVERSIDAD TECNOLOGICA DE PEREIRA - UTP</option>
                        <option value="1112">UNIVERSIDAD DE CALDAS</option>
                        <option value="1113">UNIVERSIDAD DE CORDOBA</option>
                        <option value="1114">UNIVERSIDAD SURCOLOMBIANA</option>
                        <option value="1115">UNIVERSIDAD DE LA AMAZONIA</option>
                        <option value="1117">UNIVERSIDAD MILITAR-NUEVA GRANADA</option>
                        <option value="1118">UNIVERSIDAD TECNOLOGICA DEL CHOCO-DIEGO LUIS CORDOBA</option>
                        <option value="1119">UNIVERSIDAD DE LOS LLANOS</option>
                        <option value="1120">UNIVERSIDAD POPULAR DEL CESAR</option>
                        <option value="1121">UNIVERSIDAD-COLEGIO MAYOR DE CUNDINAMARCA</option>
                        <option value="1122">UNIVERSIDAD DEL PACIFICO</option>
                        <option value="1201">UNIVERSIDAD DE ANTIOQUIA</option>
                        <option value="1202">UNIVERSIDAD DEL ATLANTICO</option>
                        <option value="1203">UNIVERSIDAD DEL VALLE</option>
                        <option value="1204">UNIVERSIDAD INDUSTRIAL DE SANTANDER</option>
                        <option value="1205">UNIVERSIDAD DE CARTAGENA</option>
                        <option value="1206">UNIVERSIDAD DE NARIÑO</option>
                        <option value="1207">UNIVERSIDAD DEL TOLIMA</option>
                        <option value="1208">UNIVERSIDAD DEL QUINDIO</option>
                        <option value="1209">UNIVERSIDAD FRANCISCO DE PAULA SANTANDER</option>
                        <option value="1212">UNIVERSIDAD DE PAMPLONA</option>
                        <option value="1213">UNIVERSIDAD DEL MAGDALENA - UNIMAGDALENA</option>
                        <option value="1214">UNIVERSIDAD DE CUNDINAMARCA-UDEC</option>
                        <option value="1217">UNIVERSIDAD DE SUCRE</option>
                        <option value="1218">UNIVERSIDAD DE LA GUAJIRA</option>
                        <option value="1301">UNIVERSIDAD DISTRITAL-FRANCISCO JOSE DE CALDAS</option>
                        <option value="1701">PONTIFICIA UNIVERSIDAD JAVERIANA</option>
                        <option value="1703">UNIVERSIDAD INCCA DE COLOMBIA</option>
                        <option value="1704">UNIVERSIDAD SANTO TOMAS</option>
                        <option value="1706">UNIVERSIDAD EXTERNADO DE COLOMBIA</option>
                        <option value="1707">FUNDACION UNIVERSIDAD DE BOGOTA - JORGE TADEO LOZANO</option>
                        <option value="1709">UNIVERSIDAD CENTRAL</option>
                        <option value="1710">UNIVERSIDAD PONTIFICIA BOLIVARIANA</option>
                        <option value="1711">UNIVERSIDAD DE LA SABANA</option>
                        <option value="1712">UNIVERSIDAD EAFIT</option>
                        <option value="1713">UNIVERSIDAD DEL NORTE</option>
                        <option value="1714">COLEGIO MAYOR DE NUESTRA SEÑORA DEL ROSARIO</option>
                        <option value="1715">FUNDACION UNIVERSIDAD DE AMERICA</option>
                        <option value="1718">UNIVERSIDAD DE SAN BUENAVENTURA</option>
                        <option value="1719">UNIVERSIDAD CATOLICA DE COLOMBIA</option>
                        <option value="1720">UNIVERSIDAD MARIANA</option>
                        <option value="1722">UNIVERSIDAD DE MANIZALES</option>
                        <option value="1725">FUNDACION UNIVERSIDAD AUTONOMA DE COLOMBIA -FUAC-</option>
                        <option value="1726">UNIVERSIDAD CATOLICA DE ORIENTE -UCO</option>
                        <option value="1728">UNIVERSIDAD SERGIO ARBOLEDA</option>
                        <option value="1729">UNIVERSIDAD EL BOSQUE</option>
                        <option value="1734"></option>
                        <option value="1735"></option>
                        <option value="1801"></option>
                        <option value="1803"></option>
                        <option value="1804"></option>
                        <option value="1805"></option>
                        <option value="1806"></option>
                        <option value="1812"></option>
                        <option value="1813"></option>
                        <option value="1814"></option>
                        <option value="1815"></option>
                        <option value="1818"></option>
                        <option value="1823"></option>
                        <option value="1824"></option>
                        <option value="1825"></option>
                        <option value="1826"></option>
                        <option value="1827"></option>
                        <option value="1828"></option>
                        <option value="1830"></option>
                        <option value="1831"></option>
                        <option value="1832"></option>
                        <option value="1833"></option>
                        <option value="1835"></option>
                        <option value="2102"></option>
                        <option value="2104"></option>
                        <option value="2106"></option>
                        <option value="2110"></option>
                        <option value="2114"></option>




                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                <input type="date" name="fecha_inicio" required class="form-control" id="fecha_inicio">
            </div>
            <div class="mb-3">
                <label for="fecha_final" class="form-label">Fecha final</label>
                <input type="date" name="fecha_final" required class="form-control" style="left:42px" id="fecha_final">
            </div>

            <button type="submit" class="btn btn-primary">ACEPTAR</button>
            <a class="btn btn-danger" href="index.php">CANCELAR</a>
        </form>
</div>
</div>