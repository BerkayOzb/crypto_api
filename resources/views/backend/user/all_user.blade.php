@extends('backend.backend_dashboard')

@section('content')
    <div class="mb-3">
        <a class="btn-sm btn-success mx-1 btn" href="{{ route('create.user') }}">Create</a>
    </div>
    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Users Table</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-m pull-up" title="{{ $user->name }}">
                                        <img src="{{ !empty($user->image) ? asset($user->image) : url('uploads/image/user.png') }}"
                                            alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                            </td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user->name }}</strong>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            @if ($user->status === 'active')
                                <td><span class="badge bg-label-success me-1">{{ $user->status }}</span></td>
                            @else
                                <td><span class="badge bg-label-danger me-1">{{ $user->status }}</span></td>
                            @endif
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ $user->role === 'user' ? route('edit.user', $user->id) : route('admin.profile', $user->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="{{ route('delete.user', $user->id) }}"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>
                                        <a class="dropdown-item" href="{{ route('status.user', $user->id) }}"><i
                                                class="bx bx-rotate-right me-1"></i>
                                            Active/Inactive</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links('pagination.pagination') }}
        </div>
    </div>
    <!--/ Striped Rows -->
@endsection
