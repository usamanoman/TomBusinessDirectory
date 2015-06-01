<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Business;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Auth;

class UsersController extends Controller {
	public function my(){
		$user=User::find(Auth::user()->id);
		return view('users.my',compact('user'));
	}
	public function business(){
		$business = Business::where('user_id',Auth::user()->id)->with(['profiles' => function($query)
		{
		    $query->orderBy('order');

		}])->first();
		return view('users.business',compact('business'));
			
	}

	public function remove($id){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		User::destroy($id);
		return redirect('/');
	}
	//
	public function index(){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		$users=User::all();
		//dd($users);
		return view('users.index',compact('users'));
	}
	public function create(){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		return view('users.create');
	}
	public function edit($id){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		$user=User::find($id);
		return view('users.edit',compact('user'));	
	}


	public function update($id,Request $request){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		$user=User::find($id);
		$validator=$user->validator_update($_POST);
		if(!$validator->fails()){
			$user->email = $request['email'];
			$user->password = base64_encode($request['password']);
			$user->name = $request['name'];
			$user->save();
			return redirect('/');
		}
		else{
			$this->throwValidationException(
				$request, $validator
			);
		}
	}
	public function store(Request $request)
	{
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		$user = new User();
		$validator = $user->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}
		User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'status' => 2,
			'password' => base64_encode($request['password']),
		]);

		return redirect('/');
	}
}
