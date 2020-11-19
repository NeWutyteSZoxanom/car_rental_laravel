<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   protected $fillable = array(
        'book_from',
        'book_to'
    );

	public static $rules = array(
		'car_id'=>'required|integer',
		'pick_up_date'=>'required|date|date_format:"Y-m-d"|start_time',
		'drop_off_date'=>'required|date|date_format:"Y-m-d"|end_time:pick_up_date'
	);

	public function car() {
		return $this->belongsTo('Car');
	}

	public function user() {
		return $this->belongsTo('User');
	}
}
