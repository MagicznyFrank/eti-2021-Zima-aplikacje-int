<?php


namespace App\Repository;

    //Napisać własne repozytorium JSON, które na konstruktorze przyjmuje ściezkę do
    //pliku lub jego nazwę, i na metodzie findUserCredentialsByusername powinna plik
    //otwierać i poszukiwac danych aby zwrócić wyniki w podobny sposób jak przykładowa klasa inMemory


    use App\Model\UserCredentials;


class JsonRepository implements UserRepositoryInterface
{
    /**
     * @var array
     */

    private $path;


    /**
     * @param string $path
     */

    public function __construct(string $path = '/var/www/eti-wprowadzenie/src/Repository/data.json')
    {
        $this -> path = $path;
    }

    /**
     * * @return UserCredentials
     */

    public function findCredentialsByUsername(string $username): ?UserCredentials
    {

        $file = $this->path;
        $data = file_get_contents($file);
        $obj = json_decode($data);
        for($i=0;$i<count($obj);$i++){
             if($obj[$i]->Login == $username){
                //echo $obj[$i]->Login.PHP_EOL;
                // echo $obj[$i]->Password.PHP_EOL;
                //echo ''.PHP_EOL;
                return new UserCredentials($username, $obj[$i]->Password);
            }




        }
    }

}


