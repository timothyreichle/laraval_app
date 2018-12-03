@extends('layouts.app')

@section('scripts')
	<script src="{{ asset('js/note/note.js')}}"></script>
@endsection

@section('style')
	<style type="text/css">
		.noteDiv{
			border:black solid 1px;
		}
		
		.delete{
			height:20px; 
			right:0px; 
			position:absolute; 
			border-left: black solid 1px;			
		}
		
		.noteTitle{
			height:20px; 
			border-bottom: 1px solid black;
		}
		
		.noteContents{
			height:calc(100% - 20px); 
			width:100%
		}
	</style>
@endsection

@section('content')
<div style="" id="noteContainer" style="position: relative; height:100%;">
</div>
<div id="addNote" style="position: absolute; right:0px; bottom: 0px; font-size:50px">
	+
</div>
@endsection
