<?php

class Controller
{
    public static function CreateView($viewName, $var)
    {
        // if(preg_match("/(images|js|css).[a-z]*.(jpg|js|css)/", glob("Views/*"), $asset)){
        //     print_r($asset[0]);
        // }
        extract($var);
        require_once('Views/' . $viewName . '.php');
        exit;
    }

    public static function Asset($viewName)
    {
        foreach (glob("Views/*/*") as $c) {
            if (preg_match("/(images|js|css)." . $viewName . "*.(jpg|js|css)/", $c, $params)) {
                $dir = require_once('Views/' . $params[0]);
                switch( $params[1] ) {
                    case "gif": $ctype="image/gif"; $dir; break;
                    case "png": $ctype="image/png"; $dir; break;
                    case "jpeg":
                    case "jpg": $ctype="image/jpeg"; $dir; break;
                    case "css" : $ctype="text/css"; $dir; break;
                    case "js" : $ctype="text/javascript"; $dir; break;
                    default:
                }
                header('Content-type: ' . $ctype. ";charset=utf-8");
                exit;
            }
        }
    }
}


?>