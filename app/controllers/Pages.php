<?php

class Pages extends Controller {

    public function index() {
        $data = array(
            'title' => "RESTful MVC Framework"
        );
        $this->view("pages/index", $data);
    }

}