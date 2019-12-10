<?php


namespace Robust\RealEstate\Console\Commands;


use Illuminate\Console\Command;

class RetsCommands extends Command
{
    protected $rets;

    public function __construct()
    {
        parent::__construct();
        $url = 'http://retsgw.flexmls.com:80/rets2_3/Login';
        $username = 'fl.rets.802025';
        $password = 'scopa-tropy71';
        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($url)
            ->setUsername($username)
            ->setPassword($password)
            ->setRetsVersion('1.7.2');

        $this->rets = new \PHRETS\Session($config);
        $connect = $this->rets->Login();
    }
}
