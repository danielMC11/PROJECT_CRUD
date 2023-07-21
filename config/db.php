<?php 
class db{
    private $host = "localhost";
    private $dbname = "proyecto";
    private $user = "postgres";
    private $pasword = "postgres";
    public function conexion(){
        try{
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $PDO = new PDO("pgsql:host=".$this->host.";port=5432;dbname=".$this->dbname, $this->user, $this->pasword, $options);
            return $PDO;
        } catch(PDOException $e) {
            echo "No se pudo conectar: " . $e->getMessage();
            return null;
        }
    }
}

?>