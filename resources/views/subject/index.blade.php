@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Subjects</h1>
        </div>
        <div class="col-sm-6">
            <button type="button" class="btn btn-gray float-right" data-bs-toggle="modal" data-bs-target="#addsub">Add Subject</button>
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
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Subject Credit</th>
                            <th>Sem</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subject as $subjects)
                        <tr>
                            <td>{{ $subjects->sub_name }}</td>
                            <td>{{ $subjects->sub_code }}</td>
                            <td>{{ $subjects->sub_credit }}</td>
                            <td>{{ $subjects->sem }}</td>
                            <td>
                                <form method="POST" action="{{ route('subjects.destroy',$subjects->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('subjects.edit',$subjects->id ) }}"><button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></a>
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

<div class="modal fade" id="addsub" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('subjects.store') }}">
                @csrf

                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">SUB_Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sub_name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">SUB_Code:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sub_code">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">SUB_Credit:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sub_credit">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">Sem:</label>
                        <div class="col-sm-9">
                        <select class="form-select" name="sem">
                          <option selected disabled value="Option...">Select..</option>
                          <option value="1">Sem 1</option>
                          <option value="2">Sem 2</option>
                          <option value="3">Sem 3</option>
                          <option value="4">Sem 4</option>
                          <option value="5">Sem 5</option>
                          <option value="6">Sem 6</option>
                          <option value="7">Sem 7</option>
                          <option value="8">Sem 8</option>
                        </select>
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