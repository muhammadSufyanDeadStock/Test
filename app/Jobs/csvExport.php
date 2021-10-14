<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class csvExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $ProductRepo;
    public function __construct($repos)
    {
        $this->ProductRepo=$repos;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->ProductRepo->exportqueue();
    }
}
