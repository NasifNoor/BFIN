<?php

namespace App\Http\Controllers;
use Validator;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
    	return view('Registration.index');
    }
    public function register(Request  $req)
    {
    	$validation = Validator::make($req->all(), [
            'name'=>'required',
            'email'=> 'required|unique:users|regex:/^.+@.+$/i',
            'address'=>'required',
            'password'=>'required|min:3',
            'confirmPassword'=>'required|same:password',
		])->validate();
      
            $user  = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->address = $req->address;
            $user->password = $req->password;
            $user->save();
        
            $req->session()->flash('msg', "A new User is added Successfully");
            
            return redirect()->route('login.index');

    }

}
