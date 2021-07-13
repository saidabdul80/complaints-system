@extends('layouts.app')

@section('content')
	@if (Session::has('status'))      
		<complaints-page status="{{session('status')}}"></complaints-page>
	@else
		<complaints-page status=""></complaints-page>	
	@endif
@endsection
