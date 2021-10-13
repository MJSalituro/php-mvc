<?php

require_once ROOT . FOLDER_PATH . 'app/models/Plato/PlatoModel.php';
require_once LIBS_ROUTE . 'session.php';

class PlatoController extends controller
{
    private $model;

    public function __construct()
    {
        $this->model = new PlatoModel();
        $this->session = new Session();
        $this->session->init();
        if($this->session->getStatus() === 1 || empty($this->session->get('cedula')))
            exit('Acceso Denegado');
        $this->model = new PlatoModel();
    }

    public function exec()
    {
        $this->PlatosList();
    }

    public function PlatosList()
    {
        $platos = $this->model->PlatosList();

        $params = array('platos' => $platos, 'show_platos_list' => true, 'nombre' => $this->session->get('nombre'));
        return $this->render(__CLASS__, $params);
    }

    public function PlatoList($nombre)
    {
        $nombre = urldecode($nombre);
        
        $nombre = str_replace("%20", " ", $nombre);
       
        $result = $this->model->PlatoList($nombre);

        if(!$result->num_rows)
            $info_plato = array();
        else
            $info_plato = $result->fetch_object();

            $params = array('info_plato' => $info_plato, 'show_edit_form' => true);
            return $this->render(__CLASS__, $params);
    }

    public function updatePlato($request_params)
    {
        $result = $this->model->updateplato($request_params);

        $this->PlatosList();
    }
   
    public function addFotoPlato($request_params)
    {
       
        $this->model->addImagenPlato($request_params['Imagen'], $request_params['NombrePlato']);
        $this->PlatoFotos($request_params['NombrePlato']);
    }

    public function removeFotoPlato($request_params)
    {
        $params = explode('&', str_replace("%20", " ", $request_params));
        $nombrePlato = $params[0];
        $nombreFoto = $params[1];        
        $this->model->removeFotoPlato($nombreFoto);
        $this->PlatoFotos($nombrePlato);
    }
    
    //Renderiza el formulario del plato con edición de fotos
    public function PlatoFotos($nombre)
    {
        $nombre = urldecode($nombre);
        
        $nombre = str_replace("%20", " ", $nombre);
       
        $result = $this->model->PlatoList($nombre);

        if(!$result->num_rows)
            $info_plato = array();
        else
            $info_plato = $result->fetch_object();
            
        $resultFotos = $this->model->PlatoFotos($nombre);
        

            $params = array('info_plato' => $info_plato, 'show_edit_form_foto' => true, 'info_fotos' => $resultFotos);
            return $this->render(__CLASS__, $params);
    }
   
    public function addPlato($request_params)
    {
        $result = $this->model->addPlato($request_params);
       
        $this->PlatosList();
    }
    public function removePlato($nombre)
    {
        $this->model->removePlato($nombre);

        return $this->PlatosList();
    }
    public function formulario()
    {
        $params = array ('show_formulario'=> true);
        $this-> render(__CLASS__, $params);
    }
}