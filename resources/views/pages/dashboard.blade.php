@extends('layout.main')

@section('content')
    <div class="row text-light boxes">
        <div class="col-4">
            <a href="{{ route('domain.check.view') }}" class="nav-link">
                <div class="bg-blue shadow my-3 px-3 py-3 rounded-3">
                    <h6>Check Website</h6>
                    <i></i>
                    <h3>{{ number_format($data['domains'], 0, '.', ',') }}</h3>
                    <input type="range">
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('domain.blacklist.view') }}" class="nav-link">
                <div class="bg-red shadow my-3 px-3 py-3 rounded-3">
                    <h6>Blacklist</h6>
                    <i></i>
                    <h3>{{ number_format($data['blacklists'], 0, '.', ',') }}</h3>
                    <input type="range">
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('domain.feedback.view') }}" class="nav-link">
                <div class="bg-green shadow my-3 px-3 py-3 rounded-3">
                    <h6>Feedback</h6>
                    <i></i>
                    <h3>{{ number_format($data['feedbacks'], 0, '.', ',') }}</h3>
                    <input type="range">
                </div>
            </a>
        </div>
    </div>
@endsection
