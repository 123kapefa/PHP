<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Artisan;

class SendFeedbackJob implements ShouldQueue
{
    use Queueable;

    private $email;
    private $phone;
    private $text;

    /**
     * Create a new job instance.
     */
    public function __construct(string $email, string $phone, string $text)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->text = $text;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        Artisan::call('app:feedback-command',
            ['email' => $this->email, 'phone' => $this->phone, 'text' => $this->text]);
    }
}
