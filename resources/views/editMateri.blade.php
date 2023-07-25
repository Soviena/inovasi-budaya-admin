@extends('layout.layout')
@section('content')
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
      <h5 class="card-header">Edit Materi</h5>
      <div class="card-body">
        <form action="{{ route('updateMateri', $materi->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3 row">
            <label for="text-input" class="col-md-2 col-form-label">Judul :</label>
            <div class="col-md-10">
              <input class="form-control" type="text" value="{{ $materi->title }}" name="title" id="title">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="Deskripsi" class="col-md-2 col-form-label">File PDF :</label>
            <div class="col-md-10">
            <input class="form-control" type="file" name="file_pdf" id="file_pdf" accept=".pdf" required />
            </div>
          </div>
          <div class="container">
            <div class="row justify-content-end">
              <div class="col-md-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('materi') }}" class="btn btn-secondary ms-2">Batal</a>
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