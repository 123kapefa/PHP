<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-mail-command {email} {phone} {text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument ('user_id');
        $user = User::find($userId);

        if ($user) {
            Mail::send('mail.mail', ['name' => $user->name],
                function($message) use($user) {
                    $message
                        ->to($user->email)
                        ->subject("Hello test")
                        ->from("top@academy.ry");
                });
            $this->line ("send mail!");
        }
        else {
            $this->line ("Hello, $user->name");
        }

        //TestJob::dispatch ((new \DateTime)->format ('c'), $user);
    }
}
