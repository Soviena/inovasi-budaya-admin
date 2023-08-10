@extends('layout.layout')
@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
      <h3 class="fw-bold py-3 mb-4 text-center">Data User</h3>
    <div class="nav-align-top mb-4">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
        </li>
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
          <table class="table" id="tableUser">
            <thead>
              <tr>
                <th style='width:1vw;'>Avatar</th>
                <th>Nama Panjang</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Tipe user</th>
                <th>Email Terverifikasi</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($manage as $m)
              <tr>
                <td>
                  <img class="rounded-3 mb-2 mx-auto shadow img-thumbnail" src="{{asset('storage/uploaded/user/'.$m->profilepic)}}" alt="{{$m->name}}" style="object-fit: cover; object-position: 25% 25%;">
                </td>
                <td>{{$m->name}}</td>
                <td>{{$m->email}}</td>
                <td>{{$m->tanggal_lahir}}</td>
                <td>
                  @if($m->admin == "TRUE")
                  <span class="badge bg-label-primary me-1">Admin</span>
                  @else
                  <span class="badge bg-label-warning me-1">Pengguna</span>
                  @endif
                </td>
                <td>
                  @if($m->email_verified_at != "")
                    <span class="badge bg-label-success me-1">TERVERIFIKASI</span>
                  @else
                    <span class="badge bg-label-danger me-1">BELUM VERIFIKASI</span>
                  @endif
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        data-bs-toggle="modal"
                        data-bs-target="#editUser-{{$m->id}}"
                        data-user-name="{{ $m->name }}"
                        data-user-email="{{ $m->email }}"
                        data-user-tanggal-lahir="{{ $m->tanggal_lahir }}"
                        data-user-password="{{ $m->password }}">
                        <i class="bx bx-edit-alt me-1"></i> Edit
                      </a>
                      <a class="dropdown-item" href="javascript:void(0);"
                          data-bs-toggle="modal"
                          data-bs-target="#hapusUser-{{$m->id}}">
                          <i class="bx bx-trash me-1"></i> Delete
                      </a>
                      @if($m->admin == "TRUE")
                      <a class="dropdown-item" href="javascript:void(0);"
                        data-bs-toggle="modal"
                        data-bs-target="#ubahUser-{{$m->id}}">
                        <i class="tf-icons bx bx-user me-1"></i> Jadikan Pengguna
                      </a>
                      @else
                      <a class="dropdown-item" href="javascript:void(0);"
                          data-bs-toggle="modal"
                          data-bs-target="#ubahAdmin-{{$m->id}}">
                          <i class="tf-icons bx bx-user me-1"></i> Jadikan Admin
                      </a>
                      @endif
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
                <td></td>       
                <td></td>       
                <td></td>        
                <td>
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#tambahUser"
                    >
                    Tambah
                  </button>
                </td>
              </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
</div>

@foreach($manage as $m)
<div class="modal fade" id="editUser-{{$m->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
      </div>
        <form action="{{ route('editUser', $m->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="name" class="form-label">Ubah nama user</label>
                  <input type="text" value="{{ $m->name }}" name="name" id="name" class="form-control"/>
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="email" class="form-label">Ubah Email</label>
                  <input type="email" value="{{ $m->email }}" name="email" id="email" class="form-control"/>
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="html5-date-input" class="form-label">Ubah Tanggal Lahir</label>
                  <input class="form-control" value="{{ $m->tanggal_lahir }}" name="tanggal_lahir" name="tanggal_lahir" type="date" id="html5-date-input">
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="password" class="form-label">Ubah Password</label>
                  <input type="text" value="" name="password" id="password" class="form-control"/>
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="file_profile" class="form-label">ubah profile</label>
                  <img class="rounded-3 mb-2 mx-auto shadow img-thumbnail" src="{{asset('storage/uploaded/user/'.$m->profilepic)}}" id="previeImage-{{$m->id}}" alt="@isset($m) <{{$m->name}} @endisset" style="width:100%;max-width:100%; object-fit: cover; object-position: 25% 25%;">
                  <input class="form-control" type="file" name="file_profile" id="file_profile" onchange="openModal(this,'previeImage-{{$m->id}}')" accept=".jpg,.png,.jpeg"/>
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Batal
              </button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>    
  </div>
