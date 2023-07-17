@extends('layout.layout')
@section('content')
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
    @foreach($budaya as $b)
      @php
        $dataYearMonth = date('Y-m', strtotime($b->tanggal));
        $currentYearMonth = date('Y-m');
      @endphp
        @if($dataYearMonth <= $currentYearMonth)
        <h4 class="fw-bold py-3 mb-4" style="display: flex; align-items: center;">
          <span class="text-muted fw-light">{{$b->tanggal}} /</span>
          <span style="flex-grow: 1;">{{$b->judul}}</span>
          <a href="{{route('addAktivitas',$b->id)}}" class="btn btn-outline-primary" style="margin-left: auto;">Tambah Aktivitas</a>
        </h4>
        <div class="row" data-masonry='{"percentPosition": true }'>
          @foreach ($b->aktivitas as $a)
            <div class="col-sm-6 col-lg-4 mb-4">
              <div class="card">
                <img class="card-img-top" src="{{asset('storage/uploaded/aktivitas/'.$a->fileName)}}" alt="Card image cap" />
                <div class="card-body">
                  <h5 class="card-title">{{$a->judul}}</h5>
                  <p class="card-text">
                    {{$a->deskripsi}}
                  </p>
                  <a href="javascript:void(0);" class="card-link">Edit</a>
                  <a href="{{route('deleteAktivitas',$a->id)}}" class="card-link">Hapus</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        @endif
    @endforeach
  </div>
  <div class="content-backdrop fade"></div>
</div>
@endsection
