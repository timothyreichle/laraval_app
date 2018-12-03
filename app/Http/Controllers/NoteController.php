<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;;

class NoteController extends Controller
{

	public function saveText(){
	
		$input = Input::All();
		
		$note = \App\Note::find($input["noteid"]);
		
		$note->text = $input["text"];
		
		$note->save();
		
	}
	
	public function deleteNote(){
	
		$input = Input::All();
		$note = \App\Note::destroy($input["noteid"]);
		
	}
	
	
	public function newNote(){
	
		$note = new  \App\Note();
		
		
		
		$note->save();
		
		return $this->listNotes();
	
	}

	public function savePostion(){
	
		$input = Input::All();
				
		$note = \App\Note::find($input["noteid"]);
		
		$note->x = intval($input["left"]);
		$note->y =  intval($input["top"]);
		$note->width =  intval($input["width"]);
		$note->height =  intval($input["height"]);
		
		$note->save();
	
	}
     
	public	function listNotes(){

		$notes = \App\Note:: getUserList();

		$noteOutput = [];

		foreach($notes as $note){
			$noteOutput[] = [
				"id"=> $note->noteid,
				"sortOrder"=> $note->sortorder,
				"x"=> $note->x,
				"y"=> $note->y,
				"width"=> $note->width,
				"height"=> $note->height,
				"text"=> $note->text
			];

		}

		echo(json_encode($noteOutput));
	}

//
}

