@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">User List App</h1>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light text-dark font-weight-bold">
                {{ isset($user) ? 'Edit User' : 'New User' }}
            </div>
            <div class="card-body">
                @if (isset($user))
                    <form action="{{ url('users/update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="form-group mb-3">
                            <label class="form-label text-muted small font-weight-bold">User Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label text-muted small font-weight-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm px-4">Update User</button>
                        <a href="{{ url('users') }}" class="btn btn-secondary btn-sm px-4">Cancel</a>
                    </form>
                @else
                    <form action="{{ url('users/create') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label class="form-label text-muted small font-weight-bold">User Name</label>
                            <input type="text" name="name" class="form-control mb-3" placeholder="Enter user name"
                                required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label text-muted small font-weight-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="user@example.com"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm px-3 font-weight-bold">
                            + Add User
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light text-dark font-weight-bold">
                Current Users
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-striped m-0">
                    <thead>
                        <tr class="bg-light text-muted small font-weight-bold">
                            <th style="width: 35%;">User Name</th>
                            <th style="width: 35%;">Email Address</th>
                            <th style="width: 30%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="align-middle font-weight-bold text-dark">{{ $user->name }}</td>
                                <td class="align-middle text-secondary">{{ $user->email }}</td>
                                <td class="align-middle">
                                    <div class="d-flex">
                                        <form action="{{ url('users/delete/' . $user->id) }}" method="POST" class="mr-2">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-danger btn-sm px-3 d-flex align-items-center font-weight-bold"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash-alt mr-1"></i> Delete
                                            </button>
                                        </form>

                                        <form action="{{ url('users/edit/' . $user->id) }}" method="POST">
                                            @csrf<button type="submit"
                                                class="btn btn-info btn-sm text-white px-3 d-flex align-items-center font-weight-bold">
                                                <i class="fas fa-edit mr-1"></i> Edit
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center p-4 text-muted">No users found. Add a new user above!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
