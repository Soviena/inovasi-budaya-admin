@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="nav-align-top mb-4">
            
            <div class="card">
                <h5 class="card-header">Safety Moment</h5>
                <div class="table">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                        <td>Albert Cook</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                              data-bs-toggle="modal"
                              data-bs-target="#previewPoster"
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
                        <td>Barry Hunter</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                              data-bs-toggle="modal"
                              data-bs-target="#previewPoster"
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
                        <td>Trevor Baker</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                              data-bs-toggle="modal"
                              data-bs-target="#previewPoster"
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
                        <td>Jerry Milton</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#previewPoster"
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

<div class="modal fade" id="previewPoster" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Preview Poster</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="bg-image" 
            style="background-image: url('https://th.bing.com/th/id/OIP.3VTIvnXIT61CfqI9ucdR7gAAAA?pid=ImgDet&rs=1');
            height: 50vh; ">
        </div>
        <p class="mx-0" style="width: 15rem; font-weight: bold;">Deskripsi Foto</p>
        <p class="w-100 mx-0" style="max-width: 120%;">Sebuah foto yang dilakukan oleh seorang fotografer untuk kepentingan fotografi</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="color:white;">
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editPoster" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Poster</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="defaultInput" class="form-label">Ubah judul</label>
          <input id="defaultInput" class="form-control" type="text">
        </div>
        <div class="mb-3">
          <label for="defaultInput" class="form-label">ubah deskripsi</label>
          <textarea id="basic-default-message" class="form-control"  aria-describedby="basic-icon-default-message2" rows="3"></textarea>
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
        <h5 class="modal-title" id="exampleModalLabel1">Hapus Poster</h5>
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

