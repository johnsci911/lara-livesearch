@extends('layouts.app')

@section('content')
	<user-create-edit :user-id="{{ $userId ?? 0 }}" button-type="add"></user-edit>
@endsection
