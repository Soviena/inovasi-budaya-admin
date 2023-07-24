@extends('layout.layout')
@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h3 class="fw-bold py-3 mb-4 text-center">Feedback User</h3>
    
    <div class="card">
      <div class="table">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center" style="vertical-align: middle">No</th>
              <th class="text-center" style="vertical-align: middle">Nama User</th>
              <th class="text-center" style="vertical-align: middle">Judul Feedback</th>
              <th class="text-center" style="vertical-align: middle">Deskripsi Feedback</th>
              <th class="text-center" style="vertical-align: middle">Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>            
              <td>1</td>
              <td>Harry</td>
              <td>Keluh-Kesah</td>
              <td>Terjadi error di bagian homepage pada aplikasi, lalu pada bagian kinerja terkadang tidak menampilkan tabel dan juga saat ingin mengakses web, terkadang button yang me-refer ke web sucofindo sulit untuk ditekan</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#basicModal">
                      <i class="bx bx-book-open"></i> Preview
                    </a>                    
                    <a class="dropdown-item delete-item" href="#">
                      <i class="bx bx-trash me-1"></i> Delete
                    </a>
                  </div>                  
                </div>
              </td>
            </tr>
            <tr>            
              <td>1</td>
              <td>Harry</td>
              <td>Keluh-Kesah</td>
              <td>Terjadi error di bagian homepage pada aplikasi, lalu pada bagian kinerja terkadang tidak menampilkan tabel dan juga saat ingin mengakses web, terkadang button yang me-refer ke web sucofindo sulit untuk ditekan</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#basicModal">
                      <i class="bx bx-book-open"></i> Preview
                    </a>                    
                    <a class="dropdown-item delete-item" href="#">
                      <i class="bx bx-trash me-1"></i> Delete
                    </a>
                  </div>                  
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="content-backdrop fade"></div>

  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="basicModalLabel">Deskripsi Feedback</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          KADJAan aksajwkawkaj a,djakdjaijdia akwawhabmbna kawhdnakwh jawajwhajebah jawyajebsaj
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- Add any other buttons if needed -->
      </div>
    </div>
  </div>
  </div>
</div>
@endsection
