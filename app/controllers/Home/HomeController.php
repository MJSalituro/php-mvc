<?php
require_once ROOT . FOLDER_PATH . 'app/models/Home/HomeModel.php';
class HomeController extends controller
{
  private $model;
  
    public function __construct()
    {
        $this->model = new HomeModel();
    }

    //Método estandar
    public function exec()
    {
        $this->infoPlatoFotos();
    }

    public function addCliente($request_params)
    {
       $result = $this->model->addCliente($request_params);

        if($this->model->affected_rows() === 1)
        $params = array('message' => 'Cliente dado de alta de forma exitosa', 'message_type' => 'success');           

        else
        $params = array('message' => 'Error de registro', 'message_type' => 'danger');
            
            $this->render(__CLASS__, $params);
    }

    public function formularioRegistro()
    {
        $params = array('show_formulario_Registro'=> true);
        $this->render(__CLASS__, $params);
    }

    public function infoPlatoFotos()
    {
        $result = $this->model->listarInfoPlatos();
        $contador = 0;
        while($row = $result->fetch_assoc())
        {
         $info_plato[$contador][1] = $row['Nombre'];
         $info_plato[$contador][2] = $row['descripcion'];
         $fotos = $this->model->listarFotosPlatos($row['Nombre']);
         $info_plato[$contador][3] = $fotos;
         $contador++;
        }
        $params = array('info_plato' => $info_plato);
        $this->render(__CLASS__, $params);
    }

}