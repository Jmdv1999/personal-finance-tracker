<?php
class DeudasModel extends Query{
    public function __construct(){
        parent::__construct();
    }
    public function NuevaDeuda(float $monto, string $concepto){
        $this->monto = $monto;
        $this->concepto = $concepto;

        $sql = "INSERT INTO deudas(monto, concepto) VALUES (?,?)";

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
    public function getDeudas()
    {
        $sql = "SELECT * FROM deudas ORDER BY id DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getDeuda($id)
    {
        $sql = "SELECT * FROM deudas WHERE id = $id ORDER BY id DESC";
        $data = $this->select($sql);
        return $data;
    }
    public function EliminarDeudas(int $id){
        $this->id = $id;
        $sql = "DELETE FROM deudas WHERE id = ?";
        $datos = array($this->id);
        $data = $this->guardar($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function ModificarDeuda($monto, $id){
        $this->monto = $monto;
        $this->id = $id;
        $sql = "UPDATE deudas SET monto = ? WHERE id = ?";
        $datos = $datos = array($this->monto, $this->id);
        $data = $this->guardar($sql, $datos);   
        if($data == 1){
            $res = "ok";
        }
        else{
            $res = "error";
        }
        return $res;
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
    public function MontoDeuda($id){
        $sql = "SELECT monto, concepto FROM deudas WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
}
