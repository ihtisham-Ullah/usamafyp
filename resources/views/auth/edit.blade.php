@extends('layout.main')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('auth.edit') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12"><h2>Edit Information</h2></div>
                <div class="col-3">
                    <img src="{{ asset('storage/avatars/'.auth()->user()->avatar) }}" class="w-100 pb-5" alt="profile image">
                </div>
                <div class="col-9">
                    <input
                        class="themecolor px-5 py-2 mt-5 mano border-0"
                        type="file"
                        name="avatar"
                        id="avatar"
                        accept="image/jpeg,image/png"
                        max="20000">
                    <p class="text-dark py-2">Acceptance formats jpg png only max file size will be 20mb</p>
                    @error("avatar")
                    <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-dark">Account Information</h2>
                </div>
                <div class="col-md-3">
                    <label class="text-dark my-3">Name</label>
                </div>
                <div class="col-md-9">
                    <input
                        class="my-3"
                        type="text"
                        name="name"
                        value="{{ auth()->user()->name }}">
                    @error("name")
                    <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="text-dark my-3">Email</label>
                </div>
                <div class="col-md-9">
                    <input
                        class="my-3"
                        type="text"
                        name="email"
                        value="{{ auth()->user()->email }}">
                    @error("email")
                    <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <button class="btn btn-secondary w-25 m-auto my-3" style="background-color:#057689">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
