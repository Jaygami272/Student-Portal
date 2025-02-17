@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Roles</h1>
        </div>
        <div class="col-sm-6">
            <button type="button" class="btn btn-gray float-right" data-bs-toggle="modal" data-bs-target="#addrole">Add Role</button>
        </div>
    </div>
</div>

<section class="section">
    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->slug }}</td>
                            <td>
                                <form method="POST" action="{{ route('roles.destroy',$role->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{route('roles.show',$role->id)}}" class="btn btn-gray btn-sm"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{ route('roles.edit',$role->id ) }}"><button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="addrole" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf

                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="slug">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-gray">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection