<?php

namespace App\Controllers;

use App\Response;
use App\Request;

class SimpleController implements ControllerInterface
{
    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $body = [
            'Some test value',
            'param1' => 'value 1'
        ];

        $additionalHeaders = ['Content-Type: application/json'];
        return new Response(json_encode($body), $additionalHeaders);
    }
}