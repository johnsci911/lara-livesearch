@extends('layouts.app')

@section('content')
	<user-edit :user-id="{{ $userId }}"></user-edit>
@endsection
