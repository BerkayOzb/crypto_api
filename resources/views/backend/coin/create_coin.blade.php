@extends('backend.backend_dashboard')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>
                        Create Coin
                    </h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn-sm btn-success btn mx-1" href="{{ route('all.coin') }}">Go Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('store.coin') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Volume</label>
                    <input type="text" name="volume" class="form-control" id="">
                </div>

                <div class="form-group ">
                    <label for="" class="form-label">Network</label>
                    <select class="form-control" name="network_id" required id="network_id">
                        <option value="option_select" disabled selected>Networks</option>
                        @foreach ($networks as $network)
                            <option value="{{ $network->id }}">
                                {{ $network->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Description</label>
                    <textarea type="text" name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
