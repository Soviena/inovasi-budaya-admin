@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
      <h3 class="fw-bold py-3 mb-4 text-center">Data User</h3>
    <div class="nav-align-top mb-4">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
        </li>
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Panjang</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Tipe user</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($manage as $m)
              <tr>
                <td>{{$m->name}}</td>
                <td>{{$m->email}}</td>
                <td>{{$m->tanggal_lahir}}</td>
                <td>
                  @if($m->admin == "TRUE")
                  <span class="badge bg-label-primary me-1">Admin</span>
                  @else
                  <span class="badge bg-label-warning me-1">Pengguna</span>
                  @endif
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        data-bs-toggle="modal"
                        data-bs-target="#editUser-{{$m->id}}"
                        data-user-name="{{ $m->name }}"
                        data-user-email="{{ $m->email }}"
                        data-user-tanggal-lahir="{{ $m->tanggal_lahir }}"
                        data-user-password="{{ $m->password }}">
                        <i class="bx bx-edit-alt me-1"></i> Edit
                      </a>
                      <a class="dropdown-item" href="javascript:void(0);"
                          data-bs-toggle="modal"
                          data-bs-target="#hapusUser-{{$m->id}}">
                          <i class="bx bx-trash me-1"></i> Delete
                      </a>
                      @if($m->admin == "TRUE")
                      <a class="dropdown-item" href="javascript:void(0);"
                        data-bs-toggle="modal"
                        data-bs-target="#ubahUser-{{$m->id}}">
                        <i class="tf-icons bx bx-user me-1"></i> Jadikan Pengguna
                      </a>
                      @else
                      <a class="dropdown-item" href="javascript:void(0);"
                          data-bs-toggle="modal"
                          data-bs-target="#ubahAdmin-{{$m->id}}">
                          <i class="tf-icons bx bx-user me-1"></i> Jadikan Admin
                      </a>
                      @endif
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
              <td></td>        
              <td>
                  <button
                  type="button"
                  class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#tambahUser"
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

@foreach($manage as $m)
<div class="modal fade" id="editUser-{{$m->id}}" tabindex="-1" aria-hidden="true">
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
        <form action="{{ route('editUser', $m->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="name" class="form-label">Ubah nama user</label>
                  <input type="text" value="{{ $m->name }}" name="name" id="name" class="form-control"/>
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="email" class="form-label">Ubah Email</label>
                  <input type="text" value="{{ $m->email }}" name="email" id="email" class="form-control"/>
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="html5-date-input" class="form-label">Ubah Tanggal Lahir</label>
                  <input class="form-control" value="{{ $m->tanggal_lahir }}" name="tanggal_lahir" name="tanggal_lahir" type="date" id="html5-date-input">
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="password" class="form-label">Ubah Password</label>
                  <input type="text" value="" name="password" id="password" class="form-control"/>
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="file_profile" class="form-label">ubah profile</label>
                  <img class="rounded-3 mb-2 mx-auto shadow img-thumbnail" src="{{asset('storage/uploaded/user/'.$m->profilepic)}}" alt="@isset($m) <{{$m->name}} @endisset" style="width:100%;max-width:100%; object-fit: cover; object-position: 25% 25%;">
                  <input class="form-control" type="file" name="file_profile" id="file_profile" accept=".jpg,.png,.jpeg"/>
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

@foreach($manage as $m)
<div class="modal fade" id="tambahUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">tambah User</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
      </div>
        <form action="{{route('tambahUser')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="name" class="form-label">input nama user</label>
                  <input type="text" value="" name="name" id="name" class="form-control" required />
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="email" class="form-label">input Email user</label>
                  <input type="text" value="" name="email" id="email" class="form-control" required />
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="html5-date-input" class="form-label">input Tanggal Lahir User</label>
                  <input class="form-control" value="" name="tanggal_lahir" name="tanggal_lahir" type="date" id="html5-date-input" required  >
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="password" class="form-label">input Password</label>
                  <input type="text" value="" name="password" id="password" class="form-control" required />
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="file_profile" class="form-label">input gambar profile</label>
                  <img class="rounded-3 mb-2 mx-auto shadow img-thumbnail" src="{{asset('storage/uploaded/user/default.png')}}" alt="@isset($m) <{{$m->name}} @endisset" style="width:100%;max-width:100%; object-fit: cover; object-position: 25% 25%;">
                  <input class="form-control" type="file" name="file_profile" id="file_profile" accept=".jpg,.png,.jpeg" />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Batal
              </button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>    
  </div>
</div>
@endforeach

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

@foreach($manage as $m)
<div class="modal fade" id="hapusUser-{{$m->id}}" tabindex="-1" aria-hidden="true">
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
      <form action="{{ route('hapusUser', $m->id) }}" method="GET" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data user ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color: #1A4980;">
          Tidak
        </button>
      </button>
      <input type="submit" class="btn btn-danger">
    </div>
      </form>
  </div>
</div>
</div>
@endforeach

@foreach($manage as $m)
<div class="modal fade" id="ubahAdmin-{{$m->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Ubah User menjadi admin</h5>
        <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        ></button>
      </div>
      <form action="{{ route('ubahAdmin', $m->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <p>Apakah anda yakin ingin mengubah user ini menjadi admin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color: #1A4980;">
          Tidak
        </button>
      </button>
      <input type="submit" class="btn btn-danger">
    </div>
      </form>
  </div>
</div>
</div>
@endforeach

@foreach($manage as $m)
<div class="modal fade" id="ubahUser-{{$m->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Ubah Admin menjadi User</h5>
        <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        ></button>
      </div>
      <form action="{{ route('ubahUser', $m->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <p>Apakah anda yakin ingin mengubah admin ini menjadi pengguna?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color: #1A4980;">
          Tidak
        </button>
      </button>
      <input type="submit" class="btn btn-danger">
    </div>
      </form>
  </div>
</div>
</div>
@endforeach

<div class="content-backdrop fade"></div>
</div>


@endsection