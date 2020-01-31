<?php


namespace Robust\RealEstate\Console\Commands\ListingData;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class RetsCommands extends Command
{
    protected $rets;

    public function __construct()
    {
        parent::__construct();
        if(Schema::hasTable('settings')){
            $settings = settings('real-estate');
            $url = $settings['url'] ?? null;
            $username = $settings['username'] ?? null;
            $password = $settings['password'] ?? null;
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
}
