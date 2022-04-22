<?php

require_once 'controllers/error.php';

class App
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            $archivoController = 'controllers/mainController.php';
            require_once $archivoController;
            $controller = new MainController();
            return false;
        }

        $controller = "Controller";
        $archivoController = 'controllers/' . $url[0] . 'Controller.php';

        if (file_exists($archivoController)) {
            require_once $archivoController;
            $url[0] = $url[0] . "Controller";

            $controller = new $url[0];

            if (isset($url[1])) {
                $controller->{$url[1]}();
                unset($_POST);
                $_POST = array();
            } else {
                $controller->listar();
            }
        } else {
            $controller = new ErrorPage();
        }
    }
}
