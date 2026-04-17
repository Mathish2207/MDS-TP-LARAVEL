<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('scheduler:delete-all-failed-jobs')]
#[Description('Delete all failed jobs')]
class deleteAllFailed_job extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $failedJobs = \DB::table('failed_jobs')->get();

        if ($failedJobs->isEmpty()) {
            $this->info('No failed jobs found.');

            return;
        }

        \DB::table('failed_jobs')->delete();

        $this->info('All failed jobs have been deleted successfully.');
    }
}
