<?php
/*
 *  Base Controller
 *  Loads models and views
*/

class Controller {

    private $data = [];
    private $alertTypes = [
        'success' => "alert-success",
        'warning' => "alert-warning",
        'danger' => "alert-danger"
    ];

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

    /*
        Get/Set Data
    */

    /**
     * Sets data to the $this->data variable
     *
     * @param string $key
     * @param string $value
     * @param boolean $clean
     * @return NULL
     */
    public function setData($key, $value, $clean=FALSE) {
        if($clean) {
            $this->data[$key] = htmlentities($value);
        } else {
            $this->data[$key] = $value;
        }
    }

    /**
     * Gets data from $this->data and echoes or returns it.
     *
     * @param string $key
     * @param boolean $echo
     * @return string
     */
    public function getData($key, $echo=FALSE) {
        if(isset($this->data[$key])) {
            if($echo) {
                echo $this->data[$key];
            } else {
                return $this->data[$key];
            }
        }
        return '';
    }

    /*
        Get/Set alerts
    */

    /**
     * Sets an alert message stored in a session variable
     *
     * @access public
     * @param string $value
     * @param string $type (optional)
     * @return NULL
     */
    public function setAlert($value, $type='success') {
        $_SESSION[$type][] = $value;
    }

    /**
     * Returns string, containing multiple list items of alerts
     *
     * @access public
     * @return string
     */
    public function getAlerts() {
        $data = '';
        
        foreach(array_keys($this->alertTypes) as $alert) {
            if(isset($_SESSION[$alert])) {
                foreach($_SESSION[$alert] as $value) {
                    $data .= '<li class="alert ' . $this->alertTypes[$alert] . '">' . $value . '</li>';
                }
                unset($_SESSION[$alert]);
            }
        }
        echo $data;
    }

}