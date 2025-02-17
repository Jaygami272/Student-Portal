@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Faculties</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{route('facultys.create')}}"><button type="button" class="btn btn-gray float-right">Add Faculty</button></a>
            <a href="{{route('facultys.edit',$id)}}"><button type="button" style="margin-right:5px"  class="btn btn-gray float-right">Manage Faculty</button></a>
        </div>
    </div>
</div>

<section class="section">
    @include('flash::message')

    <div class="clearfix"></div>

    <div class="row">
        @foreach ($facultys as $faculty)
        <div class="col-md-4">
            <a href="{{route('facultys.show',$faculty->id)}}">
                <div class="card unit-card p-3">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon">
                                <img src="http://igenerate.odhavtech.com/profile?text={{ $faculty->name }}" alt="Profile" class="rounded-circle unit-profile">
                            </div>
                            <div class="ms-2 c-details">
                                <h6 class="mb-0">{{$faculty->name}}</h6>
                                <span></span>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </a>
        </div>
        @endforeach
    </div>

   
</section>

<div class="modal fade" id="adddepartment" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Faculty</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" onsubmit="return dis()" action="{{ route('facultys.store') }}">
                @csrf

                <div class="modal-body">
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold"></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="department_name">
                        </div>
                    </div> --}}

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold">Phone:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="phone_no">
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