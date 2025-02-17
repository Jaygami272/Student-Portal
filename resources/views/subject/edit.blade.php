@extends('layouts.app')

@section('content')
<div class="pagetitle">
  <div class="row">
    <div class="col-sm-6">
      <h1>Edit Roles</h1>
    </div>

  </div>
</div>

<section class="section">
  @include('common.errors')

  <div class="clearfix"></div>

  <div class="card">
    <div class="card-body">

      <form method="POST" action="{{ route('subjects.update',$subjects->id) }}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label fw-bold">Subject Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="sub_name" value="{{ $subjects->sub_name }}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label fw-bold">Subject Code</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="sub_code" value="{{ $subjects->sub_code }}">
          </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label fw-bold">Subject Credit</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="sub_credit" value="{{ $subjects->sub_credit }}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label fw-bold">Semester</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="sem" value="{{ $subjects->sem }}">
            </div>
          </div>

        <button type="submit" class="btn btn-gray">Save</button>
        <a href="{{route('subjects.index')}}"><button type="button" class="btn btn-secondary">Back</button></a>

      </form>

    </div>
  </div>
</section>

@endsection