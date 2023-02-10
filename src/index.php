<?php

declare (strict_types = 1);
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=UTF-8");

/* Loading all the classes in the project. */
spl_autoload_register(function ($class) {
    require __DIR__ . "views/$class.php";
    // require __DIR__ . "/*/$class.php";
    // require __DIR__ . "/controllers/$class.php";
    // require __DIR__ . "/models/$class.php";

});

// set_error_handler("ErrorHandler::handleError");
// set_exception_handler("ErrorHandler::handleException");
echo "helloworld";
