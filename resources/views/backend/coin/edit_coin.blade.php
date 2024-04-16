@extends('frontend_dashboard')

@section('main')
    <div class="main-content mt-5">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>
                            Edit Coin
                        </h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn-sm btn-success mx-1" href="">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('update.coin') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="coin_id" value="{{ $coin->id }}">
                    <div class="form-group">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id=""
                            value="{{ $coin->name }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Volume</label>
                        <textarea type="text" name="volume" class="form-control">{{ $coin->volume }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control" id="" cols="30" rows="10">{{ $coin->description }}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
