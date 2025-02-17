@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Add Lecture Time Table</h1>
        </div>
        
    </div>
</div>
<section class="section">
    @include('common.errors')
  
    <div class="clearfix"></div>
  
    <form method="POST" enctype="multipart/form-data" action="{{ route('timetables.store') }}">
      @csrf

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">Department:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="dept_id" value="{{$departments->department_name}}" readonly style="background-color: lightgray">
        </div>
    </div>
      {{-- <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">Department</label>
        <div class="col-sm-10">
            <select class="form-select" name="dept_id" aria-label="State">
                <option selected disabled value="Option...">Select...</option>
                @foreach ($departments as $department)
                <option value="{{$department->id}}">{{$department->department_name}}</option>
                @endforeach
              </select>
        </div>
      </div> --}}

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">Semester</label>
        <div class="col-sm-10">
            <select class="form-select" name="sem" aria-label="State">
                <option selected disabled value="Option...">Select...</option>
                <option value="1">Sem-1</option>
                <option value="2">Sem-2</option>
                <option value="3">Sem-3</option>
                <option value="4">Sem-4</option>
                <option value="5">Sem-5</option>
                <option value="6">Sem-6</option>
                <option value="7">Sem-7</option>
                <option value="8">Sem-8</option>
              </select>
        </div>
      </div>
    
      
    

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">Uplode File</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="photo" accept="image/*">
        </div>
    </div>


   
    <br>
      <div class="">
        <button type="submit" class="btn btn-gray" id="bt" name="sbt">Save</button>
        <a href="{{route('timetables.index')}}"><button type="button" class="btn btn-secondary">Back</button></a>
      </div>
  
    </form>
  
    </div>
    </div>
    </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>


@endsection
