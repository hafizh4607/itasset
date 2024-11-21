<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyEmail;
use App\Models\Asset;
use Carbon\Carbon;
use App\Mail\Alert;

class SendDailyEmail extends Command
{
    protected $signature = 'email:daily';
    protected $description = 'Send daily emails';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle() {
        $now = Carbon::now();
        $expirationDateLimit = $now->copy()->addDays(15);


        $expiringAssets = Asset::where('type_asset', 'license')
            ->where('expired', '>=', $now) // Must be in the future
            ->where('expired', '<=', $expirationDateLimit) // Must be within the next 15 days
            ->get();

        $form = $expiringAssets;
            $form->map(function($asset){

                $targetDate = Carbon::parse($asset->expired);

                // Get the current date
                $now = Carbon::now();
    
                // Get the start of the current year (e.g., 2024-01-01)
                $startOfYear = Carbon::now()->startOfYear();
    
                // Calculate the total number of days from the start of the year to the target date
                $totalDays = $startOfYear->diffInDays($targetDate);
    
                // Calculate how many days are left between now and the target date
                $daysLeft = max(0, $now->diffInDays($targetDate, false)); // Ensure no negative values

                $asset['timeleft'] = $daysLeft;
            });

            
            Mail::to(env('MAIL_RECEIVER'))
            ->send(new Alert($form));
    }

}
