<?php

class Home extends Controller {
    public function index() {
        $data = [
            'title' => 'Home Page',
            'description' => 'Welcome to the home page of our MVC framework.'
        ];
        $this->view('home/index', $data);
    }
}