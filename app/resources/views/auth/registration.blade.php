@extends('layout')

@section('title', 'Registration')

@section('content')
{{--    <h1>Registration</h1>--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <u>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </u>
        </div>
    @endif
    <div style="flex-direction: column; display: flex; align-items: center; justify-content: center; margin: 2rem; height: 50vh">
    <form method="post" action="{{ route('registration.store') }}" style="display: flex; flex-direction: column; width: 500px">
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" >Registration</button>
    </form>
    </div>

    <!-- info section -->
    @include('sections.info-section')
@endsection
