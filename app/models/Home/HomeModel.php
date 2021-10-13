<?php

class HomeModel extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addCliente($params)
    {
        $CI = $params['CI'];
        $Nombre = $params['Nombre'];
        $Pass = $params['Contraseña'];
        $Email = $params['Email'];
        $Direc = $params['Dirección'];
        $sql = "INSERT INTO clientes (CI, Nombre, contraseña, Direccion, email) VALUES ('{$CI}', '{$Nombre}', '{$Pass}', '{$Direc}', '{$Email}')";
        return $this->db->query($sql);
    }

    public function affected_rows()
    {
        return $this->db->affected_rows;
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