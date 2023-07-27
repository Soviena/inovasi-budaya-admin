@extends('layout.layout')
@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
    <div class="alert alert-success mt-4" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <div class="card mb-5">
      <div class="card-header">Halaman Safety Moment</div>
      <div class="card-body">
        <h5 class="card-title">Saasdasdasd</h5>
        <p class="card-text">
          Tambahkan Reward baru
        </p>
        <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSafety">Tambah Safety Moment</a>
      </div>
    </div>
    <div class="nav-align-top mb-4">
      <div class="row" data-masonry='{"percentPosition": true }'>
        @foreach ($safety_moments as $safety)
          <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card">
              <img class="card-img-top" src="{{ asset('storage/' . $safety->fileName) }}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title">{{$safety->judul}}</h5>
                <p class="card-text">
                  {{$safety->deskripsi}}
                </p>
                <a href="javascript:void(0);" class="card-link edit-aktivitas-btn"
                  data-bs-toggle="modal"
                  data-bs-target="#editSafety-{{$safety->id}}"
                  data-id="{{ $safety->id }}"
                  data-judul="{{ $safety->judul }}"
                  data-deskripsi="{{ $safety->deskripsi }}"
                >Edit</a>
                <a href="{{route('deleteSafety',$safety->id)}}" class="card-link">Hapus</a>
              </div>
            </div>
          </div>      
        @endforeach
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahSafety" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Safety Moment</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <form action="{{ route('addSafety') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Safety" required />
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Safety" required />
            </div>
          </div>
          <div class="row g-2">
            <div class="mb-3">
              <label for="file_safety" class="form-label">Masukan file gambar</label>
              <input class="form-control" type="file" name="file_safety" id="file_safety" accept=".jpg,.png,.jpeg" required />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Batal
          </button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="content-backdrop fade"></div>

@foreach($safety_moments as $safety)
<div class="modal fade" id="editSafety-{{$safety->id}}" tabindex="-1" aria-hidden="true">
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
        <form action="{{ route('editAktivitas', $safety->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="judul" class="form-label">Edit Nama Aktivitas</label>
                  <input type="text" value="{{ $safety->judul }}" name="judul" id="judul" class="form-control" placeholder="Nama Aktivitas" required />
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <input type="text" value="{{ $safety->deskripsi }}" name="deskripsi" id="Deskripsi" class="form-control" placeholder="Deskripsi Aktivitas" required />
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="file_safety" class="form-label">Dokumentasi gambar</label>
                  <input class="form-control" type="file" name="img" id="formFile" accept=".jpg,.png,.jpeg" required />
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
@endsection

user <- stats
        id
        uid
        visits
        