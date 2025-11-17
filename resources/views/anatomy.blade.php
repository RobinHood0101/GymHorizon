@extends('layouts.app')

@section('title', 'Anatomie | Gymhorizon')

@section('hero')
    <header>
        <h1 style="padding: 15px;text-align: center;">Anatomie</h1>
    </header>
@endsection

@section('content')
    @include('statamic.anatomy')
@endsection
