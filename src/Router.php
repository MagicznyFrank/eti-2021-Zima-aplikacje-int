<?php

namespace App;

use App\Controllers\ControllerInterface;

class Router
{
    /**
     * @var array
     */
    private $routes;

    /**
     * @param array $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * @param Request $request
     * @return string|ControllerInterface
     * @throws \Exception
     */
    public function match(Request $request)
    {

        $trimmedRequestPath = ltrim($request->getPath(), '/');
        $requestPathSegments = explode('/', $trimmedRequestPath);

        foreach ($this->routes as $routeName => $routeConfig) {
            $trimmedRoute = ltrim($routeConfig['path'], '/');
            $routeSegments = explode ('/', $trimmedRoute);

            $params = $this->checkRoute($routeSegments, $requestPathSegments);
            if($params !== false){
                $request->setPathParameters($params);
                return $routeConfig['controller'] ?? $routeConfig['page'];
            }
        }
        throw new \Exception('Page not found! Sorry!');
    }

    private function checkRoute(array $routeSegments, array $requestPathSegments)
    {
        $params = [];
        for($i = 0; $i < count($routeSegments); $i++)
        {
            if(preg_match('/^{(.*)}$/', $routeSegments[$i], $matches)) {
                $params[$matches[1]] = $requestPathSegments[$i];
            } else {
                if ($routeSegments[$i] != $requestPathSegments[$i]) {
                    return false;
                }
            }
        }

        return $params;
    }

    public function generateUrl($name, $parameters = null)
    {
        foreach ($this->routes as $threads => $thread)
        {
            if($threads === $name)
            {
                $url = $thread['path'];
                if(isset($parameters))
                {
                    $url = str_replace('{id}', $parameters['id'], $thread['path']);
                }
            }
        }
        return $url;
    }
}


//TODO NAPISAĆ METODĘ generateUri NAZWA, PARAMETRY ROUTINGU
//TODO generateUri(homePage, tablicaParametru)
//TODO wynik kawalek tekstu uzyty do urla /nazwa/parametry