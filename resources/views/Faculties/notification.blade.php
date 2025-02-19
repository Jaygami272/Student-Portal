@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Notification</h1>
        </div>
        <div class="col-sm-6">
            <button type="button" class="btn btn-gray float-right" data-bs-toggle="modal" data-bs-target="#addsub">New Notification</button>
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
                            <th>Date</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <td></td>
                            <td></td>
                            
                            <td>
                                <form method="POST" action="">
                                    @method('DELETE')
                                    @csrf
                                    <a href=""><button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                       
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
                <h5 class="modal-title">Send Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('subjects.store') }}">
                @csrf

                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">Enter Subject:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sub_name" style="height: 100%">
                        </div>
                    </div>

                    

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">Uplpde File:</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="files">
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