<?php

class LoginModel extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signin($cedula)
    {
        $sql = "SELECT CI, contraseña, Nombre FROM empleado WHERE CI='{$cedula}'";
        $result = $this->db->query($sql);
        if($result->num_rows)
            return $result;
        else{
            $sql = "SELECT CI, contraseña, Nombre FROM clientes WHERE CI='{$cedula}'";
            return $this->db->query($sql);
        }
    }

    public function getTipoUsuario($cedula)
    {
        $sql = "SELECT CI FROM empleado, gerente WHERE CI='{$cedula}' and CI=CIempleado";
        $result = $this->db->query($sql);
        if($result ->num_rows)
        return "Gerente";
        else{
                $sql = "SELECT CI FROM empleado, chef WHERE CI='{$cedula}' and CI=CIempleado";
                $result = $this->db->query($sql);
            if($result ->num_rows)
            return "Chef";
        
            else{
                $sql = "SELECT CI FROM empleado, cocinero WHERE CI='{$cedula}' and CI=CIempleado";
                $result = $this->db->query($sql);
            if($result ->num_rows)
            return "Cocinero";
            
            else{
                $sql = "SELECT CI FROM empleado, administrativo WHERE CI='{$cedula}' and CI=CIempleado";
                $result = $this->db->query($sql);
                if($result ->num_rows)
            return "Administrativo";
            
            else{
                $sql = "SELECT CI FROM empleado, mesero WHERE CI='{$cedula}' and CI=CIempleado";
                $result = $this->db->query($sql);
                if($result ->num_rows)
                return "Mesero";
            
            else{
                $sql = "SELECT CI FROM empleado, recepcionista WHERE CI='{$cedula}' and CI=CIempleado";
                $result = $this->db->query($sql);
                if($result ->num_rows)
                return "Recepcionista";
        else{
                $sql = "SELECT CI FROM clientes WHERE CI='{$cedula}'";
                $result = $this->db->query($sql);
                if($result ->num_rows)
                return "Cliente";
                }
            }
        }
    }
}
        }
    }
}
