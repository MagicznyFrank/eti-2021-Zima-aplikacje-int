<?php


namespace App;
const FLASH = 'Wiadomości flash';

class FlashMessages
{
    /**
     * @var array
     */
 public $messages = [];
 public $flash_message = '';

 public function hasMessages(string $name,$messages){
 $this->messages = $messages;
 if (isset($_SESSION[FLASH][$name]))
 {

 }

 }

 public function addMessages(string $name, string $messages): void{
     $this->messages + $messages;
     $_SESSION[FLASH][$name] = ['message' => $messages];
 }

}
function getMessages(string $name)
{
    $flash_message = $this->messages;
    $flash_message = $_SESSION[FLASH][$name];
    unset($_SESSION[FLASH][$name]);
}
