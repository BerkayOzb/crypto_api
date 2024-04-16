@extends('frontend_dashboard')

@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
    @endphp
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
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
                <div class="h3 mb-0"> Change Password</div>
            </div>
            <!-- Form -->
            <div>
                <form method="POST" action="{{ route('user.password.update') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="name">Current Password</label>
                            <input type="password" class="form-control" value="" id="old_password" name="old_password"
                                placeholder="Current Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="name">New Password</label>
                            <input type="password" class="form-control" value="" id="password" name="new_password"
                                placeholder="New Password">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="new_password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" value="" id="new_password_confirmation"
                                name="new_password_confirmation" placeholder="Confirm Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Change</button>
                </form>
            </div>
            <div>
                <form action="" method="post">
                </form>
            </div>
            <!-- End Form -->
        </div>
    </div>
@endsection
