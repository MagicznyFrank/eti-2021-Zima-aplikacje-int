<?php


namespace App\Repository;

    //Napisać własne repozytorium JSON, które na konstruktorze przyjmuje ściezkę do
    //pliku lub jego nazwę, i na metodzie findUserCredentialsByusername powinna plik
    //otwierać i poszukiwac danych aby zwrócić wyniki w podobny sposób jak przykładowa klasa inMemory


    use App\Model\UserCredentials;

    $run = new JsonRepository();
    $run -> findUserCredentialsByusername('Michaś');


class JsonRepository
{
    /**
     * @var array
     */

    private $path;


    /**
     * @param string $path
     */

    public function __construct(string $path = 'data.json')
    {
        $this -> path = $path;

    }

    /**
     * * @return UserCredentials
     */

    public function findUserCredentialsByusername(string $username)//: ?UserCredentials
    {

        $file = $this->path;
        $data = file_get_contents($file);
        $obj = json_decode($data);
        for($i=0;$i<count($obj);$i++){
             if($obj[$i]->Login == $username){
                echo $obj[$i]->Login.PHP_EOL;
                echo $obj[$i]->Password.PHP_EOL;
                echo ''.PHP_EOL;
                //return new UserCredentials($username, $this->users[$username]);
            }




        }
    }

}


