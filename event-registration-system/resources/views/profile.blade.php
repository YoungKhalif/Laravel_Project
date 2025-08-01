@extends('layouts.app')

@section('title', 'My Profile - EventPro')

@section('content')
    <x-profile-editor :user="Auth::user()" />
@endsection
