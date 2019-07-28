<?php

/**
 *
 *  web root directory is /flowers/public
 *
 *  get $route from ['REQUEST_URI']
 *
 *  example values for route:
 *    /flower/list, /flower/addEdit, /flower/home
 *    /price/list, /price/addEdit
 *
 *  methods expected are GET or POST
 *
 *  using $route, ['REQUEST_METHOD'] and static routes array
 *    start the routing and request handling with
 *    EntryPoint->run()
 *
 */
try {

    include __DIR__ . '/../includes/autoload.php';

    $logger = new \App\Logger('/../../logs/logFile');
    $logger->write("******************* From the Top ******************");
    $logger->write('I:REQUEST_URI:');
    $logger->write($_SERVER['REQUEST_URI']);

    // trim 16 chars, /flowers/public/, remove query string
    $route = strtok(substr($_SERVER['REQUEST_URI'], 16), '?');

    $logger->write("I:route:");
    $logger->write($route);

    // if nothing in route set to default
    $route = $route ? $route : 'home';  // default

    $logger->write("I-2:route:");
    $logger->write($route);

    $logger->write("I:QUERY_STRING:");
    $logger->write($_SERVER['QUERY_STRING']);

    $logger->write("I:method:");
    $logger->write($_SERVER['REQUEST_METHOD']);

    $entryPoint = new \App\EntryPoint(
        $route,
        $_SERVER['REQUEST_METHOD'],
        new \Routers\StaticRoutes()
    );

    $entryPoint->run();

} catch(Exception $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
                         $e->getFile() . ':' . $e->getLine();
    include __DIR__ . '/../templates/layout.html.php';

}

