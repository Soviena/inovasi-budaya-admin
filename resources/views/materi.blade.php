@extends('layout.layout')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <h3 class="fw-bold py-3 mb-4 text-center">Daftar Materi</h3>
    <div class="nav-align-top mb-4">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
          </button>
        </li>
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
          <table class="table" id="tableMateri">
            <thead>
              <tr>
                <th style='width:90vw;'>Judul</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <!-- Loop through the list of PDF files from the database -->
              @foreach ($materis as $materi)
              <tr>
                <td style='width:90vw;'>{{ $materi->title }}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('downloadMateri', $materi->id) }}"><i class="bx bx-download me-1"></i> Download</a>
                      <a class="dropdown-item" href="javascript:void(0);"
                      data-bs-toggle="modal"
                      data-bs-target="#editMateri-{{$materi->id}}"
                      data-materi-title="{{ $materi->title }}"
                      data-materi-fileName="{{ $materi->fileName }}"
                   ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="{{ route('deleteMateri', $materi->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td></td>         
                <td>
                  <button
                  type="button"
                  class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#basicModal"
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
  <div class="content-backdrop fade"></div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Materi</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="title" class="form-label">Judul Materi</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Masukan Judul Materi" required />
            </div>
          </div>
          <div class="row g-2">
            <div class="mb-3">
              <label for="file_pdf" class="form-label">Masukan file PDF</label>
              <input class="form-control" type="file" name="file_pdf" id="file_pdf" accept=".pdf" onchange="checkFileSize(this)" required />
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

@foreach ($materis as $materi)
<div class="modal fade" id="editMateri-{{$materi->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Materi</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <form action="{{ route('editMateri', $materi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="title" class="form-label">Judul Materi</label>
              <input type="text" value="{{ $materi->title }}" name="title" id="title" class="form-control"/>
            </div>
          </div>
          <div class="row g-2">
            <div class="mb-3">
              <label for="file_pdf" class="form-label">Update file PDF</label>
              <input class="form-control" type="file" name="file_pdf" id="file_pdf" accept=".pdf" onchange="checkFileSize(this)" required />
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

  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
    $(document).ready(function () {
      var table = new DataTable("#tableMateri",{order: [0,'desc']})
    });
  </script>

@endsection