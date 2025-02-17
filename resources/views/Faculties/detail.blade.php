@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <div class="row">
        <div class="col-md-12">
            <h1 style="float: left">Faculty Details</h1>
            <a href="{{route('facultys.index')}}"><button type="button" class="btn btn-secondary" style="float: right">Back</button></a>
        </div>
    </div>
</div>

<section class="section profile">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered fw-bold" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ledger-details" aria-selected="true" role="tab">Faculty Details:</button>
                        </li>

                       
                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active ledger-details" id="ledger-details" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">NAME:</div>
                                <div class="col-lg-9 col-md-8">{{$facultys->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">PHONE NO:</div>
                                <div class="col-lg-9 col-md-8">{{$facultys->phone_no}}</div>

                            </div>

                            <div class="row">
                                    <div class="col-lg-3 col-md-4 label">EMAIL:</div>
                                    <div class="col-lg-9 col-md-8">{{$facultys->user->email}}</div>
                                </div>
                        </div>
                        <h5 style="float: left">Education:</h5>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Course</th>
                                <th>College</th>
                              </tr>
                            </thead>
                            <tbody>
                               @for ($i=0;$i<$n;$i++)
                               <tr>
                                <td>{{$course[$i]}}</td>
                                <td>{{$college[$i]}}</td>
                              </tr>
                               @endfor
                            </tbody>
                          </table>

                    </div>
                </div>

            </div>
        </div>

    </div>


</section>
@endsection