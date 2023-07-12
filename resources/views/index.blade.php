@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col">
                <div class="row">
                    <h2>
                        <span style="color:#1A4980">Selamat</span>
                        <span style="color:#027CCC">Pagi</span>
                    </h2>
                </div>
                <div class="row">
                    <h3 style="color:#1A4980">Nama Pengguna</h3>
                </div>
            </div>
            <div class="col text-end">
                <div class="row">
                    <h2 style="color:#1A4980">Senin 3 july</h2>
                </div>
                <div class="row">
                    <h3 style="color:#027CCC">10:30</h3>
                </div>
            </div>
        </div>
        <div class="card py-4" style="border:2px solid #FA830F !important">
            <div class="container">
                <h2>Halaman Konfigurasi</h2>
                <div class="d-flex flex-wrap">
                    <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <div class="card-body">
                          <i class="bx bxl-adobe mb-2"></i>
                          <p class="icon-name text-capitalize text-truncate mb-0">adobe</p>
                        </div>
                    </div>
                    <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <div class="card-body">
                          <i class="bx bxl-adobe mb-2"></i>
                          <p class="icon-name text-capitalize text-truncate mb-0">adobe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
@endsection
