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
    
        // Find assets expiring within the next 15 days
        $assetsToExpire = Asset::where('type_asset', 'license')
            ->whereBetween('expired', [$now, $expirationDateLimit])
            ->get();
    
        // Calculate remaining days for each asset
        $assetsToExpire->each(function ($asset) use ($now) {
            $targetDate = Carbon::parse($asset->expired);
            $asset['timeleft'] = $now->diffInDays($targetDate, false);
        });
    
        // Send notification
        Mail::to(env('MAIL_RECEIVER'))
            ->send(new Alert($assetsToExpire));
    }

}
