<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
     
	public	function listNotes(){

		$notes = \App\Note:: getUserList();

		$noteOutput = [];

		foreach($notes as $note){
			$noteOutput[] = [
				"id"=> $note->noteid,
				"sortOrder"=> $note->sortorder,
				"x"=> $note->x,
				"y"=> $note->y,
				"text"=> $note->text
			];

		}

		echo(json_encode($noteOutput));
	}

//
}
