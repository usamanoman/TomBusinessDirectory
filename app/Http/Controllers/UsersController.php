<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class UsersController extends Controller {

	//

	public function create(){
		return view('users.create');
	}
	public function store(Request $request)
	{
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
