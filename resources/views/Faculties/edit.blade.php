@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Faculty Details:</h1>
        </div>
        
    </div>
</div>
<section class="section">
    @include('common.errors')
  
    <div class="clearfix"></div>
  
    <form method="POST" onsubmit="return dis()"; action="{{ route('facultys.update',1) }}">
      @csrf
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
              
                  
                    
                  </table>
                </div>
                  
              </div>
          </div>
        </div>
    </div>
    <br>
      <div class="">
        <button type="submit" class="btn btn-gray" id="bt" name="sbt">Save</button>
        <a href="{{route('facultys.index')}}"><button type="button" class="btn btn-secondary">Back</button></a>
      </div>
  
    </form>
  
    </div>
    </div>
    </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

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
