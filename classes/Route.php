<?php
class Route
{
    public static $validRoutes = array();

    public static function set($route,$function){
        
        // if ($_GET['url'] === $route) {
        //     $function->__invoke();
        //     // print_r($function->__invoke());
        // }
        // self::$validRoutes[] = $route;
        // print_r(self::$validRoutes);
        // $function->__invoke();
        // print_r(self::$validRoutes);
        if( ! is_array($route)) {
            $route = array($route);
        }
        foreach($route as $pattern) {
            $pattern = trim($pattern, '/');
            $pattern = str_replace(
                array(
                    '\(',
                    '\)',
                    '\|',
                    '\:any',
                    '\:num',
                    '\:all',
                    '#'
                ),
                array(
                    '(',
                    ')',
                    '|',
                    '[^/]+',
                    '\d+',
                    '.*?',
                    '\#'
                ),
            preg_quote($pattern, '/'));
            self::$validRoutes['#^' . $pattern . '$#'] = $function;
        }


    }

    public function execute () {
        $url = $_SERVER['REQUEST_URI'];
        $base = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
        if(strpos($url, $base) === 0) {
            $url = substr($url, strlen($base));
        }
        $url = trim($url, '/');
        foreach(self::$validRoutes as $pattern => $function) {
            if(preg_match($pattern, $url, $params)) {
                array_shift($params);
                return call_user_func_array($function, array_values($params));
            }
        }
    }

    public function GET(){

    }
    public function POST(){
        
    }
}

?>