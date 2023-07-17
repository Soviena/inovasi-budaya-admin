@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="nav-align-top mb-4">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
            <i class="tf-icons bx bx-user"></i> Top User
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
              
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    
                  </div>
                </td>
              </tr>
                          
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
            
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                     
                  </td>
                </tr>
               
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>              
                <td>
                  
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
              
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                     
                    </div>
                  </td>
                </tr>
                
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>              
                <td>
                  
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