</div>
@endforeach

<div class="modal fade" id="tambahUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">tambah User</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
      </div>
        <form action="{{route('tambahUser')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="name" class="form-label">input nama user</label>
                  <input type="text" value="" name="name" id="name" class="form-control" required />
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="email" class="form-label">input Email user</label>
                  <input type="email" value="" name="email" id="email" class="form-control" required />
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="html5-date-input" class="form-label">input Tanggal Lahir User</label>
                  <input class="form-control" value="" name="tanggal_lahir" name="tanggal_lahir" type="date" id="html5-date-input" required  >
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="password" class="form-label">input Password</label>
                  <input type="text" value="" name="password" id="password" class="form-control" required />
                </div>
              </div>

              <div class="row g-2">
                <div class="mb-3">
                  <label for="file_profile" class="form-label">input gambar profile</label>
                  <img class="rounded-3 mb-2 mx-auto shadow img-thumbnail" src="{{asset('storage/uploaded/user/default.png')}}" id="previewTambahUser" alt="@isset($m) <{{$m->name}} @endisset" style="width:100%;max-width:100%; object-fit: cover; object-position: 25% 25%;">
                  <input class="form-control" type="file" name="file_profile" id="file_profile" accept=".jpg,.png,.jpeg" onchange="openModal(this, 'previewTambahUser')" />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Batal
              </button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>    
  </div>
</div>

<div class="modal fade" id="deleteUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Hapus User</h5>
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

@foreach($manage as $m)
<div class="modal fade" id="hapusUser-{{$m->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Hapus User</h5>
        <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        ></button>
      </div>
      <form action="{{ route('hapusUser', $m->id) }}" method="GET" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data user ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color: #1A4980;">
          Tidak
        </button>
      </button>
      <input type="submit" class="btn btn-danger">
    </div>
      </form>
  </div>
</div>
</div>
@endforeach

@foreach($manage as $m)
<div class="modal fade" id="ubahAdmin-{{$m->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Ubah User menjadi admin</h5>
        <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        ></button>
      </div>
      <form action="{{ route('ubahAdmin', $m->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <p>Apakah anda yakin ingin mengubah user ini menjadi admin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color: #1A4980;">
          Tidak
        </button>
      </button>
      <input type="submit" class="btn btn-danger">
    </div>
      </form>
  </div>
</div>
</div>
@endforeach

@foreach($manage as $m)
<div class="modal fade" id="ubahUser-{{$m->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Ubah Admin menjadi User</h5>
        <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        ></button>
      </div>
      <form action="{{ route('ubahUser', $m->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <p>Apakah anda yakin ingin mengubah admin ini menjadi pengguna?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color: #1A4980;">
          Tidak
        </button>
      </button>
      <input type="submit" class="btn btn-danger">
    </div>
      </form>
  </div>
</div>
</div>
@endforeach
<div
class="bs-toast toast fade bg-primary bottom-0 end-0 position-absolute m-5"
role="alert"
aria-live="assertive"
aria-atomic="true"
id="editSuccessToast"
>
  <div class="toast-header">
    <i class="bx bx-bell me-2"></i>
    <div class="me-auto fw-semibold">Edit berhasil</div>
    <small></small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    Data telah di update
  </div>
</div>
<div class="content-backdrop fade"></div>
</div>

