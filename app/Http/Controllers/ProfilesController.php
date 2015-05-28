<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\Business;


class ProfilesController extends Controller {

	//

	public function create(){
		$businesses = Business::all();
		return view('profile.create',compact('businesses'));
	}
	public function store(Request $request){
		$profiles=Profile::where('business_id',$request['business_id'])->get();
		if(count($profiles) >= 3){
			return redirect('/');
		}else{
			$order = count($profiles)+1;
			$profile = new Profile();
			$validator = $profile->validator($request->all());
			if ($validator->fails())
			{
				$this->throwValidationException(
					$request, $validator
				);
			}
			Profile::create([
				'url' => $request['url'],
				'order' => $order,
				'business_id' => $request['business_id'],
			]);

			return redirect('/');
		}
	}

	public function show($id){
		$profiles=Profile::where('business_id',$id)->get();
		return view('profile.index',compact('profiles')); 
	}

	public function save(){
		$json=json_decode($_GET['data']);
		foreach($json as $obj){
			$profile = Profile::find($obj->id);
			$profile->order = $obj->value;
			$profile->save();
		}
		return "success";
	}
}
