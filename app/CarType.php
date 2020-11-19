<?php

namespace App;
use App\Car;
use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    protected $fillable = array('name');

	public static $rules = array('name'=>'required|min:3');

	public function cars() {
		return $this->hasMany('Car');
	}
}
