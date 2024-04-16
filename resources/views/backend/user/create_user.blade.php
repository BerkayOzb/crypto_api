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
                    <li class="breadcrumb-item active" aria-current="page">Create User</li>
                </ol>
            </nav>
            <!-- End Breadcrumb -->

            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Create User</div>
            </div>


            <!-- Form -->
            <div>
                <form method="POST" action="{{ route('register.user') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="" id="name" name="name"
                                required="" placeholder="User Name">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="" id="email" name="email"
                                required="" placeholder="User Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" value="" id="password" name="password"
                                required="" placeholder="New Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </form>
            </div>
            <!-- End Form -->
        </div>
    </div>
@endsection
