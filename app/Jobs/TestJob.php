<?php

namespace App\Jobs;

class TestJob extends Job
{
    public $tries = 1000;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo 'this is a test job' . PHP_EOL;
        echo $this->data . PHP_EOL;
        return true;
    }
}
