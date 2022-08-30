<?php
namespace App\Libraries;

class Controller
{
    public function view($viewName, $data)
    {
        $publicRoot = PUBLIC_ROOT;
        
        if(file_exists("{$publicRoot}views/{$viewName}.php"))
            return require_once "{$publicRoot}views/{$viewName}.php";
        else
        {
            return require_once "{$publicRoot}views/error/404.php";
        }
    }

    public function model($modelName)
    {
        $appRoot = APP_ROOT;
        $modelName = ucfirst($modelName);

        if(file_exists("{$appRoot}/models/{$modelName}.php"))
        {
            $modelName =  'App\Models\\' . $modelName;
            return new $modelName;
        }
        else
        {
            die("model");
        }
    }
}