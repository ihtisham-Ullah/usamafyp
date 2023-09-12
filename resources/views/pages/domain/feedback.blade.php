@extends('layout.main')

@section('content')
    <div class="container">
        <h2 class="text-center mt-5 fw-bold" style="color:#057689">Post Feed Back</h2>
        <form method="post" action="{{ route('domain.feedback') }}">
            @csrf

            <div class="row mt-5">
                <label for="" class="fw-1 fs-4 text-center mb-3">Enter Feed Back</label>
            </div>
            <div class="row">
                <input type="text" placeholder="website url" class="w-75 m-auto form-control" name="name">
            </div>
            <div class="row mt-3">
                <textarea type="text" placeholder="feedback" class="w-75 m-auto form-control" name="content"></textarea>
            </div>
            <div class="row">
                <button class="btn btn-secondary w-25 m-auto my-3" style="background-color:#057689">Submit</button>
            </div>
        </form>
    </div>
@endsection
