<?php

require_once ROOT . FOLDER_PATH . 'app/models/MainCliente/MainClienteModel.php';
require_once LIBS_ROUTE . 'session.php';

class MainClienteController extends controller
{
    private $session;

    private $model;

    public function __construct()
    {
        $this->session = new Session();
        $this->session->init();
        if($this->session->getStatus() === 1 || empty($this->session->get('cedula')))
            exit('Acceso Denegado');
        $this->model = new MainClienteModel();
    }

    public function exec()
    {
        $this->infoPlatoFotos();
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
        $params = array('info_plato' => $info_plato, 'nombre'=>$this->session->get('nombre'), 'show_menuPlatos' => true);
        $this->render(__CLASS__, $params);
    }

}