<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class FeedbackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:feedback-command {email} {phone} {text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle() {
        $user = User::orderBy('id', 'asc')->first();

        Mail::send(
            view: 'pages.feedback',
            data: ['phone' => $this->argument('phone'), 'text' => $this->argument('text')],
            callback: function($message) use($user){
                $message
                    ->to($user->email)
                    ->subject("Message")
                    ->from($this->argument('email'));
            }
        );
    }
}
