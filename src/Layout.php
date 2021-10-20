<?php

namespace App;

/**
 * Tworzenie layoutu do stron
 **/

class Layout
{


    /**
     * @var string
     **/

    private $name;

    /**
     * @var string
     **/

    private $page;

    /**
     * @var string
     **/

    private $title;

    public function __construct($page,$name = 'default',$title = 'Website!')
    {
       $this->page = $page;
       $this->name = $name;
       $this->title = $title;
    }

    /**
     *
     */
    public function render()
    {
        extract([
            'title' => $this->title,
            'content' => $this->renderTemplate()
    ]);
        include __DIR__ . "/../layouts/{$this->name}.php";

    }

    /**
     * proces template/page
     */
    private function renderTemplate(): string
    {
        ob_start();
       include "../templates/{$this->page}.php";
       return ob_get_clean();
    }
}