@extends('backend.layouts.master')

@section('main_content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="card text-bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Number of Notes You Have</div>
        <div class="card-body">
            <h5 class="card-title">{{ Auth::user()->name ?? '' }}</h5>
            <p class="card-text">{{ $number_of_notes ?? '' }} Notes</p>
        </div>
    </div>
@endsection
