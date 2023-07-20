@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="nav-align-top mb-4">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
            <i class="tf-icons bx bx-user"></i> Data User
            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
          </button>
        </li>
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Panjang</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <td>tes</td>
                <td>test</td>
                <td>testing</td>
                <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editUser"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                  data-bs-toggle="modal"
                                  data-bs-target="#deleteUser"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                          
            </tbody>
            <tfoot>
              <tr>
                <td>tes</td>
                <td>test</td>
                <td>testing</td>              
                <td>
                  <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"
                            data-bs-toggle="modal"
                            data-bs-target="#editUser"
                          ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);"
                              data-bs-toggle="modal"
                              data-bs-target="#deleteUser"
                            ><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
  </div>
</div>

  <div class="content-backdrop fade"></div>
</div>
@endsection