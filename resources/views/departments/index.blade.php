@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Departments</h1>
        </div>
        <div class="col-sm-6">
           <a href="{{route('departments.create')}}"> <button type="button" class="btn btn-gray float-right">Add Department</button></a>
        </div>
    </div>
</div>

<section class="section">
    @include('flash::message')

    <div class="clearfix"></div>

    <div class="row">
        @foreach ($department as $departments)
        <div class="col-md-4">
            <a href="{{route('departments.show',$departments->id)}}">
                <div class="card unit-card p-3">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon">
                                <img src="https://ui-avatars.com/api/?background=random&name={{ $departments->department_name }}" alt="Profile" id="avatar" class="rounded-circle unit-profile">
                            </div>
                            <div class="ms-2 c-details">
                                <h6 class="mb-0">{{$departments->department_name}}</h6>
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



@endsection