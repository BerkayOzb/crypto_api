@extends('frontend_dashboard')
@section('main')
    <div class="mb-3">
        <a class="btn-sm btn-success mx-1 btn" href="{{ route('create.coin') }}">Create</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered border-dark">
            <thead style="background: #f2f2f2">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" style="width:10%">Name - Network</th>
                    <th scope="col" style="width:20%">Volume</th>
                    <th scope="col" style="width:20%">Price</th>
                    <th scope="col" style="width:20%">Percent Change 24h</th>
                    <th scope="col" style="width:30%">Description</th>
                    <th scope="col" style="width:20%">Action</th>
                </tr>
            </thead>
            @foreach ($coins as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }} - {{ $item->network->name }}</td>
                    @if ($item->volume > 0)
                        <td class="bg-success">{{ $item->volume }}</td>
                    @else
                        <td class="bg-danger">{{ $item->volume }}</td>
                    @endif
                    <td>{{ $item->price }}</td>
                    @if ($item->percent_change_24h > 0)
                        <td class="bg-success">% {{ $item->percent_change_24h }}</td>
                    @else
                        <td class="bg-danger">% {{ $item->percent_change_24h }}</td>
                    @endif
                    <td>{{ $item->description }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="px-2 g-col-4"><a class="btn-sm btn-success btn p-2"
                                    href="{{ route('show.coin', $item->id) }}">Show</a></div>
                            <div class="px-2 g-col-4"><a class="btn-sm btn-success btn p-2"
                                    href="{{ route('edit.coin', $item->id) }}">Edit</a></div>
                            <div class="px-2 g-col-4"><a class="btn-sm btn-success btn p-2"
                                    href="{{ route('delete.coin', $item->id) }}">Delete</a></div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $coins->links('pagination.pagination') }}
@endsection
