<?php

namespace Yoelpc4\EAWpMenu;

use Illuminate\Console\Command;
use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\ServiceProvider;

class EAWpMenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register custom preset command to install scaffolding
        PresetCommand::macro('ea-wp-menu', function (Command $command) {
            EAWpMenu::install();
            $command->info('EA WP Menu scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
