<?php
namespace App;
/**
 *
 *
 */

class EntryPoint
{
    private $route;
    private $method;
    private $routes;

    public function __construct(
        string $route,
        string $method,
        \App\Routes $routes
    )
    {
        // $this->route = $route ? $route : 'flower/home';
        $this->route = $route ? $route : 'home';
        $this->method = $method;
        $this->routes = $routes;
        $this->checkUrl();

    }
    
    private function checkUrl()
    {
        if($this->route !== strtolower($this->route)) {
            // http_response_code(301);
            // header('location: ' . strtolower($this->route));
        }
    }

    private function loadTemplate($templateFileName, $variables = [])
    {

        extract($variables);

        ob_start();

        include __DIR__ . '/../../templates/' . $templateFileName;

        return ob_get_clean();
    }

    public function run()
    {
    /**
    *
    *   this is the router
    *
    */    

        $routes = $this->routes->getRoutes();

        $controller = $routes[$this->route][$this->method]['controller'];
        $action = $routes[$this->route][$this->method]['action'];

        $page = $controller->$action();

        $title = $page['title'];

        if (isset($page['variables'])) {
            $output = $this->loadTemplate($page['template'], $page['variables']);
        } else {
            $output = $this->loadTemplate($page['template']);
        }

        include __DIR__ . '/../../templates/layout.html.php';
    }

}