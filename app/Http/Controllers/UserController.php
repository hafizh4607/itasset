<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

        public function index(){
            $users = user::get();
            return view('userlist', compact('users'));
        }
    
        public function create(){
            return view('user');
        }
    
        public function store(Request $request){
            // dd($request->all());
           
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
            ]);
            return redirect('/user');
        }
    
        public function edit($id){
            $users = user::find($id);
            return view('useredit', compact('users'));
        }
    
        public function update(Request $request, $id) {
            $user = user::find($id);
            $data = $request->all();
            $data ['password'] = bcrypt($data['password']);
            $user->update($data);
            return redirect('/user');
        }
     
    
        public function destroy($id){
            $users = user::find($id);
            $users->delete();
    
            return redirect('/user');
        }
    
    }

