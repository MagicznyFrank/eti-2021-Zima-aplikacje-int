<?php

namespace App;

/**
 * Application entry point.
 */
class App
{
    /**
     * @var string
     */
    private $page;

    /**
     * @var
     */
    private $request;

    /**
     * Uruchamia aplikację.
     */
    public function run(): void
    {
        //$this->processRouting();
        $this->request = Request::initialize();
        $router = new Router($this->getRoutes());
        $page = $router->match($this->request);
        $Layout = new Layout($this->request, $page);
        $Layout->render();
        echo $router->generateUrl('article',['id' => 5]);
        echo $router->generateUrl('Homepage');
    }

    /**
     * @return string
     */
    public function getPage(): string
    {
        return $this->page;
    }

    private function getRoutes()
    {
        return [
            'name' =>[
                'path'=>'/',
                'page' => 'home'

            ],
            'article' => [
                'path'=>'/article/{id}',
                'page' => 'article'
            ],

            '/body' => [
                'path'=> '/body',
                'page'=>'body'
            ]

        ];
    }

}