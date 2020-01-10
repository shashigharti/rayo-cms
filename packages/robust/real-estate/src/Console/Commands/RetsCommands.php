<?php


namespace Robust\RealEstate\Console\Commands;


use Illuminate\Console\Command;

class RetsCommands extends Command
{
    protected $rets;

    public function __construct()
    {
        parent::__construct();
        $url = env('LOGIN_URL') ?? null;
        $username = env('LOGIN_USERNAME') ?? null;
        $password = env('LOGIN_PASSWORD') ?? null;
        if($url && $username && $password){
            $config = new \PHRETS\Configuration;
            $config->setLoginUrl($url)
                ->setUsername($username)
                ->setPassword($password)
                ->setRetsVersion('1.7.2');

            $this->rets = new \PHRETS\Session($config);
            $connect = $this->rets->Login();
        }
    }
}
