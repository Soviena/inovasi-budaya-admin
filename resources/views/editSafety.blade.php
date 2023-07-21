@extends('layout.layout')
@section('content')
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
      <h5 class="card-header">Edit Safety</h5>
      <div class="card-body">
        <form action="{{ route('updateSafety', $safety->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3 row">
            <label for="text-input" class="col-md-2 col-form-label">Judul :</label>
            <div class="col-md-10">
              <input class="form-control" type="text" value="{{ $safety->judul }}" name="judul" id="judul">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="text-input" class="col-md-2 col-form-label">Deskripsi :</label>
            <div class="col-md-10">
              <input class="form-control" type="text" value="{{ $safety->deskripsi }}" name="deskripsi" id="deskripsi">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="Deskripsi" class="col-md-2 col-form-label">File Poster :</label>
            <div class="col-md-10">
            <input class="form-control" type="file" name="file_safety" id="file_safety" accept=".jpg,.png,.jpeg,.pdf" />
            </div>
          </div>
          <div class="container">
            <div class="row justify-content-end">
              <div class="col-md-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('safety') }}" class="btn btn-secondary ms-2">Batal</a>
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