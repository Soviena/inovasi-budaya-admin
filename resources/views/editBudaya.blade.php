@extends('layout.layout')
@section('content')
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
      <h5 class="card-header">Edit Budaya</h5>
      <div class="card-body">
        <form action="{{ route('updateBudaya', $budaya->id) }}" method="post">
          @csrf
          <div class="mb-3 row">
            <label for="text-input" class="col-md-2 col-form-label">Edit Nama Budaya</label>
            <div class="col-md-10">
              <input class="form-control" type="text" value="{{ $budaya->judul }}" name="judul" id="text-input">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="Deskripsi" class="col-md-2 col-form-label">Edit Deskripsi</label>
            <div class="col-md-10">
              <textarea class="form-control" type="text" value="{{ $budaya->deskripsi }}" name="deskripsi" id="Deskripsi" required></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-month-input" class="col-md-2 col-form-label">Edit Bulan</label>
            <div class="col-md-10">
                <input class="form-control" name="tanggal" type="month" value="{{ $budaya->tanggal }}"  id="tanggal">
            </div>
          </div>
          <div class="container">
            <div class="row justify-content-end">
              <div class="col-md-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('budayaIndex') }}" class="btn btn-secondary ms-2">Batal</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="content-backdrop fade"></div>
</div>
@endsection