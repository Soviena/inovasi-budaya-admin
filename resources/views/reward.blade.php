@extends('layout.layout')
@section('content')
<div class="content-wrapper">

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4" style="display: flex; align-items: center;">
    <span class="text-muted fw-light">Bulan/</span>
    <span style="flex-grow: 1;">Tahun</span>
  </h4>
  <div class="d-flex flex-wrap">
    <div class="card" style="height: 58vh; width:250px;">
      <div class="card-body text-center" style=" align-items: center; height: 20%; overflow-y: auto;">
        <img src="https://3.bp.blogspot.com/-XbsKf2Hu778/UxVtx1PXe2I/AAAAAAAAKtI/WewtyZGqKaA/s1600/Alam04.jpg" class="img-fluid rounded-circle mx-5" alt="Circular Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; overflow: hidden;">
        <p class="mx-auto" style="font-weight: bold;">Nama Pemenang</p>
        <p class="card-text mb-3 w-100 mx-0" style="max-width: 120%; text-align: left;">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel nisi id justo ultricies
          fringilla. Sed vehicula luctus urna, eu pulvinar tortor feugiat a. Sed vitae laoreet nulla, in
          ultricies felis.
        </p>
      </div>  
      <div class="card-footer">
        <a href="javascript:void(0);" class="card-link" data-bs-toggle="modal"
      data-bs-target="#editReward">
      Edit</a>
        <a href="javascript:void(0);" class="card-link">Hapus</a>
      </div>
    </div>
    <div class="card icon-card text-center mx-5" style="height:58vh; width:250px">
    <a data-bs-toggle="modal"
      data-bs-target="#addReward" class="btn">
      <div class="card-body my-3">
      <div class="border border-0">
      </div>
      </div>
        <div class="card-body pt-5">
          <i class='bx bx-plus' style="font-size: 6rem " ></i>
          <p class="icon-name text-capitalize text-truncate" style="font-size: 1.2rem " >Tambah</p>
        </div>
      </a>
    </div>
  </div>
<div class="modal fade" id="addReward" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">Input Pemenang</h5>
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
                  <th>Tanggal Lahir</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  <td>tes</td>
                  <td>test</td>
                  <td>testing</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      <i class="fas fa-plus"></i> Tambah
                    </button>
                  </td>
                </tbody>
                <tbody class="table-border-bottom-0">
                  <td>tes</td>
                  <td>test</td>
                  <td>testing</td>
                  <div class="dropdown">
                    </div>
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
  <div class="modal fade" id="editReward" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Profile</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="defaultInput" class="form-label">Ubah nama</label>
          <input id="defaultInput" class="form-control" type="text">
        </div>
        <div class="mb-3">
          <label for="defaultInput" class="form-label">ubah deskripsi</label>
          <textarea id="basic-default-message" class="form-control"  aria-describedby="basic-icon-default-message2" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Ubah Profil</label>
          <input class="form-control" type="file" id="formFile">
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
  
<div class="content-backdrop fade"></div>
</div>
@endsection
        
