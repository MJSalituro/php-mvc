<?php

class model
{
    // Las clases que hereden de Model pueden acceder a la variable
    protected $db;

    public function __construct()
    {
        $this->db = new Mysqli(HOST, USER, PASSWORD, DB_NAME);
        mysqli_set_charset($this->db, "utf8");
    }

    //Finaliza la conexion
    public function __destruct()
    {
        $this->db->close();
    }
}