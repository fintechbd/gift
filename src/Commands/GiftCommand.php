<?php

namespace Fintech\Gift\Commands;

use Illuminate\Console\Command;

class GiftCommand extends Command
{
    public $signature = 'gift';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
