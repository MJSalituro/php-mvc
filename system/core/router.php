<?php

class Router
{
    public $uri;

    public $controller;

    public $method;

    public $param;

    //Constructor
    public function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }
    //Asigna la uri completa
    public function setUri()
    {
        $this->uri = explode('/', URI);
    }

    //Asigna nombre del controlador
    public function setController()
    {
        if ($this->uri[2] === '')
        $this->controller = DEFAULT_CONTROLLER;
        else
            $this->controller = $this->uri[2];
    }
    //Asigna nombre del metodo
    public function setMethod()
    {
        if(!empty($this->uri[3]))
            $this->method = $this->uri[3];
        else
            $this->method = 'exec';
    }

    //Asigna el valor del parametro si existe segun el metodo de peticion
    public function setParam()
    {
        if (REQUEST_METHOD === 'POST'){
            $this->param = $_POST;
            //Para pasar la información de la imagen por parametro
            if(!empty($_FILES))
            $this->param += $_FILES;
    }
        else if (REQUEST_METHOD === 'GET')
            if(!empty($this->uri[4]))
                $this->param = $this->uri[4];
            else
                $this->param = '';
    }
    //getters
    public function getUri()
    {
        return $this->uri;
    }
    public function getController()
    {
        return $this->controller;
    }
    public function getMethod()
    {
        return $this->method;
    }
    public function getParam()
    {
        return $this->param;
    }
}