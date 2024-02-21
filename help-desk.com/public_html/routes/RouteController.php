<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap/Autoloader.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/config/path.php";
class RouteController
{
    static private $_instance;

    public function __construct() {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        $this->controller = ucfirst(strtolower($url[1]));
        $this->action = "Get";
        $this->controller_name = $this->controller . "Controller";
        $this->controller_path = $_SERVER['DOCUMENT_ROOT'] . "/core/user/controller/" . $this->controller_name . ".php";
        if(empty($this->controller)) {
            $this->controller = "Main";
            $this->controller_name = $this->controller . "Controller";
            $this->controller_path = $_SERVER['DOCUMENT_ROOT'] . "/core/user/controller/" . $this->controller_name . ".php";
        }
        for ($i = 0; $i < count(PATH_TO_CONTROLLER); $i ++) {
            if($this->controller === PATH_TO_CONTROLLER[$this->controller]['name']) {
                $this->controller_name = PATH_TO_CONTROLLER[$this->controller]['controller'];
                $this->action = PATH_TO_CONTROLLER[$this->controller]['action'];
                $this->controller_path = $_SERVER['DOCUMENT_ROOT'] . PATH_TO_CONTROLLER[$this->controller]['path'] . $this->controller_name . ".php";
                break;
            }
        }
        if($this->controller == "Wp-admin") {
            $this->controller = ucfirst(strtolower($url[2]));;
            $this->controller_name = $this->controller . "Controller";
            $this->action = "Get";
            for ($i = 0; $i < count(ADMIN_CONTROLLER); $i ++) {
                if($this->controller === ADMIN_CONTROLLER[$this->controller]['name']) {
                    $this->controller_name = ADMIN_CONTROLLER[$this->controller]['controller'];
                    $this->action = ADMIN_CONTROLLER[$this->controller]['action'];
                    $this->controller_path = $_SERVER['DOCUMENT_ROOT'] . ADMIN_CONTROLLER[$this->controller]['path'] . $this->controller_name . ".php";
                    break;
                }
            }
            if($this->controller_name == "AnswerController" and isset($url[3])) {
                $this->action = "ShowAnswerForm";
                $this->id = $url[3];
            }
            if(empty($this->controller)) {
                $this->controller = "Admin";
                $this->controller_name = $this->controller . "Controller";
            }
            $this->controller_path = $_SERVER['DOCUMENT_ROOT'] . "/core/admin/controller/" . $this->controller_name . ".php";
        }
        if($this->controller_name == "MessagesController") {
            if(isset($this->action)) {
                $this->id_mess = $url[2];
                if(!$this->id_mess) {
                    $this->action = 'ShowAllNews';
                }
                else {
                    $this->action = 'ShowConcretNews';
                }
            }
        }
        if($this->controller_name == "AnswersController" and isset($url[2])) {
            $this->action = "ShowConcretAnswer";
            $this->id = $url[2];

        }
        if($this->controller_name == "DeleteController") {
            $this->controller_name = "MessagesController";
            $this->action = "DeleteMessages";
            $this->id = $url[2];
            $this->controller_path = $_SERVER['DOCUMENT_ROOT'] . "/core/user/controller/" . $this->controller_name . ".php";
        }


    }


    public function Route() {
        if(file_exists($this->controller_path)) {
            $route = $this->controller_name;
            $route =  new $route();
            $actions = $this->action;
            if(method_exists($route, $actions)) {
                if($this->action == 'ShowConcretNews') {
                    $route->$actions($this->id_mess);
                    exit();
                }
                if($this->controller_name == 'AnswerController') {
                    $route->$actions($this->id);
                    exit();
                }
                if($this->action == 'DeleteMessages') {
                    $route->$actions($this->id);
                    exit();
                }
                if($this->controller_name == 'AnswersController') {
                    $route->$actions($this->id);
                    exit();
                }
                else {
                    $route->$actions();
                }

            }
        }
    }
}