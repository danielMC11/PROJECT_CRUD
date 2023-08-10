<?php
class RectoriaController {
    private $model;

    public function __construct() {
        require_once "/proyecto_crud/model/RectoriaModel.php";
        $this->model = new RectoriaModel();
    }

    public function insertar($cod_inst_cod_munic, $nomb_directivo, $apell_directivo,
    $cod_cargo,$fecha_inicio,$fecha_final){
        $cod_directivo = $this->model->insertar($nomb_directivo,$apell_directivo);
    if ($cod_directivo){
        $array = explode(" ", $cod_inst_cod_munic);
        $cod_inst = $array[0];
        $cod_munic = $array[1];
        $result = $this->model->insertar_rec($cod_directivo,$cod_inst, $cod_munic, 
        $cod_cargo,$fecha_inicio,$fecha_final);
        if($result){
        return header("Location: index.php");
        }
    }
    }

    public function show($cod_munic, $cod_inst, $cod_directivo, $cod_cargo) {
        $result = $this->model->show($cod_munic, $cod_inst, $cod_directivo, $cod_cargo);
        if ($result !== false) {
            return $result;
        } else {
            return ;
        }
    }

    public function index() {
        return ($this->model->index()) ? $this->model->index() : false;
    }

    public function update($fecha_inicio, $fecha_final, $cod_directivo, $cod_inst, $cod_munic, $cod_cargo) {
        $result = $this->model->update($fecha_inicio, $fecha_final, $cod_directivo, $cod_inst, $cod_munic, $cod_cargo);
        if ($result != false) {
            return header("Location: show.php?cod_munic=".$cod_munic . "&cod_inst=" 
            .$cod_inst . "&cod_directivo=" .$cod_directivo . "&cod_cargo=" . $cod_cargo);
        } else {
            return header("Location: index.php");
        }
    }

    public function reporte_dir($codigo_ies_padre,$fecha_inicio,$fecha_final){
        return ($this->model->reporte_dir($codigo_ies_padre,$fecha_inicio,$fecha_final)) ? $this->model->reporte_dir($codigo_ies_padre,$fecha_inicio,$fecha_final): false;
    }

    public function instituciones(){
        return ($this->model->instituciones()) ? $this->model->instituciones(): false;
    }

    public function cargos(){
        return ($this->model->cargos()) ? $this->model->cargos(): false;
    }

    public function acto_nombramiento(){
        return ($this->model->acto_nombramiento()) ? $this->model->acto_nombramiento(): false;
    }

    public function inst_munic(){
        return ($this->model->inst_munic()) ? $this->model->inst_munic(): false;
    }

    public function logs_rectoria() {
        return ($this->model->logs_rectoria()) ? $this->model->logs_rectoria() : false;
    }
}

?>