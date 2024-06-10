<?php
    class UsuariosModel extends Query{
        private $usuario, $nombre, $clave, $id_caja, $id, $estado;
        public function __construct(){
            parent::__construct();
        }
        public function getUsuario(string $usuario, string $clave){
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
            $data = $this->select($sql);
            return $data;
        }

        public function getPass(string $clave, int $id){
            $sql = "SELECT * FROM usuarios WHERE clave = '$clave' AND id = $id";
            $data = $this->select($sql); 
            return $data;
        }
        public function modificarPass(string $clave, int $id){
            $sql = "UPDATE usuarios SET clave = ? WHERE id = ?";
            $datos = array($clave, $id);
            $data = $this->guardar($sql, $datos);
            return $data;
        }

    }
