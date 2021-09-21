@extends('layouts.app')

@section('content')
	<user-show :user-id="{{ $userId }}"></user-show>
@endsection
