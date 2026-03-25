@php use Statamic\Eloquent\Entries\Entry; @endphp
@extends('layouts.app')

@section('title', 'Anatomie | Gymhorizon')

@section('hero')
    <header>
        <h1 style="padding: 15px;text-align: center;">Anatomie</h1>
    </header>
@endsection

@php
    $entries = Entry::query()
          ->where('collection', 'anatomy')
          ->limit(5)
          ->get();
@endphp

@section('content')
    <div class="container py-4 py-xl-5">
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            @foreach($entries as $entry)
                <div class="col">
                    <div>
                        <img class="rounded img-fluid object-fit-cover d-block w-100" style="height: 200px;" src="{{ $entry->image[0] }}"  alt="img"/>
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
