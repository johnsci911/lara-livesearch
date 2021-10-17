@extends('layouts.app')

@section('content')
	<user-create-edit :user-id="{{ $userId }}" :companies="{{ $companies }}" button-type="edit"></user-edit>
@endsection
