<?php
namespace App\Libraries;

class Core
{
    protected $controller = "Client";
    protected $method = "index";
    protected $parameters = [];
    
    public function __construct()
    {
        $urlArray = [];

        if(isset($_GET['url']))
            $urlArray = $this->getUrl();
        
        if(isset($urlArray[0]))
        {
            if(file_exists(APP_ROOT . "/controllers/{$urlArray[0]}.php"))
                $this->controller =  ucfirst($urlArray[0]);
            else
                die("no controller");
            
            unset($urlArray[0]);
        }
        if(isset($urlArray[1]))
        {
            $this->method = $urlArray[1];
            unset($urlArray[1]);
        }
        
        $this->parameters = $urlArray ? array_values($urlArray) : [];

        $this->init();
    }

    private function init()
    {
        $this->controller = 'App\Controllers\\' . $this->controller;
        
        $this->controller = new $this->controller;

        if(method_exists($this->controller, $this->method))
            call_user_func_array([$this->controller, $this->method], $this->parameters);
        else
            die("no method");

    }

    private function getUrl() : array
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return explode('/', $url);
    }
}

?>