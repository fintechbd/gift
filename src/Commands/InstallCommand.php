<?php

namespace Fintech\Gift\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    public $signature = 'gift:install';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
