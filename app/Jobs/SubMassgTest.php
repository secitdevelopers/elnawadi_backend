<?php

namespace App\Jobs;

use App\Models\Country;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SubMassgTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $country;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($datacountrya)
    {
        $this->country = $datacountrya;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
               $datacountry = new Country();
                $datacountry->name = "test".$this->country;
                $datacountry->country_tax = 500;
                $datacountry->save();
          
        } catch (\Exception $e) {  info($e->getMessage());
            Log::error("Failed to save country: " . $e->getMessage());
            // Optionally, re-throw the exception to mark the job as failed
            // throw $e;
        }
    }
}