<?php

class PlatoModel extends model 
{
    public function __construct()
    {
        parent :: __construct();
    }


    public function PlatosList()
    {
        $sql = 'SELECT * FROM plato';
        return $this->db->query($sql);
    }

    public function PlatoList($Nombre)
    {
        $Nombre = urldecode($Nombre);
        $Nombre = str_replace("%C3%91", "ñ", $Nombre);
        $sql = "SELECT * FROM plato WHERE Nombre ='{$Nombre}'";
        return $this->db->query($sql);
    }

    public function PlatoFotos($Nombre)
    {
        $Nombre = urldecode($Nombre);
        $Nombre = str_replace("%C3%91", "ñ", $Nombre);
        $sql = "SELECT * FROM fotoplato WHERE Nombre ='{$Nombre}'";
        return $this->db->query($sql);
    }
    
    public function addPlato($params)
    {
       
        $nombre = $params['Nombre'];
        $precio = $params['Precio'];
        $descripcion = $params['Descripcion'];
        $sql = "INSERT INTO plato (Nombre,precio,descripcion) VALUES ('$nombre','$precio','$descripcion')";
        if($this->db->query($sql))
          return $this->addImagenPlato($params['Imagen'], $nombre);
    }

    public function addImagenPlato($params, $nombrePlato)
    {
        
        if($params['size'] < 5000000){
            if($params['type'] == 'image/jpg' || $params['type'] == 'image/png' ||
            $params['type'] == 'image/jpeg' || $params['type'] == 'image/gif'){


        
        //mueve la imagen de la carpeta temporal del servidor a la carpeta de destino
        move_uploaded_file($params['tmp_name'], PATH_UPLOAD_IMAGES.$params['name']);
        $nombreImagen =$params['name'];
        $sql = "INSERT INTO fotoplato (Nombre, Foto) VALUES ('$nombrePlato', '$nombreImagen')"; 
        return $this->db->query($sql);
            }    
        }
}

    public function removeFotoPlato($nombreFoto){
        
        $nombreFoto = urldecode($nombreFoto);
        
        $nombreFoto = str_replace("%20", " ", $nombreFoto);
        $nombreFoto = str_replace("%C3%B1", "ñ", $nombreFoto);
        $nombreFoto = str_replace("%C3%91", "ñ", $nombreFoto);
        
        $sql = "DELETE FROM fotoplato WHERE Foto='{$nombreFoto}'";
        return $this->db->query($sql);

    }

    public function updateplato($params)  
    {
        $nombre = $params['Nombre'];
        $precio = $params['Precio'];
        $descripcion = $params['Descripcion'];

            $sql = "UPDATE plato SET Descripcion='{$descripcion}', Precio='{$precio}', Nombre='{$nombre}' WHERE Nombre='{$nombre}' ";
            return $this->db->query($sql);
    }

    public function removePlato($nombre)
    {
        $nombre = urldecode($nombre);
        
        $nombre = str_replace("%20", " ", $nombre);
        $nombre = str_replace("%C3%B1", "ñ", $nombre);
        $nombre = str_replace("%C3%91", "ñ", $nombre);

        //Elimina las fotos del plato
        $sql = "DELETE FROM fotoplato WHERE Nombre='{$nombre}'";
       
        $this->db->query($sql);

        $sql ="DELETE FROM plato WHERE Nombre='{$nombre}'";
       
        return $this->db->query($sql);
    }
}