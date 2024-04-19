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
        $view = new Template();
        echo $view->render('views/home-page.html');
    });

    $f3 -> route('GET|POST /order', function($f3) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Get data
            $type = $_POST['type'];
            $color = $_POST['color'];

            if (empty($type)) {
                echo "Please specify a pet type";
            } else {
                $f3 -> set('SESSION.petType', $type);
                $f3 -> set('SESSION.petColor', $color);
                $f3 -> reroute("summary");
            }
        }
        $view = new Template();
        echo $view -> render('views/pet-order.html');
    });

    $f3 -> route('GET /summary', function() {
        $view = new Template();
        echo $view -> render('views/order-summary.html');
    });

    $f3 -> run();
?>
