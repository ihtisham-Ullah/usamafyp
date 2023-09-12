@extends('layout.main')

@section('content')
    <div class="container">
        <h2 class="text-center mt-5 fw-bold" style="color:#057689">Add Phishing Url To Black List</h2>
        <form method="post" action="{{ route('domain.blacklist') }}">
            @csrf

            <div class="row mt-5">
                <label for="" class="fw-1 fs-4 text-center mb-3">Enter Url</label>
            </div>
            <div class="row">
                <input type="text" class="w-75 m-auto form-control" name="name">
            </div>
            <div class="row">
                <button class="btn btn-secondary w-25 m-auto my-3" style="background-color:#057689">Add</button>
            </div>
        </form>
    </div>
@endsection
