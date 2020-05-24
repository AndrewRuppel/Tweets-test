<?php

namespace App\Jobs;

use App\Tweet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $inputs;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->inputs = $request->input();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tweet = new Tweet();
        $tweet->fill($this->inputs);
        $tweet->save();
    }
}
