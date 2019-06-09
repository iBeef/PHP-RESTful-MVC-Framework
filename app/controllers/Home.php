<?php

class Home extends Controller {

    public function index() {
        $data = array(
            'title' => "RESTful MVC Framework"
        );
        $this->view("home/index", $data);
    }

}