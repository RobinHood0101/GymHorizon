@extends('layouts.app')

@section('title', 'Tipps | GymHorizon')

@section('hero')
    <header>
        <h1 style="padding: 15px;text-align: center;">Tipps</h1>
    </header>
@endsection

@section('content')
    @include('statamic/tips')
@endsection
