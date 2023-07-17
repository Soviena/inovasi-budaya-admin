@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card py-4" style="border:2px solid #FA830F !important">
            <div class="container">
                <h2>Kirim Notifikasi</h2>
                <div class="card-body">
                <form action="{{route('sendNotif')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="defaultInput" class="form-label">Judul</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Notifikasi Peregangan Pegawai">
                      </div>
                    
                      <div class="mb-3">
                        <label for="defaultInput" class="form-label">Isi</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Jangan Lupa Istirahat">
                      </div>
                    
                    <button type="button" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
@endsection
