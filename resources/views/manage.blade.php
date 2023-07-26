@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="nav-align-top mb-4">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
            <i class="tf-icons bx bx-user"></i> Data User
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
          </button>
        </li>
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Panjang</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($manage as $m)
              <tr>
                <td>{{$m->name}}</td>
                <td>{{$m->tanggal_lahir}}</td>
                <td>{{$m->email}}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                          data-bs-toggle="modal"
                          data-bs-target="#editUser"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteUser"
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
              <td></td>
              <td></td>              
              <td>
                  <button
                  type="button"
                  class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#editUser"
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
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
        <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="defaultInput" class="form-label">Ubah judul</label>
          <input id="defaultInput" class="form-control" type="text">
        </div>
        <div class="mb-3">
          <label for="defaultInput" class="form-label">Ubah tanggal lahir</label>
          <input class="form-control" type="date" value="" id="html5-date-input">
        </div>
        <div class="mb-3">
          <label for="defaultInput" class="form-label">Ubah email</label>
          <input id="defaultInput" class="form-control" type="text">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color:#1A4980;">
          Tutup
        </button>
      </button>
      <button type="button" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="deleteUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Hapus User</h5>
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
      <button type="button" class="btn btn-danger">Ya</button>
    </div>
  </div>
</div>
</div>

<div class="content-backdrop fade"></div>
</div>
@endsection