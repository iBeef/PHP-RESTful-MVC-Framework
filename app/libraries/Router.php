<?php

/*
    Router class
    Handles all routes passed in from the url.
*/

class Router {

    private $url;
    private $requestMethod;
    private $getRoutes = [];
    private $postRoutes = [];
    private $putRoutes = [];
    private $deleteRoutes = [];

    public function __construct() {
        $this->url = $this->getUrl();
        $this->requestMethod = $this->getRequestMethod();
        echo '/' . $this->url;
        echo "<br>";
        echo $this->requestMethod;
    }

    private function getUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            // $url = $_GET['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // $url = explode('/', $url);
            return $url;
        }
    }

    private function getRequestMethod() {
        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
        if($requestMethod == 'post' && isset($_POST['_method'])) {
            $postMethod = strtolower($_POST['_method']);
            return ($postMethod == 'put' || $postMethod == 'delete') ? $_POST['_method'] : 'GET';
        } else {
            return $_SERVER['REQUEST_METHOD'];
        }
    }
}