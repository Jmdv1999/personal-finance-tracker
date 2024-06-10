<?php
    class Home extends Controlador{
        public function __construct(){
            session_start();
            
            
            parent::__construct();
        }
        public function index(){
            if (empty($_SESSION['activo'])) {
                $this->vista->getView($this, "index");   
            }
            else{
                header("location: " . base_url."Inicio");
            }
            
        }
        public function Salir()
        {
            session_destroy();
            header("location: " . base_url);
        }
    }
?>