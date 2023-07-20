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
                    <img src="https://th.bing.com/th/id/OIP.3VTIvnXIT61CfqI9ucdR7gAAAA?pid=ImgDet&rs=1" class="img-fluid rounded-circle mx-5" alt="Circular Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; overflow: hidden;">
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


              <div class="card icon-card cursor-pointer text-center mx-3" style="height:250px; width:250px">
                <a href="#" class="btn">
                  <div class="card-body pt-5">
                    <i class='bx bx-plus' style="font-size: 6rem " ></i>
                    <p class="icon-name text-capitalize text-truncate" style="font-size: 1.2rem " >Tambah</p>
                  </div>
                </a>
              </div>
          
        </div>
  </div>

  <div class="content-backdrop fade"></div>
</div>
@endsection
