<?php


namespace Robust\RealEstate\Console\Commands;
use Illuminate\Console\Command;
use Robust\RealEstate\Helpers\MlsPullHelper;
use Robust\RealEstate\Models\MlsUser;

class MlsPullImages extends Command
{
    protected $signature = 'mls:pull-images {id}';

    protected $description = '';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(MlsPullHelper $helper)
    {
        $id = $this->argument('id');
        $mls_user = MlsUser::where('id',$id)->first();
        $login_url = $mls_user->login_url;
        $username = $mls_user->username;
        $password = $mls_user->password;
        if($login_url && $username && $password) {
            $config = new \PHRETS\Configuration;
            $config->setLoginUrl($login_url);
            $config->setUsername($username);
            $config->setPassword($password);
            $config->setRetsVersion('1.7.2');
            $config->setOption('use_post_method', true);
            $rets = new \PHRETS\Session($config);
            $connect = $rets->login();
            $helper->getImages($rets);
        }

    }
}
