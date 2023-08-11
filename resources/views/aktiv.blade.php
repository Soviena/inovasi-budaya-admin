@extends('layout.layout')
@section('content')
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4" style="display: flex; align-items: center;">
      <span class="text-muted fw-light">{{$b->tanggal}} /</span>
      <span style="flex-grow: 1;">{{$b->judul}}</span>
      <a href="{{route('addAktivitas',$b->id)}}" class="btn btn-outline-primary" style="margin-left: auto;">Tambah Aktivitas</a>
    </h4>
    <div class="row" data-masonry='{"percentPosition": true }'>
      @foreach ($b->aktivitas as $a)
        <div class="col-sm-6 col-lg-4 mb-4">
          <div class="card">
            <img class="card-img-top" src="{{asset('public/storage/uploaded/aktivitas/'.$a->fileName)}}" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">{{$a->judul}}</h5>
              <p class="card-text">
                {{$a->deskripsi}}
              </p>
              <a href="javascript:void(0);" class="card-link edit-aktivitas-btn"
                data-bs-toggle="modal"
                data-bs-target="#editAktivitas-{{$a->id}}"
                data-id="{{ $a->id }}"
                data-judul="{{ $a->judul }}"
                data-deskripsi="{{ $a->deskripsi }}"
                data-file="{{ asset('public/storage/uploaded/aktivitas/'.$a->fileName) }}"
              >Edit</a>
              <a href="{{route('deleteAktivitas',$a->id)}}" class="card-link">Hapus</a>
            </div>
          </div>
        </div>      
      @endforeach
    </div>
  </div>
  <div class="content-backdrop fade"></div>
</div>

@foreach($b->aktivitas as $a)
<div class="modal fade" id="editAktivitas-{{$a->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Aktivitas Budaya</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
      </div>
        <form action="{{ route('editAktivitas', $a->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="judul" class="form-label">Edit Nama Aktivitas</label>
                  <input type="text" value="{{ $a->judul }}" name="judul" id="judul" class="form-control" placeholder="Nama Aktivitas" required />
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <input type="text" value="{{ $a->deskripsi }}" name="deskripsi" id="Deskripsi" class="form-control" placeholder="Deskripsi Aktivitas" required />
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="file_safety" class="form-label">Dokumentasi gambar</label>
                  <input class="form-control" type="file" name="img" id="formFile" accept=".jpg,.png,.jpeg" required onchange="checkFileSize(this)" />
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Batal
              </button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>    
  </div>
</div>
@endforeach
<script>
  function checkFileSize(input) {
      const maxFileSize = 7 * 1024 * 1024; // 10MB in bytes
      if (input.files.length > 0) {
          const fileSize = input.files[0].size;
          if (fileSize > maxFileSize) {
              alert("File size exceeds the maximum allowed limit of 7MB.");
              input.value = ''; // Clear the input
          }
      }
  }
</script>
@endsection
