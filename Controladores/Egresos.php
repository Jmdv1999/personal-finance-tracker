<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, Content-Type, Accept, Access-Control-Request-Method");
class Egresos extends Controlador
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

        $data = $this->modelo->NuevoEgreso($monto, $concepto);
        if ($data == "ok") {
            $msg = array('msg' => 'Ingreso Registrado', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al Registrar', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function Listar()
    {
        $data = $this->modelo->getEgresos();
        for ($i = 0; $i < count($data); $i++){
            $data[$i]['acciones'] = '
                    <div>
                        <button onclick="btnEliminarEgreso('.$data[$i]['id'].');" class="btn text-white btn-danger"><i class="fa fa-trash"></i></button>
                    
                    </div>';
            }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function Eliminar($id){
        $data = $this->modelo->EliminarEgresos($id);
        if ($data == "ok") {
            $msg = array('msg' => 'Eliminado', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al Eliminar', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function Salir()
    {
        session_destroy();
        header("location: " . base_url);
    }
}
