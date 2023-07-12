@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card py-4" style="border:2px solid #FA830F !important">
            <div class="container">
                <h2>Kirim Notifikasi</h2>
                <form action="{{route('sendNotif')}}" method="post">
                    @csrf
                    <input type="text" name="title">
                    <input type="text" name="body">
                    <input type="submit" value="">
                </form>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
@endsection
