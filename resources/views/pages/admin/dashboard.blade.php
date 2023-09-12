@extends('layout.main')

@section('content')
    <div class="row text-light boxes">
        <div class="col-4">
            <a href="{{ route('admin.domain.index') }}" class="nav-link">
                <div class="bg-blue shadow my-3 px-3 py-3 rounded-3">
                    <h6>Check Website</h6>
                    <i></i>
                    <h3>{{ number_format($data['domains'], 0, '.', ',') }}</h3>
                    <input type="range">
                </div>
            </a>
        </div>
    </div>
@endsection
