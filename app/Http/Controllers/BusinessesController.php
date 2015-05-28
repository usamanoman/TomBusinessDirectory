<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Business;
use Illuminate\Http\Request;

class BusinessesController extends Controller {

	//

	public function index(){
		$businesses = Business::all();
		return $businesses;
	}

	
}
