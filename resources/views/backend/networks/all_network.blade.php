@extends('frontend_dashboard')
@section('main')
    <div class="mb-3">
        <a class="btn-sm btn-success mx-1 btn" href="{{ route('create.network') }}">Create</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered border-dark">
            <thead style="background: #f2f2f2">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Updated Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach ($networks as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="px-2 g-col-4"><a class="btn-sm btn-success btn p-2"
                                    href="{{ route('show.network', $item->id) }}">Show</a></div>
                            <div class="px-2 g-col-4"><a class="btn-sm btn-success btn p-2"
                                    href="{{ route('edit.network', $item->id) }}">Edit</a></div>
                            <div class="px-2 g-col-4"><a class="btn-sm btn-success btn p-2"
                                    href="{{ route('delete.network', $item->id) }}">Delete</a></div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $networks->links('pagination.pagination') }}
@endsection
