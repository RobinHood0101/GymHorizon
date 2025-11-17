@php use App\Models\TrainingPlan; @endphp
@extends('layouts.app')

@section('title', 'Wochenplan | Gymhorizon')

@section('hero')
    <header>
        <h1 style="padding: 15px;text-align: center;">Wochenplan bearbeiten</h1>
    </header>
@endsection

@section('content')
    <form action="{{ route('week-plans.update', $weekPlan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="form-label" for="title">Titel</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ $weekPlan->title }}" autofocus/>
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
                    $dayPlansForWeekPlan = $weekPlan->dayPlans;
                @endphp
                @foreach($dayPlansForWeekPlan as $index => $dayPlan)
                    <tr>
                        <td>{{ $dayPlan->day }}</td>
                        <td>
                            <select class="form-select" name="days[{{ $index }}][training_plan_id]">
                                <optgroup label="Wähle einen Trainingsplan">
                                    <option value="rest">Rest Day</option>
                                    @foreach($trainingPlans as $trainingPlan)
                                        <option value="{{$trainingPlan->id}}" @selected($trainingPlan->id === $dayPlan->training_plan_id)>{{ $trainingPlan->name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="days[{{ $index }}][notes]"
                                   value="{{  $weekPlan->dayPlans->firstWhere('day', $dayPlan->day)->notes ?? '' }}">
                            <input type="hidden" name="days[{{ $index }}][day]" value="{{ $dayPlan->day }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <input class="btn btn-primary" type="submit" value="Speichern"/>
        @error('plan_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </form>
    <a href="{{ route('week-plans.index') }}" class="btn btn-secondary mt-3">Zurück</a>
@endsection
