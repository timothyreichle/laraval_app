<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Note extends Model

{



  	use SoftDeletes;	


	protected $dates = ['deleted_at'];

	protected $table = 'note';
	protected $primaryKey = 'noteid';

	static  function getUserList(){

		Note::onlyTrashed()->restore();

		if(!Auth::User()){
			Abort(401, "The Guest User is not authorized to use this function ");
		}else{
			return 	Note::where('id',Auth::user()->id)->get();
		}
	}
   //
}
