@extends('layout.layout')
@section('content')
<div class="content-wrapper">
@php
  $title = "Tidak ada budaya yang sedang berlangsung";
  $deskripsi = "Silahkan tambahkan budaya dulu untuk bulan ini";
  $blnIni = false;
  $idbudaya = -1;
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
    @break
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
        <a href="{{route('addAktivitas',$idbudaya)}}" class="btn btn-primary 
        @if (!$blnIni)
          disabled
        @endif">Tambah Aktivitas</a>
      </div>
    </div>
    <div class="nav-align-top mb-4">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
            <i class="tf-icons bx bx-home"></i> Semua
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
          </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
            <i class="tf-icons bx bx-user"></i> Mendatang
          </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">
            <i class="tf-icons bx bx-message-square"></i> Telah lewat
          </button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
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
                      <a class="dropdown-item" href="{{route('aktivitas',$b->id)}}"><i class='bx bx-photo-album me-1' ></i> Aktivitas</a>
                      <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editBudaya"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
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
        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
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
                        <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editBudaya-this-{{$b->id}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                        <a class="dropdown-item" href="{{route('deleteBudaya',$b->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <div class="modal" id="editBudaya-this-{{$b->id}}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Edit Budaya</h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('updateBudaya', $b->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                        <div class="mb-3">
                          <label for="defaultInput" class="form-label">Ubah Nama Budaya</label>
                          <input class="form-control" type="text" value="{{ $b->judul }}" name="judul" id="judul">
                        </div>
                        <div class="mb-3">
                          <label for="defaultInput" class="form-label">Ubah Deskripsi</label>
                          <input class="form-control" type="text" value="{{ $b->deskripsi }}" name="deskripsi" id="deskripsi">
                        </div>
                        <div class="mb-3">
                          <label for="html5-month-input" class="col-md-2 col-form-label">Bulan</label>
                          <input class="form-control" name="tanggal" type="month" value="{{ $b->tanggal }}"  id="tanggal">
                      </div>
                      <div class="modal-footer">
                        <div class="row justify-content-end">
                          <div class="col-md-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                              Batal
                            </button>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
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
        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
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
                        <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editBudaya"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
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