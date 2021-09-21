@extends('layouts.app')

@section('content')
	<user-create-edit :user-id="{{ $userId }}" button-type="edit"></user-edit>
@endsection
