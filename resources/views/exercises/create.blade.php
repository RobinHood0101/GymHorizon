@extends('layouts.app')

@section('title', 'Übung erstellen | Gymhorizon')

@section('hero')
    <header>
        <h1 style="padding: 15px;text-align: center;">Übung erstellen für {{ $category->name }}</h1>
    </header>
@endsection

@section('content')
    <form action="{{ route('exercises.store') }}" method="POST">
        @csrf

        <label class="form-label" for="name">Name</label>
        <input class="form-control" type="text" name="name" id="name" required autofocus/>

        <label class="form-label" for="description">Beschreibung</label>
        <input class="form-control" type="text" name="description" id="description"/>

        <label class="form-label" for="place">Ort</label>
        <input class="form-control" type="text" name="place" id="place"/>

        <input type="hidden" name="category_id" value="{{ $category->id }}"/>

        <input class="btn btn-primary" type="submit" value="Erstellen"/>
        @if ($errors->any())
            <div class="mt-3 text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <a href="{{ route('exercises.index') }}" class="btn btn-secondary mt-3">Zurück</a>
@endsection
