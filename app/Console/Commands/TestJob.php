<?php

namespace App\Console\Commands;

use App\Jobs\SubMassgTest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Console\Command;

class TestJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subtest:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description test';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        for ($i=0; $i < 5; $i++) { 
            dispatch(new SubMassgTest($i));
        }
    }
}