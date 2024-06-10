<?php
class IngresosModel extends Query{
    public function __construct(){
        parent::__construct();
    }
    public function NuevoIngreso(float $monto, string $concepto){
        $this->monto = $monto;
        $this->concepto = $concepto;

        $sql = "INSERT INTO ingresos(monto, concepto) VALUES (?,?)";

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
    public function getIngresos()
    {
        $sql = "SELECT * FROM Ingresos ORDER BY id DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function EliminarIngresos(int $id){
        $this->id = $id;
        $sql = "DELETE FROM ingresos WHERE id = ?";
        $datos = array($this->id);
        $data = $this->guardar($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function filtrar($fecha1, $fecha2){
        $sql = "SELECT * FROM ingresos WHERE fecha BETWEEN '$fecha1' AND '$fecha2'";
        $data = $this->selectAll($sql);
        return $data;
    }
}
