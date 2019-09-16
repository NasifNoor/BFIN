<?php
namespace App\Http\Controllers;
use Validator;
use app\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
    	return view('login.index');
    }
    public function verify(Request $req){	
        $validation = Validator::make($req->all(), [
            'email'=>'required',
            'password'=>'required',
        ])->validate();

		$result = DB::table('users')->where('email', $req->email)
		->where('password', $req->password)
		->get();
	
		if(count($result) > 0){
			$req->session()->put('usremail', $result[0]->email);
			$req->session()->put('id', $result[0]->id);
			return redirect()->route('User.index');
		}else{
			$req->session()->flash('msg', 'Email & password don\'t match');
			return view('login.index');
		}
	}
}
