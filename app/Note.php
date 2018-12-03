<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Note extends Model

{

	protected $attributes = [
        'x' => 100,
		'y' => 100,
		'width' => 100,
		'height' => 100,
		'sortorder' => 1,
		'text'=>''
    ];

  	use SoftDeletes;	


	protected $dates = ['deleted_at'];

	protected $table = 'note';
	protected $primaryKey = 'noteid';
    public function __construct()
    {	
		parent::__construct();
		
		
		$this->id = Auth::user()->id;
	}
	
	
	static  function getUserList(){

		if(!Auth::User()){
			Abort(401, "The Guest User is not authorized to use this function ");
		}else{
			return 	Note::where('id',Auth::user()->id)->get();
		}
	}
	
	
   //
}
