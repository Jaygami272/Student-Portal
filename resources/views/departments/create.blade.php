@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Departments</h1>
        </div>
        
    </div>
</div>
<section class="section">
    @include('common.errors')
  
    <div class="clearfix"></div>
  
    <form method="POST" onsubmit="return dis()"; action="{{ route('departments.store') }}">
      @csrf
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">Department Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="department_name" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">HOD Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name"  required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">HOD Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">HOD Phone no.</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="phone_no">
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
                        
                          <tr id="product-base-content" class="base-tr">
                            
                              {{-- <td class="pl-0"> </td> --}}
                             
                              <td> <input type="text" class="form-control" name="course[]" required></td>
                              <td>  <input type="text" class="form-control" name="college_name[]" required></td>
                              <td style="width: 0%"><button class="btn btn-danger " onclick="delbtn(this)"><i class="bi bi-trash"></i></button></td>
                          </tr>
                       
                         
                      </tbody>
              
                  
                      <tbody>
                        {{-- <tr>
                          <th class="border-0" colspan="3"></th>
                          <th width="20%" class="border-0">Total</th>
                          <th class="text-right border-0"><input style="width: 70px" class="inp"></th>
                          <td class="border-0"></td>
                      </tr>
                      <tr>
                          <td class="border-0" colspan="3"></td>
                          <td>Tax (<span id="tax-per">10.00</span>%)</td>
                          <td class="text-right">0.00</td>
                          <td></td>
                      </tr>
                      <tr>
                          <td class="border-0" colspan="3"></td>
                          <td>Discount</td>
                          <td class="text-right">0.00</td>
                          <td></td>
                      </tr> --}}
        
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
