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

      <form method="POST" action="{{ route('roles.update',$role->id) }}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label fw-bold">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value="{{ $role->name }}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label fw-bold">Slug</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="slug" value="{{ $role->slug }}">
          </div>
        </div>

        <button type="submit" class="btn btn-gray">Save</button>
        <a href="{{route('roles.index')}}"><button type="button" class="btn btn-secondary">Back</button></a>

      </form>

    </div>
  </div>
</section>

@endsection