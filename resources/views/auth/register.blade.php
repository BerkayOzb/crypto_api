@extends('layouts.grain-auth')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <div class="container-fluid pb-5">

        <div class="row justify-content-md-center">
            <div class="card-wrapper col-12 col-md-4 mt-5">
                <div class="brand text-center mb-3">
                    <a href="/"><img src="{{ asset('img/logo.png') }}"></a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create new account</h4>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required=""
                                    autofocus="">
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" required="">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="password">Password
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password"
                                        required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password">Confirm Password
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password_confirmation"
                                        required="">
                                </div>
                            </div>

                            <div class="form-group no-margin">
                                <button class="btn btn-primary btn-block">Sign Up</button>
                            </div>

                            <div class="text-center mt-3 small">
                                Already have an account? <a href="{{ route('login') }}">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
                <footer class="footer mt-3">
                    <div class="container-fluid">
                        <div class="footer-content text-center small">
                            <span class="text-muted">&copy; 2019 Karabuga. All Rights Reserved.</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
