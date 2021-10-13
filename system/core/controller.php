<?php

abstract class controller
{
    private $view;

    //Inicializa la vista
    public function render($controller_name = '', $params = array())
    
        {
            $this->view = new view($controller_name, $params);
        }

        //Método estándar
        abstract public function exec();

}