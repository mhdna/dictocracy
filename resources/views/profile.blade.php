@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="flex flex-col justify-between">
        <div>
            {{ $user->name }}
        </div>
        <div>
            {{ $user->email }}
        </div>
    </div>
@endsection
