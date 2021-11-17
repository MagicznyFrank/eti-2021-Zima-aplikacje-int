<?php

namespace App\Controllers;

use App\Layout;
use App\Request;
use App\Response\LayoutResponse;
use App\Response\Response;
use App\Router;
use App\ServiceContainer;

class PageController implements ControllerInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $layout;
    /**
     * @var Router
     */
    private Router $router;

    /**
     * @param string $name
     * @param string $layout
     */
    public function __construct(Router $router, string $name, string $layout)
    {
        $this->name = $name;
        $this->layout = $layout;
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @return LayoutResponse
     */
    public function __invoke(Request $request): LayoutResponse
    {
        $session = ServiceContainer::getInstance()->get('session');
        $session->start();
        $session->set('user', 'Krzysiek');
        return new LayoutResponse($this->name, [
            'request' => $request,
            'router' => $this->router,
            'session' => $session
        ], $this->layout);
    }
}