<div class="modal fade" id="CropperModal" tabindex="-1" aria-hidden="true" data-backdrop="static" data-bs-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Crop Gambar</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            onclick="closeModal()"
          ></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="mb-3">
            <img id="cropperImage" class="" src="{{asset('storage/uploaded/user/'.Auth::user()->profilepic)}}" style="max-width: 100%; display: block;">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" onclick="closeModal()" data-bs-dismiss="modal">
          Batal
        </button>
        <button type="submit" id="okButton" class="btn btn-primary">Update</button>
      </div>
    </div>    
  </div>
</div>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
<script>
  const cropperImage = document.getElementById('cropperImage');
  const okButton = document.getElementById('okButton');
  const options = {
    backdrop: 'static',   // Set backdrop option to 'static' to prevent closing on backdrop click
    keyboard: false       // Set keyboard option to false to prevent closing on Escape key press
  };
  const modal = new bootstrap.Modal(document.getElementById('CropperModal'),options);
  let cropper;
  function checkFileSize(input) {
      const maxFileSize = 7 * 1024 * 1024; // 10MB in bytes
      if (input.files.length > 0) {
          const fileSize = input.files[0].size;
          if (fileSize > maxFileSize) {
              alert("File size exceeds the maximum allowed limit of 7MB.");
              input.value = ''; // Clear the input
              return true;
          }else{
            return false;
          }
      }
  }
  function openModal(fileInput,preview){
    if (checkFileSize(fileInput)) {
      return;
    }
    document.getElementById("okButton").onclick = function() {
      updatePreview(preview,fileInput);
    };
    modal.show();
    const file = fileInput.files[0];

    // Ensure that a file was selected
    if (file) {
      // Create a FileReader to read the image file
      const reader = new FileReader();

      // Set up the FileReader onload event to display the image and initialize the cropper
      reader.onload = function (e) {
        const imageUrl = e.target.result;
        cropperImage.src = imageUrl;

        // Initialize Cropper.js with the image
        cropper = new Cropper(cropperImage, {
          aspectRatio: 1, // Change this value to set the aspect ratio (e.g., 16/9, 4/3, 1, etc.)
          viewMode: 2,
          minContainerWidth: 500,
          minContainerHeight: 500,
          minCanvasWidth: 100,
          minCanvasHeight: 100,    // Set the crop box to be within the container
        });
      };

      // Read the image file as a data URL
      reader.readAsDataURL(file);
    } else {
      // If no file was selected, reset the cropper and image source
      cropperImage.src = "{{asset('storage/uploaded/user/default.png";
      if (cropper) {
        cropper.destroy();
      }
    }
  }

  function updatePreview(previewImage, input) {
    if (cropper) {
      modal.hide();
      // Get the cropped image as a data URL
      const croppedImageDataURL = cropper.getCroppedCanvas().toDataURL();

      // Display the cropped image or do something else with the data URL
      // For example, you can set it as the source of another image element:
      document.getElementById(previewImage).src = croppedImageDataURL;
      loadURLToInputFiled(croppedImageDataURL, input);

      // Destroy the cropper instance
      cropper.destroy();
    }
  }

  function loadURLToInputFiled(url,inputFile) {
  getImgURL(url, (imgBlob) => {
    // Load img blob to input
    // WIP: UTF8 character error
    let fileName = 'pic';
    let file = new File([imgBlob], fileName, { type: "image/jpeg", lastModified: new Date().getTime() }, 'utf-8');
    let container = new DataTransfer();
    container.items.add(file);
    inputFile.files = container.files;
  });
  }
  function getImgURL(url, callback){
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        callback(xhr.response);
    };
    xhr.open('GET', url);
    xhr.responseType = 'blob';
    xhr.send();
  } 

  function closeModal() {
    modal.hide();
    cropper.destroy();
  }
  $(document).ready(function () {
    var table = new DataTable("#tableUser",{order:[[4,'asc'],[1,'asc']]})
    @error('email')
      FailedSuccess = new bootstrap.Toast(document.getElementById('editFailedSuccess'));
      FailedSuccess.show();
    @enderror
  });
</script>


@endsection