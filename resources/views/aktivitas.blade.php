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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> {{$b->tanggal}} /</span> {{$b->judul}}</h4>
                @endif
            
        @endforeach

        
        </div>
    <div class="content-backdrop fade"></div>
</div>
@endsection
