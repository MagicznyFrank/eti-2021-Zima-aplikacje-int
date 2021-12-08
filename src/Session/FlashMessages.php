<?php

namespace App\Session;

class FlashMessages
{
    /**
     * @var Session
     */
    private $session;

    private $messages = [];

    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->messages = unserialize($session->get('flash_messages'));
    }

    public function addMessage(string $type, string $message)
    {
        $this->messages[$type][] = $message;
        $this->store();
    }

    public function getMessages()
    {
        $messages = $this->messages;
        $this->messages = [];
        $this->store();

        return $messages;
    }

    public function hasMessages()
    {
        return $this->messages;
    }

    private function store()
    {
        $this->session->set('flash_messages', serialize($this->messages));
    }
}