@extends('layouts.app')

@section('content')
<inbox-page csrf="{{ csrf_token() }}x" ></voting-page>
@endsection
