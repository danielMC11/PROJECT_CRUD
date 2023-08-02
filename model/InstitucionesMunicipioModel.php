<!--Se organizo las consultas -->
<?php
require_once "/proyecto_crud/config/db.php";

class InstitucionesMunicipioModel
 {
    private $PDO;

    public function __construct() {
        $db = new db();
        $this->PDO = $db->conexion();
    }
    public function insertar($codigo_ies_padre, $nomb_inst, $cod_sector, $cod_academ, $cod_inst, $cod_munic, $telefono, $cod_estado) {
        try {
            $statement1 = $this->PDO->prepare(
                "INSERT INTO instituciones (codigo_ies_padre, nomb_inst, cod_sector, cod_academ) 
                VALUES (:codigo_ies_padre, :nomb_inst, :cod_sector, :cod_academ)"
            );
            $statement1->bindParam(":codigo_ies_padre", $codigo_ies_padre);
            $statement1->bindParam(":nomb_inst", $nomb_inst);
            $statement1->bindParam(":cod_sector", $cod_sector);
            $statement1->bindParam(":cod_academ", $cod_academ);
    
            $statement2 = $this->PDO->prepare(
                "INSERT INTO inst_por_municipio (codigo_ies_padre, cod_inst, cod_munic, telefono, cod_estado) 
                VALUES (:codigo_ies_padre, :cod_inst, :cod_munic, :telefono, :cod_estado)"
            );
            $statement2->bindParam(":codigo_ies_padre", $codigo_ies_padre);
            $statement2->bindParam(":cod_inst", $cod_inst);
            $statement2->bindParam(":cod_munic", $cod_munic);
            $statement2->bindParam(":telefono", $telefono);
            $statement2->bindParam(":cod_estado", $cod_estado);
    
            $result1 = $statement1->execute();
            $result2 = $statement2->execute();
    
            return ($result1 && $result2);
        } catch (PDOException $e) {
            // Manejo de errores de PDO
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function insertar_inst($nomb_inst, $cod_sector, $cod_academ) {
        try {
            $statement = $this->PDO->prepare(
                "INSERT INTO instituciones (nomb_inst, cod_sector, cod_academ) 
                VALUES (:nomb_inst, :cod_sector, :cod_academ)"
            );
            $statement->bindParam(":nomb_inst", $nomb_inst);
            $statement->bindParam(":cod_sector", $cod_sector);
            $statement->bindParam(":cod_academ", $cod_academ);

            return ($statement->execute()); 

        } catch (PDOException $e) {
            // Manejo de errores de PDO
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function search(){
        $campo=$this->PDO->real_escape_string($_POST[campo])??null;
        
        $statement = $this->PDO->prepare("SELECT 
        p.nomb_inst AS nomb_inst,
        m.nomb_munic AS nomb_munic,
        d.nomb_depto AS nomb_depto,
        nj.nomb_juridica AS nomb_juridica,
        e.nomb_estado AS nomb_estado,
        s.nomb_seccional AS nomb_seccional,
        aa.nomb_admon AS nomb_admon,
        nc.nomb_norma AS nomb_norma,
        sec.nomb_sector AS nomb_sector,
        ca.nomb_academ AS nomb_academ,
        i.cod_inst,
        i.cod_munic,
        i.telefono,
        i.direccion,
        i.norma,
        i.fecha_creacion,
        i.programas_vigente,
        i.acreditada,
        i.fecha_acreditacion,
        i.resolucion_acreditacion,
        i.vigencia,
        i.nit,
        i.pagina_web,
        i.codigo_ies_padre
        FROM inst_por_municipio i
        JOIN instituciones p ON p.codigo_ies_padre = i.codigo_ies_padre
        JOIN municipio m ON m.cod_munic = i.cod_munic
        JOIN departamento d ON d.cod_depto = m.cod_depto
        JOIN naturaleza_juridica nj ON nj.cod_juridica = i.cod_juridica
        JOIN estado e ON e.cod_estado = i.cod_estado
        JOIN seccional s ON s.cod_seccional = i.cod_seccional
        JOIN acto_admon aa ON aa.cod_admon = i.cod_admon
        JOIN norma_creacion nc ON nc.cod_norma = i.cod_norma
        JOIN sectores sec ON sec.cod_sector = p.cod_sector
        JOIN caracter_academico ca ON ca.cod_academ = p.cod_academ
        ORDER BY i.cod_inst;
        ");
        return ($statement->execute()) ? $statement->fetchAll() : false;
}
    public function index() {
        $statement = $this->PDO->prepare("SELECT 
        p.nomb_inst AS nomb_inst,
        m.nomb_munic AS nomb_munic,
        d.nomb_depto AS nomb_depto,
        nj.nomb_juridica AS nomb_juridica,
        e.nomb_estado AS nomb_estado,
        s.nomb_seccional AS nomb_seccional,
        aa.nomb_admon AS nomb_admon,
        nc.nomb_norma AS nomb_norma,
        sec.nomb_sector AS nomb_sector,
        ca.nomb_academ AS nomb_academ,
        i.cod_inst,
        i.cod_munic,
        i.telefono,
        i.direccion,
        i.norma,
        i.fecha_creacion,
        i.programas_vigente,
        i.acreditada,
        i.fecha_acreditacion,
        i.resolucion_acreditacion,
        i.vigencia,
        i.nit,
        i.pagina_web,
        i.codigo_ies_padre
        FROM inst_por_municipio i
        JOIN instituciones p ON p.codigo_ies_padre = i.codigo_ies_padre
        JOIN municipio m ON m.cod_munic = i.cod_munic
        JOIN departamento d ON d.cod_depto = m.cod_depto
        JOIN naturaleza_juridica nj ON nj.cod_juridica = i.cod_juridica
        JOIN estado e ON e.cod_estado = i.cod_estado
        JOIN seccional s ON s.cod_seccional = i.cod_seccional
        JOIN acto_admon aa ON aa.cod_admon = i.cod_admon
        JOIN norma_creacion nc ON nc.cod_norma = i.cod_norma
        JOIN sectores sec ON sec.cod_sector = p.cod_sector
        JOIN caracter_academico ca ON ca.cod_academ = p.cod_academ
        ORDER BY CAST(i.cod_inst AS INTEGER)
        ");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function index_inst(){
        $statement=$this->PDO->prepare("SELECT codigo_ies_padre,nomb_inst,nomb_academ,nomb_sector from 
        instituciones join caracter_academico using(cod_academ) join sectores using(cod_sector)");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    public function reporte($cod_admon){
        $statement = $this->PDO->prepare("SELECT 
        cod_inst,
        telefono,
        direccion,
        nomb_inst,
        nomb_admon,
        nomb_depto,
        nomb_munic,
        nomb_estado,
        nomb_sector,
        im.cod_munic
        from inst_por_municipio im
        join instituciones i on i.codigo_ies_padre=im.codigo_ies_padre
        join municipio  m on m.cod_munic=im.cod_munic
        join departamento d on d.cod_depto=m.cod_depto
        join acto_admon a on a.cod_admon=im.cod_admon
        join sectores s on s.cod_sector= i.cod_sector
        join estado e ON e.cod_estado = im.cod_estado
        where a.cod_admon=:cod_admon order by cod_inst");
        $statement->bindParam(":cod_admon", $cod_admon);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

   public function cobertura($cod_depto,$cod_munic){
    if($cod_munic==null){
    $statement = $this->PDO->prepare("SELECT im.cod_munic,acreditada,nomb_estado,nomb_academ,nomb_sector,
    im.codigo_ies_padre,cod_inst,telefono,direccion,nomb_inst,nomb_depto,nomb_munic 
    from inst_por_municipio im
    join instituciones i on i.codigo_ies_padre=im.codigo_ies_padre
    join municipio on municipio.cod_munic=im.cod_munic
    join departamento  on departamento.cod_depto=municipio.cod_depto
    join sectores s on s.cod_sector= i.cod_sector
    join caracter_academico ca ON ca.cod_academ = i.cod_academ
    join estado e ON e.cod_estado = im.cod_estado
    where departamento.cod_depto=:cod_depto order by cod_inst");
    $statement->bindParam(":cod_depto", $cod_depto);
    return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    else{
    $statement = $this->PDO->prepare("SELECT im.cod_munic,acreditada,nomb_estado,nomb_academ,nomb_sector,
    im.codigo_ies_padre,cod_inst,telefono,direccion,nomb_inst,nomb_depto,nomb_munic 
    from inst_por_municipio im
    join instituciones i on i.codigo_ies_padre=im.codigo_ies_padre
    join municipio on municipio.cod_munic=im.cod_munic
    join departamento  on departamento.cod_depto=municipio.cod_depto
    join sectores s on s.cod_sector= i.cod_sector
    join caracter_academico ca ON ca.cod_academ = i.cod_academ
    join estado e ON e.cod_estado = im.cod_estado
    where departamento.cod_depto=:cod_depto and municipio.cod_munic=:cod_munic order by cod_inst");
    $statement->bindParam(":cod_depto", $cod_depto);
    $statement->bindParam(":cod_munic", $cod_munic);
    return ($statement->execute()) ? $statement->fetchAll() : false;}
   }

   public function show($cod_inst,$cod_munic) {
        $statement = $this->PDO->prepare("SELECT 
        (SELECT nomb_inst FROM instituciones p WHERE p.codigo_ies_padre = i.codigo_ies_padre),
        (SELECT nomb_munic FROM municipio m WHERE m.cod_munic = i.cod_munic),
        (SELECT nomb_depto FROM departamento WHERE departamento.cod_depto = (SELECT cod_depto FROM municipio m WHERE m.cod_munic = i.cod_munic)),
        (SELECT nomb_juridica FROM naturaleza_juridica n WHERE n.cod_juridica = i.cod_juridica),
        (SELECT nomb_estado FROM estado e WHERE e.cod_estado = i.cod_estado),
        (SELECT nomb_seccional FROM seccional s WHERE s.cod_seccional = i.cod_seccional),
        (SELECT nomb_admon FROM acto_admon a WHERE a.cod_admon = i.cod_admon),
        (SELECT nomb_norma FROM norma_creacion nc WHERE nc.cod_norma = i.cod_norma),
        (SELECT nomb_sector FROM sectores s WHERE s.cod_sector = (SELECT cod_sector FROM instituciones p WHERE p.codigo_ies_padre = i.codigo_ies_padre)),
        (SELECT nomb_academ FROM caracter_academico ca WHERE ca.cod_academ = (SELECT cod_academ FROM instituciones p WHERE p.codigo_ies_padre = i.codigo_ies_padre)),
        cod_inst,
        cod_munic,
        telefono,
        direccion,
        norma,
        fecha_creacion,
        programas_vigente,
        acreditada,
        fecha_acreditacion,
        resolucion_acreditacion,
        vigencia,
        nit,
        pagina_web,
        codigo_ies_padre 
        FROM inst_por_municipio i
        WHERE cod_inst = :cod_inst AND cod_munic = :cod_munic
        LIMIT 1");
        $statement->bindParam(":cod_inst", $cod_inst);
        $statement->bindParam(":cod_munic", $cod_munic);
        return ($statement->execute()) ? $statement->fetch() : false;
    }



    public function update($cod_inst, $cod_munic, $telefono, $direccion,$cod_estado,$programas_vigente,
        $acreditada,$fecha_acreditacion,$vigencia,$resolucion_acreditacion,$cod_juridica,$cod_seccional) {
        if($acreditada=='N'){
            $statement = $this->PDO->prepare(
            "UPDATE inst_por_municipio 
            SET telefono=:telefono, 
                direccion=:direccion,
                cod_estado=:cod_estado,
                programas_vigente=:programas_vigente,
                acreditada=:acreditada,
                fecha_acreditacion=null,
                vigencia=null,
                resolucion_acreditacion=null,
                cod_juridica=:cod_juridica,
                cod_seccional=:cod_seccional
            WHERE cod_inst=:cod_inst AND cod_munic=:cod_munic");
            $statement->bindParam(":cod_inst", $cod_inst);
            $statement->bindParam(":cod_munic", $cod_munic);
            $statement->bindParam(":telefono", $telefono);
            $statement->bindParam(":direccion", $direccion);
            $statement->bindParam(":cod_estado", $cod_estado);
            $statement->bindParam(":programas_vigente", $programas_vigente);
            $statement->bindParam(":acreditada", $acreditada);
            $statement->bindParam(":cod_juridica", $cod_juridica);
            $statement->bindParam(":cod_seccional", $cod_seccional);
            return ($statement->execute()) ? true : false;
        }
        else{
            $statement = $this->PDO->prepare(
            "UPDATE inst_por_municipio 
            SET telefono=:telefono, 
                direccion=:direccion,
                cod_estado=:cod_estado,
                programas_vigente=:programas_vigente,
                acreditada=:acreditada,
                fecha_acreditacion=:fecha_acreditacion,
                vigencia=:vigencia,
                resolucion_acreditacion=:resolucion_acreditacion,
                cod_juridica=:cod_juridica,
                cod_seccional=:cod_seccional
            WHERE cod_inst=:cod_inst AND cod_munic=:cod_munic");
            $statement->bindParam(":cod_inst", $cod_inst);
            $statement->bindParam(":cod_munic", $cod_munic);
            $statement->bindParam(":telefono", $telefono);
            $statement->bindParam(":direccion", $direccion);
            $statement->bindParam(":cod_estado", $cod_estado);
            $statement->bindParam(":programas_vigente", $programas_vigente);
            $statement->bindParam(":acreditada", $acreditada);
            $statement->bindParam(":fecha_acreditacion", $fecha_acreditacion);
            $statement->bindParam(":vigencia", $vigencia);
            $statement->bindParam(":resolucion_acreditacion", $resolucion_acreditacion);
            $statement->bindParam(":cod_juridica", $cod_juridica);
            $statement->bindParam(":cod_seccional", $cod_seccional);
            return ($statement->execute()) ? true : false;
            }
    }

    public function instituciones() {
        $statement = $this->PDO->prepare("SELECT codigo_ies_padre , nomb_inst FROM instituciones
        order by nomb_inst");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function departamentos() {
        $statement = $this->PDO->prepare("SELECT cod_depto, nomb_depto from departamento order by nomb_depto");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function departamentos_por_instituciones() {
        $statement = $this->PDO->prepare("SELECT i.codigo_ies_padre , d.cod_depto, nomb_depto FROM departamento d inner join 
        municipio m on m.cod_depto=d.cod_depto inner join inst_por_municipio i on i.cod_munic=m.cod_munic inner join 
        instituciones ins on i.codigo_ies_padre=ins.codigo_ies_padre  group by i.codigo_ies_padre, d.cod_depto, nomb_depto
        ");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function municipios_de_departamentos_por_instituciones() {
        $statement = $this->PDO->prepare("SELECT i.codigo_ies_padre as cod_ies, d.cod_depto, m.cod_munic, nomb_munic FROM departamento d inner join 
        municipio m on m.cod_depto=d.cod_depto inner join inst_por_municipio i on i.cod_munic=m.cod_munic inner join 
        instituciones ins on i.codigo_ies_padre=ins.codigo_ies_padre order by cod_inst
        ");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
        
    public function stats_programas($cod_inst,$cod_depto,$cod_munic){
        if($cod_munic==null){
        $statement = $this->PDO->prepare("SELECT nomb_munic, programas_vigente from municipio m inner join
        departamento d on m.cod_depto=d.cod_depto inner join inst_por_municipio i on i.cod_munic=m.cod_munic
        inner join
        instituciones ins on ins.codigo_ies_padre=i.codigo_ies_padre 
        where i.codigo_ies_padre=:cod_inst and
        d.cod_depto=:cod_depto and
        programas_vigente IS NOT NULL");
        $statement->bindParam(":cod_inst", $cod_inst);
        $statement->bindParam(":cod_depto", $cod_depto);
        return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        else{
        $statement = $this->PDO->prepare("SELECT concat(nomb_inst, ' / ',nomb_depto) as nombre_inst_dept,
        nomb_munic, programas_vigente
        from municipio m inner join departamento d on m.cod_depto=d.cod_depto inner join inst_por_municipio i on
        i.cod_munic=m.cod_munic
        inner join instituciones ins on ins.codigo_ies_padre=i.codigo_ies_padre
        where i.codigo_ies_padre=:cod_inst and 
        d.cod_depto=:cod_depto and 
        m.cod_munic=:cod_munic and
        programas_vigente IS NOT NULL");
        $statement->bindParam(":cod_inst", $cod_inst);
        $statement->bindParam(":cod_depto", $cod_depto);
        $statement->bindParam(":cod_munic", $cod_munic);
        return ($statement->execute()) ? $statement->fetch() : false;
        }
    }

    public function stats_programas_nombre_inst_dept($cod_inst,$cod_depto){
        $statement = $this->PDO->prepare("SELECT concat(nomb_inst, ' / ',nomb_depto) as nombre_inst_dept 
        from municipio m inner join
        departamento d on m.cod_depto=d.cod_depto inner join inst_por_municipio i on i.cod_munic=m.cod_munic
        inner join
        instituciones ins on ins.codigo_ies_padre=i.codigo_ies_padre where i.codigo_ies_padre=:cod_inst and
        d.cod_depto=:cod_depto group by nomb_inst, nomb_depto");
        $statement->bindParam(":cod_inst", $cod_inst);
        $statement->bindParam(":cod_depto", $cod_depto);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
        
    public function stats_departamentos($cod_depto) {
        $statement = $this->PDO->prepare("SELECT nomb_depto, nomb_munic, count(*) as cantidad from
        departamento
        join municipio on departamento.cod_depto=municipio.cod_depto
        join inst_por_municipio on inst_por_municipio.cod_munic=municipio.cod_munic where
        departamento.cod_depto=:cod_depto group by nomb_depto, nomb_munic");
        $statement->bindParam(":cod_depto", $cod_depto);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function stats_departamento_nombre_y_total($cod_depto) {
        $statement = $this->PDO->prepare("SELECT nomb_depto, sum(cantidad) as total from 
        (SELECT nomb_depto, nomb_munic, count(*) as cantidad from
        departamento d
        join municipio m on d.cod_depto=m.cod_depto
        join inst_por_municipio ins on ins.cod_munic=m.cod_munic 
        where d.cod_depto=:cod_depto
        group by nomb_depto, nomb_munic order by nomb_depto) as subconsulta group by nomb_depto");
        $statement->bindParam(":cod_depto", $cod_depto);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function stats_normas() {
        $statement = $this->PDO->prepare("SELECT nomb_norma, count(codigo_ies_padre) as cantidad from inst_por_municipio i
        inner join norma_creacion n on n.cod_norma=i.cod_norma group by nomb_norma,i.cod_norma
        ");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function logs_instituciones() {
        $statement = $this->PDO->prepare("SELECT i.codigo_ies_padre, cod_inst, nomb_inst, telefono, operacion, changed_on, user_id from inst_auditoria_in 
        i inner join inst_municipio_auditoria_in ins on i.codigo_ies_padre=ins.codigo_ies_padre");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }


    

}


?>