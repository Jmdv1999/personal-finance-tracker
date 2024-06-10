<?php
class Inicio extends Controlador
{
    public function __construct()
    {
        session_start();

        parent::__construct();
    }
    public function index()
    {
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        $data['ingresos'] = $this->modelo->TotalIngresos();
        $data['egresos'] = $this->modelo->TotalEgresos();
        $data["deudas"] = $this->modelo->TotalDeudas();
        
        $data['ingresosmensual'] = $this->modelo->IngresosPorMes();
        $data['egresosmensual'] = $this->modelo->EgresosPorMes();
        $this->vista->getView($this, "index", $data);
    }

   

    public function Salir()
    {
        session_destroy();
        header("location: " . base_url);
    }
}
