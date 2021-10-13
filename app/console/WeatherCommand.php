<?php

declare(strict_types=1);

namespace App\Console;

use Symfony\Component\Console\Command\Command;

class WeatherCommand extends Command
{
    protected $signature = 'weather';
    protected $description = 'Get weather for city';

    public function configure()
    {
        parent::configure();
    }

    public function handle()
    {
        $this->info('Test');
    }
}
