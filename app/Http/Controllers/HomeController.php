<?php

namespace App\Http\Controllers;

use App\Mail\Alert;
use App\Models\Asset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $laptops = Asset::where('type_asset', 'laptop')->get()->count();
        $pcs = Asset::where('type_asset', 'pc')->get()->count();
        $servers = Asset::where('type_asset', 'server')->get()->count();
        $routers = Asset::where('type_asset', 'router')->get()->count();
        $switchs = Asset::where('type_asset', 'switch')->get()->count();
        $aps = Asset::where('type_asset', 'ap')->get()->count();
        $licenses = Asset::where('type_asset', 'license')->get()->count();
        $spare = Asset::where('employee_id', null)->get()->count();
        $total = Asset::get()->count();
        

        // Get the current date
        $now = Carbon::now();

        // Calculate the date 15 days from now
        $expirationDateLimit = $now->copy()->addDays(15);

        // Fetch assets of type 'license' expiring within the next 15 days
        $expiringAssets = Asset::where('type_asset', 'license')
            ->where('expired', '>=', $now) // Must be in the future
            ->where('expired', '<=', $expirationDateLimit) // Must be within the next 15 days
            ->get();

        // Check if any assets are expiring soon
        if ($expiringAssets->isNotEmpty()) {
            $daysLeft = $expiringAssets->map(function ($asset) {
                return Carbon::parse($asset->expired)->diffInDays(now());
            });
            session()->flash('license_warning', "Warning: Some licenses are expiring soon!");

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


        return view('home', compact('laptops','pcs','servers','routers','switchs','aps','licenses','spare','total','expiringAssets'));
    }

}
