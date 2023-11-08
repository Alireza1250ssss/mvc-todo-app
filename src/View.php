<?php

namespace App;

class View {

    public static function render($layout , $content , $params = [])
    {
        $layout = self::renderLayout($layout,$params);
        $content = self::renderView($content,$params);
        echo str_replace("{{content}}",$content,$layout);

    }
    public static function renderView($viewName,$params= []) // test
    {
        extract($params);
        /*
         * [ 'name' => 'alireza'] =====> $name  = 'alireza'
         */
        ob_start();
        include_once App::$basePath."/views/$viewName.php";
        return ob_get_clean();
    }

    public static function renderLayout($viewName,$params= []) // test
    {
        extract($params);

        ob_start();
        include_once App::$basePath."/views/layouts/$viewName.php";
        return ob_get_clean();
    }
}