@extends('layout')

@section('title', 'Login')

@section('content')
    {{--    <h1>Login</h1>--}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session ('status') }}
        </div>
    @endif
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
        <form id="loginForm" method="post" action="{{ route('login.up') }}" style="display: flex; margin: 30px 0; flex-direction: column">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPasswordRepeat">Repeat Password</label>
                <input type="password" class="form-control" name="repeatPassword" id="exampleInputPasswordRepeat" placeholder="Repeat Password">
            </div>
            <button type="button" onclick="toggleForms()" style="border: none; background-color: transparent; margin: 10px 0">Reset password</button>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <form id="resetForm" method="post" action="{{ route('login.resetPassword') }}" style="display: none; margin: 30px 0; flex-direction: column">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmailReset" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <button type="button" onclick="toggleForms()" style="border: none; background-color: transparent; margin: 10px 0">Sign in</button>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script>
        function toggleForms() {
            const loginForm = document.getElementById("loginForm");
            const resetForm = document.getElementById("resetForm");

            if (loginForm.style.display === "none") {
                loginForm.style.display = "flex";
                resetForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                resetForm.style.display = "flex";
            }
        }
    </script>

    <!-- info section -->
    @include('sections.info-section')
@endsection
