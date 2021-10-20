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
     * Uruchamia aplikację.
     */
    public function run(): void
    {
        //$this->processRouting();
        $request = Request::initialize();
        $router = new Router($this->getRoutes());
        $page = $router->match($request);
        $Layout = new Layout($page);
        $Layout->render();
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
            '/' => 'home',
            '/article' => 'article',
            '/article/(\d+)' => 'article',
            '/body' => 'body'

        ];
    }

}