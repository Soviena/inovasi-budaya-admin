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
                        <input id="defaultInput" name="title" class="form-control" type="text" placeholder="contoh: Notifikasi peregangan pegawai">
                      </div>
                    
                      <div class="mb-3">
                        <label for="defaultInput" class="form-label">Isi</label>
                        <input id="defaultInput" name="body" class="form-control" type="text" placeholder="contoh: Jangan lupa peregangan setiap 15 menit ya!">
                      </div>
                    
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
@endsection
