@extends('layout.layout')
@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-5">
      <div class="card-header">Tim Internalisasi Budaya</div>
      <div class="card-body">
        <h5 class="card-title">Tim yang bertanggung jawab atas budaya</h5>
        <p class="card-text">
          Tim internalisasi budaya yang bertugas untuk mengelola, menyiapkan, mengadakan dan mengatur jalan nya budaya
        </p>
        <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTim">Tambah Pengguna</a>
      </div>
    </div>

    <div class="d-flex flex-wrap">
      @foreach($usersInternal as $u)
      <div class="card border m-3" style="width:250px;">
        <div class="card-body text-center" style=" align-items: center;">
          <img src="{{asset('storage/uploaded/user/'.$u->profilepic)}}" class="img-fluid rounded-circle mx-5" alt="Circular Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; overflow: hidden;">
          <p class="mx-auto" style="font-weight: bold;">{{$u->name}}</p>
          <p class="mx-auto" style="font-weight: bold;">{{$u->email}}</p>
          <p class="mx-auto" style="font-weight: bold;">{{$u->tanggal_lahir}}</p>
        </div>  
        <div class="card-footer">
          <a href="{{route('deleteTimInternal',$u->id)}}" class="card-link">Hapus</a>
        </div>
      </div>
      @endforeach
    </div>
    <div class="content-backdrop fade"></div>
  </div>
</div>
<div class="modal fade" id="addTim" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel4">Tambah Tim Baru</h5>
        <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th>Nama Panjang</th>
              <th>Email</th>
              <th>Tanggal Lahir</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach($users as $u)
            <tr> 
              <td>{{$u->name}}</td>
              <td>{{$u->email}}</td>
              <td>{{$u->tanggal_lahir}}</td>
              <td>
                <a class="btn btn-primary" href="{{route('addTimInternal',$u->id)}}">
                  <i class="fas fa-plus"></i>Tambah
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Tutup
        </button>
      </div>
    </div>
  </div>  
</div>
@endsection

