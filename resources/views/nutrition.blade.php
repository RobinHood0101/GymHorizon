@php use Statamic\Eloquent\Entries\Entry; @endphp
@extends('layouts.app')

@section('title', 'Ernährung | GymHorizon')

@php
    $entries = Entry::query()
          ->where('collection', 'nutrition')
          ->limit(5)
          ->get();
@endphp

@section('content')
    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h1>Ernährung</h1>
                <p class="w-lg-50">Die Ernährung ist ein wichtiger Faktor beim Muskelaufbau und Training.</p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2">
            @foreach($entries as $entry)
                <div class="col">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="w-100">
                            <img class="rounded img-fluid d-block w-100 fit-cover"
                                 alt="{{ $entry->title }}"
                                 style="height: 200px;max-width: 100%;"
                                 src="{{ $entry->image[0] }}">
                        </div>
                        <div class="py-4 py-lg-0 px-lg-4">
                            <h4>{!! $entry->title !!}</h4>
                            <p>{!! $entry->content !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
