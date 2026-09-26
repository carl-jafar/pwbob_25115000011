<?php

class App {
    protected $controller = 'Home'; //controller default
    protected $method = 'index'; //method default
    protected $params = []; //parameter default

    public function __construct()
    {
        $url = $this->parseURL();
        $controllerPath = dirname(__DIR__) . '/controllers/';

        //controller
        if (!empty($url) && file_exists($controllerPath . $url[0] . '.php')) { //cek dulu apakah ada file di dalam folder controllers
            $this->controller = $url[0];
            unset($url[0]); //hapus elemen array ke1
        }

        require_once $controllerPath . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]); //hapus elemen array ke2
            }
        }

        //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        //jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (!isset($_GET['url']) || trim($_GET['url'], '/') === '') {
            return [];
        }

        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        //membersihkan url dari karakter yang tidak diinginkan
        return array_values(array_filter(explode('/', $url), 'strlen'));
    }
}
