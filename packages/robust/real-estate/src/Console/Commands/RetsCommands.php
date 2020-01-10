<?php


namespace Robust\RealEstate\Console\Commands;


use Illuminate\Console\Command;

class RetsCommands extends Command
{
    protected $rets;

    public function __construct()
    {
        parent::__construct();
        $url = env('LOGIN_URL');
        $username = env('LOGIN_USERNAME');
        $password = env('LOGIN_PASSWORD');
        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($url)
            ->setUsername($username)
            ->setPassword($password)
            ->setRetsVersion('1.7.2');

        $this->rets = new \PHRETS\Session($config);
        $connect = $this->rets->Login();
    }
}
