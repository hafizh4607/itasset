<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request){
        $employees = Employee::get();

        if($request->search) {
        

            $employees = Employee::where('name', "LIKE", "%$request->search%")
            ->orWhere('department', "LIKE", "%$request->search%")
            ->orWhere('jabatan', "LIKE", "%$request->search%")
           
            ->get();
        } 

        
        return view('employeelist', compact('employees'));
    }

    public function create(){
        return view('employee');
    }

    public function store(Request $request){
        // dd($request->all());
        $filename = str()->slug($request->name); 
        
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $file ->move(public_path()."/images/pp/" , "$filename.png");
            $data["foto"] = "images/pp/$filename.png";
        } else {
            $filename = "default";
        }

        Employee::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'gender' => $request->gender,
            'jabatan' => $request->jabatan,
            'department' => $request->department,
            'asset_id' => $request->asset_id,
            'foto' => "images/pp/$filename.png" 
        ]);
        return redirect('/employee');
    }

    public function edit($id){
        $employees = Employee::find($id);
        return view('employeedit', compact('employees'));
    }

    public function update(Request $request, $id) {
        $employees = Employee::find($id);
        $employees->update($request->all());
        return redirect('/employee');
    }
 

    public function destroy($id){
        $employees = Employee::find($id);
        $employees->delete();

        return redirect('/employee');
    }

}
