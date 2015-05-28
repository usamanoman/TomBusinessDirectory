<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Profile extends Model {

	protected $table = 'profiles';

	protected $fillable = ['url', 'order','business_id'];

	protected $hidden = ['business_id'];

	public function validator(array $data)
	{
		return Validator::make($data, [
			'order' => 'integer|max:255',
			'url' => 'required|url|max:255',
			'business_id' => 'required|integer|max:255',
		]);
	}


	public function business()
    {
        return $this->belongsTo('App\Business');
    }

}
