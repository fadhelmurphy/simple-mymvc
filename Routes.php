<?php
// Create the Home URL
$url_base = trim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
$url_home = 'http://' . trim($_SERVER['HTTP_HOST'], '/') . (trim($url_base) !== "" ? '/' . $url_base : "");
$url_asset = $url_home.'/asset/';


//Js,Css,Images url
Route::set('asset/(:any)', function($query="") {
    Controller::Asset($query);
});

//Js,Css,Images url
// Route::set('asset/(:any)/(:any).(:any)', function($folder = "", $files = "", $ext = "") use($url_home) {
//     if(file_exists('Views/' . $folder . '/' . $files . '.' . $ext)) {
//         Controller::CreateView('Asset', array(
//             'ext' => $ext,
//             'content' => file_get_contents('Views/' . $folder . '/' . $files . '.' . $ext)
//         ));
//     } else {
//         header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
//         Controller::CreateView('404', array(
//             'title' => '404 Not Found',
//             'content' => '<p>Article not found.</p>'
//         ));
//     }
// });

Route::set("/", function() use($url_asset){
    Index::CreateView('Index',array(
            'title' => 'Home',
            'url_asset' => $url_asset
        )
    );
});

Route::set('about-us', function(){
    AboutUs::CreateView('AboutUs',array(
        'title' => 'Admin'
    ));
});

Route::set(array('search/(:any)', 'search/(:any)/(:num)'), function($query="") {
    ContactUs::CreateView('ContactUs',array(
        'title' => 'Costumer Service',
        'query' => $query
    ));
});

Route::execute();

// Fallback to 404 Page if Nothing Matched
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
Controller::CreateView('404', array(
    'title' => '404 Not Found',
    'content' => '<p>Page not found.</p>'
));
?>