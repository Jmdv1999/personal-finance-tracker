<?php
class EgresosModel extends Query{
    public function __construct(){
        parent::__construct();
    }
    public function NuevoEgreso(float $monto, string $concepto){
        $this->monto = $monto;
        $this->concepto = $concepto;

        $sql = "INSERT INTO egresos(monto, concepto) VALUES (?,?)";

        $datos = array($this->monto, $this->concepto);

        $data = $this->guardar($sql, $datos);

        if($data == 1){
            $res = "ok";
        }
        else{
            $res = "error";
        }
        return $res;
    }
    public function getEgresos()
    {
        $sql = "SELECT * FROM egresos ORDER BY id DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function EliminarEgresos(int $id){
        $this->id = $id;
        $sql = "DELETE FROM egresos WHERE id = ?";
        $datos = array($this->id);
        $data = $this->guardar($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
}
