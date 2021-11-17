<?php

namespace App\Controllers;

use App\Request;
use App\Response\JsonResponse;
use App\Response\Response;

class SimpleController implements ControllerInterface
{
    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $session = ServiceContainer::getInstance()->get('session');
        $session->start();
        $session->set('user', "Arek");
        return new LayoutResponse($this->name, [
            'request' => $request,
            'router' => $this->router,
            'session' => $session
        ], $this->layout);
    }
}