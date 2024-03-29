@extends('layout.layout')
@section('content')
<div class="content-wrapper">
@php
  $title = "Tidak ada budaya yang sedang berlangsung";
  $deskripsi = "Silahkan tambahkan budaya dulu untuk bulan ini";
  $blnIni = false;
  $idbudaya = -1;
  $lewat = 0;
  $mendatang = 0;
@endphp
@foreach($budaya as $data)
  @php
    $dataYearMonth = date('Y-m', strtotime($data->tanggal));
    $currentYearMonth = date('Y-m');
  @endphp
  @if ($dataYearMonth == $currentYearMonth)
    @php
      $title = $data->judul;
      $deskripsi = $data->deskripsi;
      $idbudaya = $data->id;
      $blnIni = true;
    @endphp
  @elseif($dataYearMonth >= $currentYearMonth)
    @php
      $mendatang += 1;
    @endphp
  @elseif($dataYearMonth <= $currentYearMonth)
    @php
      $lewat += 1;
    @endphp
  @endif

@endforeach
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-5">
      <div class="card-header">Sedang berlangsung</div>
      <div class="card-body">
        <h5 class="card-title">{{$title}}</h5>
        <p class="card-text">
          {{$deskripsi}}
        </p>
        @if (!$blnIni)
        <a href="{{route('addBudaya')}}" class="btn btn-primary">Tambah Budaya</a>
        @else
        <a href="{{route('addAktivitas',$idbudaya)}}" class="btn btn-primary">Tambah Aktivitas</a>
        @endif
      </div>
    </div>
    <div class="nav-align-top mb-4">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#semuaBudaya" aria-controls="semuaBudaya" aria-selected="true">
            <i class="tf-icons bx bx-home"></i> Semua
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">{{count($budaya)}}</span>
          </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#BudayaMendatang" aria-controls="BudayaMendatang" aria-selected="false">
            <i class="tf-icons bx bx-user"></i> Mendatang
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">{{$mendatang}}</span>
          </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#BudayaLewat" aria-controls="BudayaLewat" aria-selected="false">
            <i class="tf-icons bx bx-message-square"></i> Telah lewat
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">{{$lewat}}</span>
          </button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="semuaBudaya" role="tabpanel">
          <table class="table">
            <thead>
              <tr>
                <th>Nama budaya</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($budaya as $b)
              <tr>
                <td>{{$b->judul}}</td>
                <td>{{$b->deskripsi}}</td>
                <td>{{$b->tanggal}}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{route('aktivitas',$b->id)}}"><i class="bx bx-photo-album me-1"></i> Aktivitas</a>
                      <a class="dropdown-item" href="{{route('editBudaya', $b->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="{{route('deleteBudaya',$b->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>    
              @endforeach                
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>              
                <td>
                  <a href="{{route('addBudaya')}}" class="btn btn-outline-primary">Tambah</a>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="tab-pane fade" id="BudayaMendatang" role="tabpanel">
          <table class="table">
            <thead>
              <tr>
                <th>Nama budaya</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach($budaya as $b)
              @php
                $dataYearMonth = date('Y-m', strtotime($b->tanggal));
                $currentYearMonth = date('Y-m');
              @endphp
                @if($dataYearMonth > $currentYearMonth)
                <tr>
                  <td>{{$b->judul}}</td>
                  <td>{{$b->deskripsi}}</td>
                  <td>{{$b->tanggal}}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('aktivitas',$b->id)}}"><i class="bx bx-photo-album me-1"></i> Aktivitas</a>
                        <a class="dropdown-item" href="{{route('editBudaya', $b->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{route('deleteBudaya',$b->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>              
                <td>
                  <a href="{{route('addBudaya')}}" class="btn btn-outline-primary">Tambah</a>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="tab-pane fade" id="BudayaLewat" role="tabpanel">
          <table class="table">
            <thead>
              <tr>
                <th>Nama budaya</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($budaya as $b)
                @php
                  $dataYearMonth = date('Y-m', strtotime($b->tanggal));
                  $currentYearMonth = date('Y-m');
                @endphp
                @if($dataYearMonth < $currentYearMonth)
                <tr>
                  <td>{{$b->judul}}</td>
                  <td>{{$b->deskripsi}}</td>
                  <td>{{$b->tanggal}}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('aktivitas',$b->id)}}"><i class="bx bx-photo-album me-1"></i> Aktivitas</a>
                        <a class="dropdown-item" href="{{route('editBudaya', $b->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{route('deleteBudaya',$b->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>              
                <td>
                  <a href="{{route('addBudaya')}}" class="btn btn-outline-primary">Tambah</a>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
  </div>

  <div class="content-backdrop fade"></div>  
</div>
@endsection