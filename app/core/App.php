<?php

class App {
    protected $controller= 'Home'; //controller default
    protected $method = 'index'; //method default
    protected $params = []; //parameter default

    public function __construct()
    {
        $url = $this->parseURL();
        
        //controller
        if(isset($url[0]) && file_exists(__DIR__ . '/../controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once __DIR__ . '/../controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if(!empty($url)){
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }

    public function parseURL()
    {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL); //membersihkan url dari karakter aneh
            $url = explode('/', $url);
            return $url;

        }
        return[];
    }
}