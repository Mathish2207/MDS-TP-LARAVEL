<?php

namespace App\Jobs;

use App\Models\Location;
use App\Models\Vote;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessUpvote implements ShouldQueue
{
    use Queueable;

    public $userId;
    public $locationId;

    /**
     * Create a new job instance.
     */
    public function __construct($userId, $locationId)
    {
        $this->userId = $userId;
        $this->locationId = $locationId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $location = Location::find($this->locationId);
        if (!$location) return;

        $voteExists = Vote::where('user_id', $this->userId)
            ->where('location_id', $this->locationId)
            ->exists();

        if (!$voteExists) {
            Vote::create([
                'user_id' => $this->userId,
                'location_id' => $this->locationId,
            ]);

            $location->upvotes_count++;
            $location->save();
        }
    }
}

