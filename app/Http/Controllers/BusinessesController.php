<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Business;
use App\Profile;
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
	public function remove($id){
		Profile::where('business_id', $id)->delete();
		Business::destroy($id);
		return redirect('/');
	}
	public function create(){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		$users = User::all();
		return view('business.create',compact('users'));
	}

	public function edit($id){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		$users = User::all();
		$business=Business::find($id);
		return view('business.edit',array('business'=>$business,'users'=>$users));	
	}
	

	public function update($id,Request $request){
		if(Auth::user()->id === 2){
			return redirect('/');
		}
		$business=Business::find($id);
		$validator = $business->validator($_POST);
		if(!$validator->fails()){
			$business->name = $request['name'];
			$business->address = ($request['address']);
			$business->city = $request['city'];
			$business->state = $request['state'];
			$business->zip = ($request['zip']);
			$business->website = $request['website'];
			$business->phone = $request['phone'];
			$business->user_id = ($request['user_id']);	
			$business->save();
			return redirect('/');
		}else{
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
