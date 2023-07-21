<!--Se organizo las consultas -->
<?php
require_once "/opt/lampp/htdocs/proyecto_crud/config/db.php";

class RectoriaModel {
    private $PDO;

    public function __construct() {
        $db = new db();
        $this->PDO = $db->conexion();
    }

    public function insertar($cod_directivo,$nomb_directivo,$apell_directivo,$cod_inst, $cod_munic,
        $cod_cargo,$fecha_inicio,$fecha_final){
            $statement1 = $this->PDO->prepare(
                "INSERT INTO directivos (cod_directivo, nomb_directivo,apell_directivo) 
                VALUES (:cod_directivo, :nomb_directivo, :apell_directivo);");
                $statement1->bindParam(":cod_directivo", $cod_directivo);
                $statement1->bindParam(":nomb_directivo", $nomb_directivo);
                $statement1->bindParam(":apell_directivo", $apell_directivo);
            $statement2 = $this->PDO->prepare(
                    "INSERT INTO rectoria (cod_directivo, cod_inst,cod_munic, cod_cargo,fecha_inicio,fecha_final) 
                    VALUES (:cod_directivo, :cod_inst, :cod_munic, :cod_cargo,:fecha_inicio,:fecha_final)");
                $statement2->bindParam(":cod_directivo", $cod_directivo);
                $statement2->bindParam(":cod_inst", $cod_inst);
                $statement2->bindParam(":cod_munic", $cod_munic);
                $statement2->bindParam(":cod_cargo", $cod_cargo);
                $statement2->bindParam(":fecha_inicio", $fecha_inicio);
                $statement2->bindParam(":fecha_final", $fecha_final);
    
                $result1 = $statement1->execute();
                $result2 = $statement2->execute();
    
                return ($result1 && $result2);
       }

    public function show($cod_munic, $cod_inst, $cod_directivo, $cod_cargo) {
        $statement = $this->PDO->prepare(
        "SELECT 
            r.fecha_inicio,
            r.fecha_final,
            CONCAT(d.nomb_directivo, ' ', d.apell_directivo) AS nomb_directivo,
            i.nomb_inst,
            c.nomb_cargo,
            a.nomb_nombram,
            m.nomb_munic,
            r.cod_inst,
            r.cod_munic,
            r.cod_directivo,
            r.cod_cargo 
        FROM rectoria r
        JOIN directivos d ON d.cod_directivo = r.cod_directivo
        JOIN instituciones i ON i.codigo_ies_padre = (SELECT codigo_ies_padre FROM inst_por_municipio WHERE cod_inst = r.cod_inst)
        JOIN cargos c ON c.cod_cargo = r.cod_cargo
        JOIN acto_nombramiento a ON a.cod_nombram = r.cod_nombram
        JOIN municipio m ON m.cod_munic = r.cod_munic
        WHERE r.cod_munic = :cod_munic
            AND r.cod_inst = :cod_inst
            AND r.cod_directivo = :cod_directivo
            AND r.cod_cargo = :cod_cargo
        LIMIT 1
        ");
        $statement->bindParam(":cod_munic", $cod_munic);
        $statement->bindParam(":cod_inst", $cod_inst);
        $statement->bindParam(":cod_directivo", $cod_directivo);
        $statement->bindParam(":cod_cargo", $cod_cargo);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function index() {
        $statement = $this->PDO->prepare(
        "SELECT 
            r.fecha_inicio,
            r.fecha_final,
            CONCAT(d.nomb_directivo, ' ', d.apell_directivo) AS nomb_directivo,
            i.nomb_inst,
            c.nomb_cargo,
            a.nomb_nombram,
            m.nomb_munic,
            r.cod_inst,
            r.cod_munic,
            r.cod_directivo,
            r.cod_cargo 
        FROM rectoria r
        JOIN directivos d ON d.cod_directivo = r.cod_directivo
        JOIN instituciones i ON i.codigo_ies_padre = (SELECT codigo_ies_padre FROM inst_por_municipio WHERE cod_inst = r.cod_inst)
        JOIN cargos c ON c.cod_cargo = r.cod_cargo
        JOIN acto_nombramiento a ON a.cod_nombram = r.cod_nombram
        JOIN municipio m ON m.cod_munic = r.cod_munic
        ORDER BY r.cod_inst
        ");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function update($fecha_inicio, $fecha_final, $cod_directivo, $cod_inst, $cod_munic, $cod_cargo) {
        
        $statement = $this->PDO->prepare("UPDATE rectoria SET fecha_inicio=:fecha_inicio, 
        fecha_final=:fecha_final WHERE cod_munic=:cod_munic AND 
        cod_directivo=:cod_directivo AND cod_inst=:cod_inst AND cod_cargo=:cod_cargo");
        $statement->bindParam(":fecha_inicio", $fecha_inicio);
        $statement->bindParam(":fecha_final", $fecha_final);
        $statement->bindParam(":cod_directivo", $cod_directivo);
        $statement->bindParam(":cod_inst", $cod_inst);
        $statement->bindParam(":cod_munic", $cod_munic);
        $statement->bindParam(":cod_cargo", $cod_cargo);
        return ($statement->execute()) ? true : false; 
    }



    public function reporte_dir($codigo_ies_padre,$fecha_inicio,$fecha_final){
        $statement = $this->PDO->prepare(
        "SELECT 
            r.cod_directivo,
            concat(nomb_directivo,' ',apell_directivo) as nomb_directivo,
            nomb_inst,
            nomb_cargo,
            nomb_nombram,
            fecha_inicio,
            fecha_final,
            r.cod_munic,
            r.cod_inst,
            r.cod_directivo,
            r.cod_cargo,
            m.nomb_munic

        from rectoria r
        join directivos on directivos.cod_directivo=r.cod_directivo
        join cargos on cargos.cod_cargo=r.cod_cargo
        join acto_nombramiento on acto_nombramiento.cod_nombram=r.cod_nombram
        join inst_por_municipio on inst_por_municipio.cod_inst=r.cod_inst
        join instituciones on instituciones.codigo_ies_padre=inst_por_municipio.codigo_ies_padre
        join municipio m on m.cod_munic=r.cod_munic
        where instituciones.codigo_ies_padre=:codigo_ies_padre and fecha_inicio>=:fecha_inicio 
        and fecha_final<=:fecha_final");
        $statement->bindParam(":codigo_ies_padre", $codigo_ies_padre);
        $statement->bindParam(":fecha_inicio", $fecha_inicio);
        $statement->bindParam(":fecha_final", $fecha_final);
        return ($statement->execute()) ? $statement->fetchAll() : false;
       }

       public function logs_rectoria() {
        $statement = $this->PDO->prepare("SELECT * from rectoria_auditoria_mod");
        return ($statement->execute()) ? $statement->fetchAll() : false;
        }

}


?>