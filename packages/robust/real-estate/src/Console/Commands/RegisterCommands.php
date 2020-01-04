<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Model\CoreSetting;
use Robust\Core\Models\Command as CCommand;


class RegisterCommands extends Command
{
    /**
     * @var string
     */
    protected $signature = 'rws:register-commands';

    /**
     * @var string
     */
    protected $description = 'Register all commands';



    public function handle()
    {
        $commands = config('real-estate.frw.commands');

        CCommand::query()->truncate();
        foreach($commands as $command){
           CCommand::create($command);
        }
    }

}
