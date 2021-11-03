<?php

namespace App;

use App\Controllers;


class Layout
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $page;

    /**
     * @var string
     */
    private $title;

    /**
     * @var
     */
    private $request;

    /**
     * @param $page
     * @param string $name
     * @param string $title
     * @param Request $request;
     */

    public function __construct(Request $request, string $page, string $name = 'default', string $title = 'APSL Website!')
    {
        $this->page = $page;
        $this->name = $name;
        $this->title = $title;
        $this->request = $request;
    }

    public function render()
    {
        extract([
            'title' => $this->title,
            'content' => $this->renderPage()
        ]);
        include __DIR__ . "/../layouts/{$this->name}.php";
    }

    /**
     * Proces template/page
     */
    private function renderPage(): string
    {
        ob_start();
        extract([
            'request' => $this->request,
            'router' => ServiceContainer::getInstance()->get('router')
        ]);
        include "../pages/{$this->page}.php";

        return ob_get_clean();
    }


}