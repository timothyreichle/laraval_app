@extends('layouts.app')

@section('scripts')	
	<script src="{{ asset('js/shop/shop.js')}}"></script>
@endsection

@section('style')
    <LINK href="{{ asset('css/shop/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('title')
	Shopping
@endsection

@section('content')


	<div id="products">
		@include('shop.productList')
	</div>


@endsection
