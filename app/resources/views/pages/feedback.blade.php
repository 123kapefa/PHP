@extends('layout')

@section('title', 'Feedback')

@section('content')
{{--    @if (session('status'))--}}
{{--        <div class="alert alert-success">--}}
{{--            {{ session ('status') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <u>--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </u>--}}
{{--        </div>--}}
{{--    @endif--}}

    <div style="display: flex; flex-direction: column">
        <form id="loginForm" method="post" action="{{ route('feedback.up') }}" style="display: flex; margin: 30px 0; flex-direction: column">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Phone</label>
                <input type="text" class="form-control" name="phone" id="exampleInputPhone" placeholder="Phone">
            </div>
            <div class="form-group">
                <label for="exampleInputText">Text</label>
                <input type="text" class="form-control" name="text" id="exampleInputText" placeholder="Text">
            </div>
            <button type="submit" class="btn btn-primary">Feedback</button>
        </form>
    </div>
@endsection
