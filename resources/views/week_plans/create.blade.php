@php use App\Models\TrainingPlan; @endphp
@extends('layouts.app')

@section('title', 'Wochenplan | Gymhorizon')

@section('hero')
    <header>
        <h1 style="padding: 15px;text-align: center;">Wochenplan erstellen</h1>
    </header>
@endsection

@section('content')
    <form action="{{ route('week-plans.store') }}" method="POST">
        @csrf

        <label class="form-label" for="title">Titel</label>
        <input class="form-control" type="text" name="title" id="title" required autofocus/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Tag</th>
                    <th>Trainingsplan</th>
                    <th>Notizen</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $days = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'];
                    $trainingPlans = auth()->user()->trainingPlans;
                @endphp
                @foreach($days as $index => $day)
                    <tr>
                        <td>{{ $day }}</td>
                        <td>
                            <select class="form-select" name="days[{{ $index }}][training_plan_id]">
                                <optgroup label="Wähle einen Trainingsplan">
                                    <option value="rest" selected>Rest Day</option>
                                    @foreach($trainingPlans as $trainingPlan)
                                        <option value="{{$trainingPlan->id}}">{{ $trainingPlan->name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('days.$index.training_plan_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input class="form-control" type="text" name="days[{{ $index }}][notes]">
                            <input type="hidden" name="days[{{ $index }}][day]" value="{{ $day }}">
                            @error('days.$index.notes')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <input class="btn btn-primary" type="submit" value="Erstellen"/>
        @error('title')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </form>
    <a href="{{ route('week-plans.index') }}" class="btn btn-secondary mt-3">Zurück</a>
@endsection
