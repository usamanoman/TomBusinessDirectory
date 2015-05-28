<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Business extends Model {

	//
	protected $table = 'businesses';

	protected $fillable = ['name', 'address', 'city','state','zip','phone','website','user_id'];

	protected $hidden = ['user_id'];

	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'address' => 'required|max:255',
			'city' => 'required|max:255',
			'phone' => 'required|max:255',
			'zip' => 'required|integer',
			'address' => 'required|max:255',
			'state' => 'required|max:255',
			'website' => 'required|url|max:255',
			'user_id' => 'required|integer|max:255',
		]);
	}
	public function profiles()
    {
        return $this->hasMany('App\Profile');
    }
}
