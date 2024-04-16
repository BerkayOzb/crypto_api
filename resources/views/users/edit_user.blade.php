@extends('frontend_dashboard')

@section('main')
    <div class="card mb-3 mb-md-4">

        <div class="card-body">
            <!-- Breadcrumb -->
            <nav class="d-none d-md-block" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Users</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User Detail</li>
                </ol>
            </nav>
            <!-- End Breadcrumb -->

            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0"> <b> {{ Str::upper($user->name) }} </b> Details</div>
            </div>


            <!-- Form -->
            <div>
                <form method="POST" action="{{ route('update.user') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" id="name"
                                name="name">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" id="email"
                                name="email">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" value="{{ $user->phone }}" id="phone"
                                name="phone">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" value="{{ $user->username }}" id="username"
                                name="username">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                value="ThemeSelection" />
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Edit</button>
                    </div>
                    {{-- <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" value="" id="password" name="password"
                                placeholder="New Password">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="password_confirm">Confirm Password</label>
                            <input type="password" class="form-control" value="" id="password_confirm"
                                name="password_confirm" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="randomPassword">
                        <label class="custom-control-label" for="randomPassword">Set Random Password</label>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Create</button> --}}
                </form>
            </div>
            <!-- End Form -->
        </div>
    </div>
@endsection
