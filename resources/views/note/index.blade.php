@extends('layouts.app')

@section('scripts')
	<script src="{{ asset('js/format/string.js')}}"></script>
	<script src="{{ asset('js/note/note.js')}}"></script>
@endsection

@section('style')
    <LINK href="{{ asset('css/note/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div style="" id="noteContainer" style="position: relative; height:100%;">
</div>
<div id="addNote" style="position: absolute; right:0px; bottom: 0px; font-size:50px">
	<img src="{{ asset('/images/buttons/add.png') }}" style="width:50px; height:50px">
</div>
@endsection
