@extends('layout.layout')
@section('content')
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
      <h5 class="card-header">Tambah Budaya</h5>
      <div class="card-body">
        <form action="{{route('newBudaya')}}" method="post">
          @csrf
          <div class="mb-3 row">
            <label for="text-input" class="col-md-2 col-form-label">Nama Budaya</label>
            <div class="col-md-10">
              <input class="form-control" type="text" value="" name="judul" id="text-input">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="Deskripsi" class="col-md-2 col-form-label">Deskripsi</label>
            <div class="col-md-10">
              <textarea class="form-control" name="deskripsi" id="Deskripsi"></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-month-input" class="col-md-2 col-form-label">Bulan</label>
            <div class="col-md-10">
              <input class="form-control" name="bulan" type="month" id="html5-month-input">
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-md-2">
              <input type="submit" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="content-backdrop fade"></div>
</div>
@endsection