@extends('layout.layout')
@section('content')
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
      <h5 class="card-header">Tambah Aktivitas</h5>
      <div class="card-body">
        <form action="{{route('newAktivitas')}}" method="post"  enctype="multipart/form-data">
          @csrf
          <div class="mb-3 row">
            <label for="text-input" class="col-md-2 col-form-label">Nama Aktivitas</label>
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
            <label for="Deskripsi" class="col-md-2 col-form-label">Dokumentasi gambar</label>
            <div class="col-md-10">
              <input class="form-control" name="img" type="file" id="formFile"  accept=".jpg,.png,.jpeg">
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-md-2">
              <input type="submit" class="btn btn-primary">
            </div>
          </div>
          <input type="hidden" name="idBudaya" value="{{$budayaId}}">
        </form>
      </div>
    </div>
  </div>

  <div class="content-backdrop fade"></div>
</div>
@endsection