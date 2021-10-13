<?php

class MainClienteModel extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listarInfoPlatos()
    {
        $sql = "SELECT * FROM plato";
        return $this->db->query($sql);
    }

    public function listarFotosPlatos($nombre)
    {
        $sql = "SELECT Foto FROM fotoplato where Nombre = '{$nombre}'";
        return $this->db->query($sql);
    }
}