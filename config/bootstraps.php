<?php
class App
{
    public $url;
    public $controllerName = 'HomeController';
    public $methodName = 'index';
    public $controllerPathAdmin = './controllers/Admin/';
    public $controllerPath = './controllers/';
    public $controller;
    public function __construct()
    {
        $this->getUrl();
        if (!isset($this->url[0])) {
            include $this->controllerPath . $this->controllerName . '.php';
            $this->controller = new $this->controllerName();
            $this->callMethod();
        } else {
            if ($this->url[0] !== 'admin') {
                $this->loadController();
                $this->callMethod();
            } else {
                $this->loadControllerAdmin();
                $this->callMethodAdmin();
            }
        }
    }

    public function getUrl()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
        if ($this->url !== NULL) {
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);
        }
    }

    public function loadController()
    {
        if (!isset($this->url[0])) {
            include $this->controllerPath . $this->controllerName . '.php';
            $this->controller = new $this->controllerName();
        } else {
            $this->controllerName = ucfirst($this->url[0]) . 'Controller';
            $fileName = $this->controllerPath . $this->controllerName . '.php';
            if (file_exists($fileName)) {
                include $fileName;
                if (class_exists($this->controllerName)) {
                    $this->controller = new $this->controllerName();
                } else {
                    header("Location:" . route_notfound);
                }
            } else {
                header("Location:" . route_notfound);
            }
        }
    }


    public function callMethod()
    {
        if (isset($this->url[2])) {
            $this->methodName = $this->url[1];
            if (method_exists($this->controller, $this->methodName)) {
                $this->controller->{$this->methodName}($this->url[2]);
            } else {
                header("Location:" . route_notfound);
            }
        } else {
            if (isset($this->url[1])) {
                $this->methodName = $this->url[1];
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    header("Location:" . route_notfound);
                }
            } else {
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    header("Location:" . route_notfound);
                }
            }
        }
    }


    public function loadControllerAdmin()
    {
        if (!isset($this->url[1])) {
            include $this->controllerPathAdmin . $this->controllerName . '.php';
            $this->controller = new $this->controllerName();
        } else {
            $this->controllerName = ucfirst($this->url[1]) . 'Controller';
            $fileName = $this->controllerPathAdmin . $this->controllerName . '.php';
            if (file_exists($fileName)) {
                include $fileName;
                if (class_exists($this->controllerName)) {
                    $this->controller = new $this->controllerName();
                } else {
                    header("Location:" . route_notfound);
                }
            } else {
                header("Location:" . route_notfound);
            }
        }
    }


    public function callMethodAdmin()
    {
        if (isset($this->url[3])) {
            $this->methodName = $this->url[2];
            if (method_exists($this->controller, $this->methodName)) {
                $this->controller->{$this->methodName}($this->url[3]);
            } else {
                header("Location:" . route_notfound);
            }
        } else {
            if (isset($this->url[2])) {
                $this->methodName = $this->url[2];
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    header("Location:" . route_notfound);
                }
            } else {
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    header("Location:" . route_notfound);
                }
            }
        }
    }
}
