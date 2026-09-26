<?php
class Controller {
    public function model($model) {
        require_once dirname(__DIR__) . '/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        $viewPath = dirname(__DIR__) . '/views/' . $view . '.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die('View does not exist.');
        }
    }
}