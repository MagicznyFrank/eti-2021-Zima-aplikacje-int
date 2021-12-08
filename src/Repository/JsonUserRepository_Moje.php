<?php

namespace App\Repository;

class JsonUserRepository implements UserRepositoryInterface
{
    public $filePath;
    public function __construct($path)
    {

        $this->filePath = $path;
    }

    public function findCredentialsByUsername()
    {
            $file = fopen('users.json','r','/data/users.json');
            $data = json_decode($file);
            echo $data->username."/n";
            echo $data->password."/n";
    }

}