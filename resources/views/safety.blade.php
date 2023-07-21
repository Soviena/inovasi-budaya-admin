@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="nav-align-top mb-4">
            
            <div class="card">
                <h5 class="card-header">Safety Moment</h5>
                <div class="table">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($safety_moments as $safety)
                      <tr>
                        <td>{{ $safety->judul }}</td>
                        <td>{{ $safety->deskripsi }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('previewSafety', $safety->id) }}" data-bs-toggle="modal" data-bs-target="#previewPoster{{ $safety->id }}">
                                <i class='bx bx-book-open'></i> Preview
                            </a>
                            <a class="dropdown-item" href="{{ route('editSafety', $safety->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="{{ route('deleteSafety', $safety->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>              
                        <td>
                          <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#tambahSafety"
                        >
                          Tambah
                        </button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
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
              <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Safety" />
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Safety" />
            </div>
          </div>
          <div class="row g-2">
            <div class="mb-3">
              <label for="file_safety" class="form-label">Masukan file gambar/PDF</label>
              <input class="form-control" type="file" name="file_safety" id="file_safety" accept=".jpg,.png,.jpeg,.pdf" />
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

    @if (session('success'))
  <div class="alert alert-success mt-4" role="alert">
    {{ session('success') }}
  </div>
@endif

  </div>
</div>

@foreach ($safety_moments as $safety)
  <div class="modal fade" id="previewPoster{{ $safety->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Preview Poster</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <img src="{{ asset('storage/' . $safety->fileName) }}" alt="Deskripsi Gambar" class="img-fluid" style="width:auto; height: auto">
          <p class="mx-0" style="width: 15rem; font-weight: bold;">{{ $safety->judul }}</p>
          <p class="w-100 mx-0" style="max-width: 120%;">{{ $safety->deskripsi }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="color:white;">
            Tutup
          </button>
        </div>
      </div>
    </div>
  </div>
@endforeach

<div class="content-backdrop fade"></div>
@endsection

