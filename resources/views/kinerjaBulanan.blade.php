@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="nav-align-top mb-4">
            
            <div class="card">
                <h5 class="card-header">Kinerja Bulanan</h5>
                <div class="table">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nama file</th>
                        <th>tanggal</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                        <td>Ini testing tanggal</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                              data-bs-toggle="modal"
                              data-bs-target="#lihatCSV"
                                ><i class='bx bx-book-open'></i> Preview</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editPoster"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#deletePoster"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                        <td>Ini testing tanggal</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                              data-bs-toggle="modal"
                              data-bs-target="#lihatCSV"
                                ><i class='bx bx-book-open'></i> Preview</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editPoster"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#deletePoster"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                        <td>Ini testing tanggal</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                              data-bs-toggle="modal"
                              data-bs-target="#lihatCSV"
                                ><i class='bx bx-book-open'></i> Preview</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editPoster"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#deletePoster"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
                        </td>
                        <td>Ini testing tanggal</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#lihatCSV"
                                ><i class='bx bx-book-open'></i> Preview</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editPoster"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#deletePoster"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihatCSV" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tabel Kinerja</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
            </div>
            <div class="modal-body">
            <table class="table table-striped">
                    <tbody class="table-border-bottom-0">
                    @foreach ($array as $i => $a)
            <tr>
                @foreach ($a as $j => $b)
                    @if ($i > 2 && $j > 7)
                        <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
                    @elseif ($i == 5 && $j > 2)
                        <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
                    @elseif ($i == 7 && $j > 2)
                        <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
                    @elseif ($i == 10 && $j > 2)
                        <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
                    @elseif ($i == 12 && $j > 2)
                        <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
                    @elseif ($i == 14 && $j > 2)
                        <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
                    @elseif ($i == 18 && $j > 2)
                        <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
                    @elseif ($i == 22 && $j > 2)
                        <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
                    @elseif ($i > 2 && $j > 2)
                        <td>{{number_format(ceil(floatval($b)))}}</td>
                    @else
                        <td>{{$b}}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
                </button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPoster" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="mb-3 row">
            <label for="html5-month-input" class="col-md-2 col-form-label">Month</label>
                <div class="col-md-10">
                    <input class="form-control" type="month" value="2021-06" id="html5-month-input">
                    </input>
                </div>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Pilih file</label>
          <input class="form-control" type="file" id="formFile">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color:#1A4980;">
          Tutup
        </button>
      </button>
      <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deletePoster" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Hapus</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color: #1A4980;">
          Tidak
        </button>
      </button>
      <button type="button" class="btn btn-danger">Ya</button>
      </div>
    </div>
  </div>
</div>

<div class="content-backdrop fade"></div>
@endsection

