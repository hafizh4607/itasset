<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(Request $request)
    {
        $assets = Asset::get();
        
        if($request->search) {
            // $employee = Employee::where('name', "LIKE", "%$request->search%")->first();

            $assets = Asset::where('name', "LIKE", "%$request->search%")
            ->orWhere('asset_id', "LIKE", "%$request->search%")
            ->orWhere('type', "LIKE", "%$request->search%")
            // ->orWhere('employee_id', "LIKE", "%$employee?->id")
            ->get();
        } 

        return view('assetlist', compact('assets'));
    }

    public function create()
    {
        $employees = Employee::get();

        $assets = Asset::get();

        if ($assets->isEmpty()) {
            $asset_id = "IT_1";
        } else {
            $asset = collect(Asset::get())->sortByDesc('created_at')->values()->take(1);
            $data["asset_id"] = "IT_" . $asset[0]->id + 1;
            $asset_id = $data["asset_id"];
        }


        return view('asset', compact('employees', 'asset_id'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $filename = str()->slug($request->name); //penamaan file sesuai sama nama

        $data = $request->all();

        $asset = collect(Asset::get())->sortByDesc('created_at')->values()->take(1);

        if ($asset->isEmpty()) {
            $asset_id = "IT_1";
        } else {
            $asset = collect(Asset::get())->sortByDesc('created_at')->values()->take(1);
            $data["asset_id"] = "IT_" . $asset[0]->id + 1;
            $asset_id = $data["asset_id"];
        }

        $data['asset_id'] = $asset_id;

        if ($data["employee_id"]) {
            $employee = Employee::firstWhere('name', $data["employee_id"]);
            $data["employee_id"] = $employee->id;
        }

        if ($request->hasFile('license')) {
            $file = $request->file('license');
            $file->move(public_path() . "/images/license", "$filename.png");
            $data["license"] = "images/license/$filename.png";
        }


        Asset::create($data);
        return redirect('/asset');
    }


    public function edit($id)
    {
        $asset = Asset::find($id);
        $employees = Employee::get();
        return view('assetedit', compact('asset', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $asset = Asset::find($id);

        $filename = str()->slug($request->name); //penamaan file sesuai sama nama
        $data = $request->all();

        if ($data["employee_id"]) {
            $employees = Employee::firstWhere('name', $data["employee_id"]);
            $data["employee_id"] = $employees->id;
        }

        if ($request->hasFile('license')) {
            $file = $request->file('license');
            $file->move(public_path() . "/images/license", "$filename.png");
            $data["license"] = "images/license/$filename.png";
        }

        $asset->update($data);
        return redirect('/asset');
    }

    public function destroy($id)
    {
        $asset = asset::find($id);
        $asset->delete();

        return redirect('/asset');
    }

    public function typelist($type_asset)
    {
        $assets = Asset::where('type_asset', $type_asset)->get();

        if ($type_asset == 'spare') {
            $assets = Asset::where('employee_id', null)->get();
        }

        return view("assetlist", compact("assets"));
    }

    public function detail($asset_id)
    {
        $asset = Asset::firstWhere('asset_id', $asset_id);
        $progressPercentage = 0;
        $timeLeft = 0;
        $timeLeft = 0;

        if ($asset->type_asset == "license") {
            // Define the target date (just the date, no specific time)
            $targetDate = Carbon::parse($asset->expired);

            // Get the current date
            $now = Carbon::now();

            // Get the start of the current year (e.g., 2024-01-01)
            $startOfYear = Carbon::now()->startOfYear();

            // Calculate the total number of days from the start of the year to the target date
            $totalDays = $startOfYear->diffInDays($targetDate);

            // Calculate how many days are left between now and the target date
            $daysLeft = max(0, $now->diffInDays($targetDate, false)); // Ensure no negative values

            // Calculate the number of days that have passed since the start of the year
            $daysPassed = $totalDays - $daysLeft;

            // Calculate the progress percentage
            $progressPercentage = (($daysPassed / $totalDays) * 100);
        }

        return view('detail', compact('progressPercentage', 'daysLeft', 'asset'));
    }

    // public function show($type) {
    //     $type = Type::where('name', $type)->get();
    //     $assets = Asset::where('type_id', $type->id)->get();

    //     return view('');
    // }

}
