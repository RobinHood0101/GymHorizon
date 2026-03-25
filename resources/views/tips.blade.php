@php use Statamic\Eloquent\Entries\Entry; @endphp
@extends('layouts.app')

@section('title', 'Tipps | GymHorizon')

@section('hero')
    <header>
        <h1 class="p-3 text-center">Tipps</h1>
    </header>
@endsection

@section('content')
    <div class="container py-4 py-xl-5">
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            @foreach($entries as $entry)
                <div class="col">
                    <div>
                        <img class="rounded img-fluid object-fit-cover d-block w-100 img-h-200"
                             src="{{ asset($entry->image) }}" alt="{{ $entry->title }}"/>
                        <div class="py-4">
                            <h4>{!! $entry->title !!}</h4>
                            <p>{!! $entry->content !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
