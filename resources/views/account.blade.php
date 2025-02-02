@extends('layouts.app')

@section('title', 'User Account')

@section('content')
    <div class="flex flex-col justify-between mb-36">
        <div>
            {{ $user->name }}
        </div>
        <div>
            {{ $user->email }}
        </div>
    </div>
@endsection
