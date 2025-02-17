@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Roles</h1>
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
                            <th>Email:</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facultys as $faculty)
                        <tr>
                            <td>{{ $faculty->name }}</td>
                            <td>{{ $faculty->phone_no }}</td>
                            <td>
                                <form method="POST" action="{{ route('facultys.destroy',$faculty->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{route('facultys.show',$faculty->id)}}" class="btn btn-gray btn-sm"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{ route('facultys.update',$faculty->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
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


@endsection