@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="nav-align-top mb-4">
            
            <div class="card">
                <h5 class="card-header">Kinerja Bulanan</h5>
                <div class="table">
                  <table class="table table-hover" id="tableKinerja">
                    <thead>
                      <tr>
                        <th  style="width:90vw;">tanggal</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($kinerja as $k)
                      <tr>
                        <td>{{$k->tanggal}}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('kinerja',$k->id)}}">
                                <i class='bx bx-book-open'></i> Preview
                              </a>
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editKinerja-{{$k->id}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#deleteKinerja-{{$k->id}}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
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
                          <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addKinerja" class="btn btn-outline-primary">Tambah</a>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addKinerja" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Kinerja Bulanan</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <form action="{{route('addKinerja')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3 row">
              <label for="html5-month-input" class="col-md-2 col-form-label">Month</label>
                  <div class="col-md-10">
                      <input class="form-control" name="tanggal" type="month" value="" id="html5-month-input" required>
                  </div>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Pilih file</label>
            <input class="form-control" name="csv" type="file" id="formFile" accept=".csv" onchange="checkFileSize(this)" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color:#1A4980;">
            Tutup
          </button>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>
@foreach($kinerja as $k)
<div class="modal fade" id="editKinerja-{{$k->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <form action="{{route('editKinerja',$k->id)}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3 row">
              <label for="html5-month-input" class="col-md-2 col-form-label">Month</label>
                  <div class="col-md-10">
                      <input class="form-control" name="tanggal" type="month" value="{{$k->tanggal}}" id="html5-month-input">
                  </div>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Pilih file</label>
            <input class="form-control" type="file" id="formFile" onchange="checkFileSize(this)">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color:#1A4980;">
            Tutup
          </button>
          <input type="submit" class="btn btn-primary" name="csv" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteKinerja-{{$k->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Hapus</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color: #1A4980;">
          Tidak
        </button>
      </button>
      <a href="{{route('deleteKinerja',$k->id)}}" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>
@endforeach
<div class="content-backdrop fade"></div>
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
      var table = new DataTable("#tableKinerja",{order: [0,'desc']})
    });
  </script>
@endsection

