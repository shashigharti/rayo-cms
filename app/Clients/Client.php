<?php

namespace App\Clients;

/**
 * Class Client
 * @package App\Clients
 */
class Client
{
    /**
     * @return \App\Clients\DefaultClient|\App\Clients\Santabarbara
     */
    public static function get()
    {
        switch (env('APP_CLIENT')) {
            case 'santa-barbara':
                return new Santabarbara();
                break;
            default:
                return new DefaultClient();
                break;
        }
    }
}
