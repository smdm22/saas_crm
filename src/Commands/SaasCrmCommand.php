<?php

namespace Smdm\SaasCrm\Commands;

use Illuminate\Console\Command;

class SaasCrmCommand extends Command
{
    public $signature = 'saas-crm';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
