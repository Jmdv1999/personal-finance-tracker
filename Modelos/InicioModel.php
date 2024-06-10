<?php
    class InicioModel extends Query{
        public function __construct(){
            parent::__construct();
        }
        public function TotalIngresos(){
            $sql = "SELECT SUM(monto) as total, COUNT(id) AS cuenta FROM ingresos";
            $data = $this->select($sql); 
            return $data;
        }
        public function TotalEgresos(){
            $sql = "SELECT SUM(monto) as total, COUNT(id) AS cuenta FROM egresos";
            $data = $this->select($sql); 
            return $data;
        }
        public function TotalDeudas(){
            $sql = "SELECT SUM(monto) as total, COUNT(id) AS cuenta FROM deudas";
            $data = $this->select($sql); 
            return $data;
        }
        public function IngresosPorMes(){
            $sql = "SELECT CONCAT(MONTH(i.fecha)) mes, COUNT(i.id) AS total_elementos, SUM(monto) AS ingresos_totales FROM ingresos i GROUP BY mes";
            $data = $this->selectALL($sql);
            return $data;
        }
        
        public function EgresosPorMes(){
            $sql = "SELECT CONCAT(MONTH(i.fecha)) mes, COUNT(i.id) AS total_elementos, SUM(monto) AS egresos_totales FROM egresos i GROUP BY mes";
            $data = $this->selectALL($sql);
            return $data;
        }
    }
?>