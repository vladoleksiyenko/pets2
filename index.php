<?php

// 328/pets2/index.php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Instantiate the F3 Base class
$f3 = Base::instance();

// Define a default route
// https://voleksiyenko.greenriverdev.com/328/pets2
$f3->route('GET /', function() {
    echo '<h1>Hello from My Diner App!</h1>';

    // Render a view page
//    $view = new Template();
//    echo $view->render('views/home-page.html');
});
