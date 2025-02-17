@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <div class="row">
        <div class="col-md-12">
            <h1 style="float: left">Depatment</h1>
            <a href="{{route('departments.index')}}"><button type="button" class="btn btn-secondary" style="float: right">Back</button></a>
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
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ledger-details" aria-selected="true" role="tab">HOD Details:</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link " data-bs-toggle="tab" data-bs-target="#edit-details" aria-selected="true" role="tab">Edit Details:</button>
                        </li>
                       
                    </ul>
                    {{-- Show Details: --}}
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active ledger-details" id="ledger-details" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">HOD NAME:</div>
                                <div class="col-lg-9 col-md-8">{{$users->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">HOD EMAIL:</div>
                                <div class="col-lg-9 col-md-8">{{$users->email}}</div>
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
                    
               
                    {{-- Edit Details: --}}
                    
                        <div class="tab-pane fade edit-details" id="edit-details" role="tabpanel">
                            <section class="section">
                                @include('common.errors')
                              
                                <div class="clearfix"></div>
                              
                                <form method="POST" onsubmit="return dis()"; action="{{ route('departments.update',$users->id) }}">
                                    @method('PUT')
                                    @csrf
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold">Department Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="department_name" value="{{ $count['department_name'] }}" disabled>
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold">HOD Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="{{ $users->name }}" required>
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold">HOD Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" value="{{ $users->email }}" required>
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold">HOD Phone no.</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="phone_no" value="{{ $count['phone'] }}">
                                    </div>
                                </div>
                              
                                <div class="col-md-12">
                                    <div class="card mb-0">
                                        <div class="card-header">
                                            <h3>Educational Information</h3>
                                            <div class="card-header-right">
                                                <button type="button" class="btn btn-gray add-product-item" fdprocessedid="o9fm7i" id="additem" onclick="addbtn()"><i class="ik ik-plus"></i> Add Item</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                            
                                          <div class="salestable">
                                            <div class="table-responsive">
                                              <table class="table">
                                                  <thead>
                                                      <tr>
                                                          <th width="20%">Courses</th>
                                                          <th width="20%">College</th>
                                                          {{-- <th width="20%">Rate</th> --}}
                                                          
                                                      </tr>
                                                  </thead>
                                                 
                                                  <tbody id="databody">
                                                    
                                                    @for ($i=0;$i<$n;$i++)
                                                      <tr id="product-base-content" class="base-tr">
                                                        
                                                          {{-- <td class="pl-0"> </td> --}}
                                                        
                                                          <td> <input type="text" class="form-control" name="course[]" value="{{ $course[$i] }}" ></td>
                                                          <td>  <input type="text" class="form-control" name="college_name[]" value="{{ $college[$i] }}" required></td>
                                                          <td style="width: 0%"><button class="btn btn-danger " onclick="delbtn(this)"><i class="bi bi-trash"></i></button></td>
                                                      </tr>
                                                     
                                                      @endfor
                                                     
                                                     
                                                  </tbody>
                
                                              </table>
                                            </div>
                                              
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <br>
                                  <div class="">
                                    <button type="submit" class="btn btn-gray" id="bt" name="sbt">Save</button>
                                    <a href="{{route('departments.index')}}"><button type="button" class="btn btn-secondary">Back</button></a>
                                  </div>
                              
                                </form>
                              
                                </div>
                                </div>
                                </div>
                                </div>
                              </section>

                        </div>

    {{-- TOTAL  --}}

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body pt-3">
                   

                    <div class="tab-content pt-2">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="{{ route('departments.index') }}">
                                    <div class="card bg-primary mb-3 dcard">
                                        <div class="card-body">
                                            <h2>{{ $count['facultys'] }}</h2>
                                            <p>Total Facultys</p>
                                            <div class="card-icon">
                                                <i class="bi bi-truck"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>   
                            
                            <div class="col-sm-3">
                                <a href="{{ route('departments.index') }}">
                                    <div class="card bg-danger mb-3 dcard">
                                        <div class="card-body">
                                            <h2>500</h2>
                                            <p>Total Students</p>
                                            <div class="card-icon">
                                                <i class="bi bi-truck"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>  

                            <div class="col-sm-3">
                                <a href="{{ route('departments.index') }}">
                                    <div class="card bg-success mb-3 dcard">
                                        <div class="card-body">
                                            <h2>50</h2>
                                            <p>Total Subjects</p>
                                            <div class="card-icon">
                                                <i class="bi bi-truck"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        </div>

                        


                    </div>

                   
                </div>

            </div>

           
        </div>

    </div>
    </div>
</section>
<script>
    function addbtn(){
        var v=$("#product-base-content").clone().appendTo("#databody");
        $(v).find("input").val('');
      }
      function delbtn(v){
        $(v).parent().parent().remove();
        
      }
  </script>
@endsection