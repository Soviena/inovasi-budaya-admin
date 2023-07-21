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
                <div class="d-flex flex-wrap" id="icons-container">
                    <div style="width:30%;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <a href="{{route('budayaIndex')}}" class="btn">
                            <div class="card-body">
                                <i class="bx bxs-book-content mb-2"></i>
                                <p class="icon-name text-capitalize text-truncate mb-0">Daftar Budaya</p>
                            </div>
                        </a>
                    </div>
                    <div style="width:30%;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <a href="{{route('indexAktivitas')}}" class="btn">
                            <div class="card-body">
                                <i class="bx bx-photo-album mb-2"></i>
                                <p class="icon-name text-capitalize text-truncate mb-0">Aktivitas</p>
                            </div>
                        </a>
                    </div>
                    <div style="width:30%;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <a href="{{route('rewardUser')}}" class="btn">
                            <div class="card-body">
                                <i class="bx bx-crown mb-2"></i>
                                <p class="icon-name text-capitalize text-truncate mb-0">Reward</p>
                            </div>
                        </a>
                    </div>
                    <div style="width:30%;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <a href="{{route('manageUser')}}" class="btn">
                            <div class="card-body">
                                <i class="bx bx-user mb-2"></i>
                                <p class="icon-name text-capitalize text-truncate mb-0">Manage User</p>
                            </div>
                        </a>
                    </div>
                    <div style="width:30%;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <a href="{{route('feedback')}}" class="btn">
                            <div class="card-body">
                                <i class="bx bx-envelope mb-2"></i>
                                <p class="icon-name text-capitalize text-truncate mb-0">Feedback</p>
                            </div>
                        </a>
                    </div>
                    <div style="width:30%;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <a href="{{route('notification')}}" class="btn">
                            <div class="card-body">
                                <i class="bx bx-bell mb-2"></i>
                                <p class="icon-name text-capitalize text-truncate mb-0">Notifikasi</p>
                            </div>
                        </a>
                    </div>
                    <div style="width:30%;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <a href="{{route('materi')}}" class="btn">
                        <div class="card-body">
                            <i class="bx bx-book mb-2"></i>
                            <p class="icon-name text-capitalize text-truncate mb-0">Materi</p>
                        </div>
                        </a>
                    </div>
                    <div style="width:30%;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <a href="{{route('safety')}}" class="btn">
                            <div class="card-body">
                                <i class="bx bx-shield mb-2"></i>
                                <p class="icon-name text-capitalize text-truncate mb-0">Safety Moment</p>
                            </div>
                        </a>
                    </div>
                    <div style="width:30%;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <a href="{{route('kinerjaBulan')}}" class="btn">
                            <div class="card-body">
                                <i class="bx bx-bar-chart-alt-2 mb-2"></i>
                                <p class="icon-name text-capitalize text-truncate mb-0">Kinerja Bulanan</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
@endsection
