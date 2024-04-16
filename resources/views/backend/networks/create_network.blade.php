@extends('frontend_dashboard')
@section('main')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>
                        Create Network
                    </h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn-sm btn-success btn mx-1" href="{{ route('all.network') }}">Go Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('store.network') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
