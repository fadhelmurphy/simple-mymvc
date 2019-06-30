<?php 
if ($ext === 'css') {
    Header("Content-type: text/css; charset=utf-8");
}else if($ext === 'js'){
    header( 'Content-type: text/javascript; charset=UTF-8' );
}
echo $content ?>