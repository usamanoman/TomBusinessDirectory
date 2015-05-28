<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Business;
use App\User;
use Illuminate\Http\Request;

class BusinessesController extends Controller {

	//

	public function index(){
		$businesses=Business::all();
		return view('business.index',compact('businesses'));
	}
	public function create(){
		$users = User::all();
		return view('business.create',compact('users'));
	}
	public function store(Request $request)
	{
		$business = new Business();
		$validator = $business->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}
		Business::create([
			'name' => $request['name'],
			'address' => $request['address'],
			'phone' => $request['phone'],
			'state' => $request['state'],
			'zip' => $request['zip'],
			'city' => $request['city'],
			'user_id' => $request['user_id'],
			'website' => $request['website'],
		]);

		return redirect('/');
	}

	public function show($id){
		
	}

	
}
