<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyEmail;

class SendDailyEmail extends Command
{
    protected $signature = 'email:daily';
    protected $description = 'Send daily emails';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Define email data
        $data = [
            'message' => 'This is your daily update!'
        ];

        // Send the email
        Mail::to('alert@hafizhproject.my.id')->send(new DailyEmail($data));

        $this->info('Daily email sent successfully.');
    }
}
