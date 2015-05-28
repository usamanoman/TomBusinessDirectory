<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Business;
use App\User;
use Illuminate\Http\Request;
use Auth;
class BusinessesController extends Controller {

	//

	public function index(){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		$businesses=Business::all();
		return view('business.index',compact('businesses'));
	}
	public function create(){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		$users = User::all();
		return view('business.create',compact('users'));
	}
	public function store(Request $request)
	{
		if(Auth::user()->id === 2){
			return redirect('/');
		}
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
