<?php
/*
 *  Base Controller
 *  Loads models and views
*/

class Controller {

    /**
     * Loads a model into the controller
     *
     * @access public
     * @param string $model
     * @return void
    */
    public function model($model) {
        // Require model file
        require_once "../app/models/" . $model . ".php";

        // Instantiate the model
        return new $model();

    }

    /**
     * Loads a view into the controller
     *
     * @access public
     * @param string $model
     * @return void
    */
    public function view($view, $data=[]) {
        // Check for the view file
        if(file_exists("../app/views/" . $view . ".php")) {
            require_once "../app/views/" . $view . ".php";
        } else {
            // View does not exist
            die("View does not exist");
        }
    }
}