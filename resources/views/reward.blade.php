@extends('layout.layout')
@section('content')
<div class="content-wrapper">

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4" style="display: flex; align-items: center;">
    <span class="text-muted fw-light">Bulan/</span>
    <span style="flex-grow: 1;">Tahun</span>
  </h4>
  <div class="d-flex flex-wrap">
    <div class="card" style="height:250px; width:250px;">
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
        <a href="javascript:void(0);" class="card-link">Edit</a>
        <a href="javascript:void(0);" class="card-link">Hapus</a>
      </div>
    </div>
    <div class="card icon-card cursor-pointer text-center mx-5" style="height:250px; width:250px; float: right">
      <a 
      data-bs-toggle="modal"
      data-bs-target="#addReward">
        <div class="card-body pt-5">
          <i class='bx bx-plus' style="font-size: 6rem " ></i>
          <p class="icon-name text-capitalize text-truncate" style="font-size: 1.2rem " >Tambah</p>
        </a>
      </div>
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
          <div class="row">
            <div class="col mb-3">
              <label for="nameExLarge" class="form-label">Nama</label>
              <input type="text" id="nameExLarge" class="form-control"/>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="emailExLarge" class="form-label">Email</label>
              <input type="text" id="emailExLarge" class="form-control"/>
            </div>
            <div class="col mb-0">
          <label for="defaultInput" class="form-label">tanggal lahir</label>
          <input class="form-control" type="date" value="" id="html5-date-input">
        </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Tutup
          </button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
  
<div class="content-backdrop fade"></div>
</div>
@endsection
        
