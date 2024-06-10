<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, Content-Type, Accept, Access-Control-Request-Method");
class Deudas extends Controlador
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
        $this->vista->getView($this, "index");
    }

    public function Registrar()
    {
        $monto = $_POST['monto'];
        $concepto = $_POST['concepto'];

        $data = $this->modelo->NuevaDeuda($monto, $concepto);
        if ($data == "ok") {
            $msg = array('msg' => 'Deuda Registrada', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al Registrar', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function Listar()
    {
        $data = $this->modelo->getDeudas();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '
                        <div>
                            <button onclick="btnEliminarDeuda(' . $data[$i]['id'] . ');" class="btn text-white btn-danger"><i class="fa fa-trash"></i></button>
                            <button onclick="btnPagarDeuda(' . $data[$i]['id'] . ');" class="btn text-white btn-info"><i class="fa-solid fa-money-bill"></i></button>                    
                        </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function obtenerDeuda($id){
        $data = $this->modelo->getDeuda($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }    
    public function Eliminar($id)
    {
        $data = $this->modelo->EliminarDeudas($id);
        if ($data == "ok") {
            $msg = array('msg' => 'Eliminado', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al Eliminar', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function Pagar()
    {
        $peticion = file_get_contents("php://input");
        $arreglo = json_decode($peticion, true);
        $monto = $arreglo["monto"];
        $pagar = $this->obtenerMontoDeuda($arreglo["id_deuda"]);
        if($pagar["monto"] - $monto == 0){
            $data = $this->modelo->EliminarDeudas($arreglo["id_deuda"]);
            if ($data == "ok") {
                $this->modelo->NuevoEgreso($monto, "Pago de deuda por concepto de ".$pagar["concepto"]);
                $msg = array('msg' => 'Se elimino la deuda', 'icono' => 'success');
            } else {
                $msg = array('msg' => 'Error al Eliminar', 'icono' => 'su');
            }
        }
        else if($pagar["monto"] - $monto < 0){
            $msg = array('msg' => 'El monto a pagar es mayor al total de la deuda', 'icono' => 'error');
        }
        else{
            $data = $this->modelo->ModificarDeuda($pagar["monto"] - $monto, $arreglo["id_deuda"]);
            if ($data == "ok") {
                $this->modelo->NuevoEgreso($monto, "Pago de deuda por concepto de ".$pagar["concepto"]);
                $msg = array('msg' => 'Monto de la deuda actualizado', 'icono' => 'success');
            } else {
                $msg = array('msg' => 'Error al Eliminar', 'icono' => 'error');
            }
        }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    private function obtenerMontoDeuda($id){
        $data = $this->modelo->MontoDeuda($id);
        return $data;
    }
    public function Salir()
    {
        session_destroy();
        header("location: " . base_url);
    }
}
