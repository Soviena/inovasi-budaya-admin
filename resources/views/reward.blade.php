@extends('layout.layout')
@section('content')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  var users = JSON.parse(atob(`{{$user}}`));
  function addTable(periodeId, tableID){
    users.forEach(user => {
      user['totalVisit'] = 0;
      user['bulan'].forEach(bulan => {
        user['totalVisit'] += bulan['pivot']['visit'];
      });
      form = `
      <form action="/reward/add/${user['id']}/${periodeId}" id="formInput-${user['id']}-${periodeId}" method="post">
        @csrf
        <input type="hidden" name="rewardsName" class="rewardsName-form">
        <input type="hidden" name="deskripsi" class="deskripsi-form">
      </form>      
      `
      $(`#hiddenInput-${periodeId}`).append(form);
      table=`
      <tr> 
          <td>${user['name']}</td>
          <td>${user['email']}</td>
          <td>${user['totalVisit']}</td>
          <td>
            <button class="btn btn-primary" onclick="submitForm('formInput-${user['id']}-${periodeId}',${periodeId})">
              <i class="fas fa-plus"></i>Tambah
            </button>
          </td>
        </tr>
      `
      $(tableID).append(table);
    });
  }
</script>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-5">
      <div class="card-header">Daftar Reward</div>
      <div class="card-body">
        <h5 class="card-title">Siapa saja yang akan mendapatkan reward ?</h5>
        <p class="card-text">
          Tambahkan reward per-periode, per-tahun dll..
        </p>
        <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPeriode">Tambah Reward</a>
      </div>
    </div>

    @foreach($periodeReward as $pr)
    <div class="">
      <h2 class="mt-5" id="headingOne">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-{{$pr->id}}" aria-expanded="false" aria-controls="accordionOne">
          {{$pr->periode}}
        </button>
        <button class="btn btn-outline-primary my-3" data-bs-toggle="modal" data-bs-target="#editPeriode-{{$pr->id}}">
          <i class="bx bx-pencil"></i>
        </button>
        <button class="btn btn-outline-danger my-3" onclick="if (confirm('Yakin ingin menghapus data tersebut ?')) {window.location.href = '{{ route("deletePeriode", $pr->id)}}';}">
          <i class="bx bx-trash"></i>
        </button>
      </h2>
      <div id="accordion-{{$pr->id}}" class="accordion-collapse collapse" data-bs-parent="#accordion-{{$pr->id}}">
        <div class="accordion-body">
          <div class="d-flex flex-wrap">
            @foreach($pr->users as $u)
            <div class="card border mx-3" style="height: 40vh; width:250px;">
              <div class="card-body text-center" style=" align-items: center; height: 20%; overflow-y: auto;">
                <img src="{{asset('storage/uploaded/user/'.$u->profilepic)}}" class="img-fluid rounded-circle mx-5" alt="Circular Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; overflow: hidden;">
                <p class="mx-auto" style="font-weight: bold;">{{$u->name}}</p>
                <p class="mx-auto" style="font-weight: bold;">{{$u->pivot->rewardsName}}</p>
                <p class="card-text mb-3 w-100 mx-0" style="max-width: 120%; text-align: left;">
                  {{$u->pivot->deskripsi}}
                </p>
              </div>  
              <div class="card-footer">
                <a href="javascript:void(0);" class="card-link" data-bs-toggle="modal" data-bs-target="#editReward-{{$pr->id}}-{{$u->id}}">Edit</a>
                <a href="{{route('deleteReward',[$u->id,$pr->id])}}" class="card-link">Hapus</a>
              </div>
            </div>
            <div class="modal fade" id="editReward-{{$pr->id}}-{{$u->id}}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Profile</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="{{route('editReward',[$u->id,$pr->id])}}" method="post">
                  @csrf
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="defaultInput" class="form-label">Ubah Judul Reward</label>
                      <input id="defaultInput" class="form-control" name="rewardsName" type="text" value="{{$u->pivot->rewardsName}}">
                    </div>
                    <div class="mb-3">
                      <label for="defaultInput" class="form-label">Ubah Deskripsi</label>
                      <textarea id="basic-default-message" class="form-control" name="deskripsi" aria-describedby="basic-icon-default-message2" rows="3">{{$u->pivot->deskripsi}}</textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color:#1A4980;">
                      Tutup
                    </button>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                  </div>
                </form>
                </div>
              </div>
            </div>
            @endforeach
            <div class="card border icon-card text-center mx-5" style="height:40vh; width:250px">
              <a data-bs-toggle="modal" data-bs-target="#addReward-{{$pr->id}}" class="btn">
                <div class="card-body my-4">
                <div class="border border-0">
                  <div class="card-body pt-5">
                    <i class='bx bx-plus' style="font-size: 6rem " ></i>
                    <p class="icon-name text-capitalize text-truncate" style="font-size: 1.2rem " >Tambah</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="addReward-{{$pr->id}}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel4">Input Pemenang</h5>
            <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="mb-3 row">
              <label for="rewardsName" class="col-md-2 col-form-label">Judul Reward</label>
              <div class="col-md-10">
                <input class="form-control" type="text" value=""  id="rewardsName-{{$pr->id}}" onchange="changeInput(this,'rewardsName-form')" required >
              </div>
            </div>
            <div class="mb-3 row">
              <label for="deskripsi" class="col-md-2 col-form-label">Deskripsi Reward</label>
              <div class="col-md-10">
                <input class="form-control" type="text" value="" name="deskripsi" id="deskripsiRewards-{{$pr->id}}"  onchange="changeInput(this,'deskripsi-form')" required >
              </div>
            </div>
            <label for="html5-month-input" class="col-md-6 col-form-label">Dari bulan sampai bulan ..</label>
            <div class="mb-3 row">
              <div class="col-md-5">
                <select id="awalBulan-{{$pr->id}}" class="form-select">
                  <option>Dari Bulan</option>
                  @foreach($bulan as $b)
                    <option value="{{$b->bulan}}">{{$b->bulan}}</option>
                  @endforeach
                </select>              
              </div>
              <div class="col-md-5">
                <select id="akhirBulan-{{$pr->id}}" class="form-select">
                  <option>Sampai Bulan</option>
                  @foreach($bulan as $b)
                    <option value="{{$b->bulan}}">{{$b->bulan}}</option>
                  @endforeach
                </select>              
              </div>
              <div class="col-md-2">
                <button type="button" class="btn btn-outline-primary" onclick="recountVisit(document.getElementById('awalBulan-{{$pr->id}}').value,document.getElementById('akhirBulan-{{$pr->id}}').value,'#tableUser-{{$pr->id}}','{{$pr->id}}')">Hitung</button>
              </div>
            </div>
            <div id="hiddenInput-{{$pr->id}}">

            </div>
            <table class="table" id="tableUser-{{$pr->id}}">
              <thead>
                <tr>
                  <th>Nama Panjang</th>
                  <th>Email</th>
                  <th>Banyak membuka aplikasi</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="tableTambahUser-{{$pr->id}}">
                <script>
                  addTable('{{$pr->id}}', '#tableTambahUser-{{$pr->id}}')
                  var table_{{$pr->id}} = new DataTable("#tableUser-{{$pr->id}}",{order:[2,'desc']})
                </script>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Tutup
            </button>
          </div>
        </div>
      </div>  
    </div>
    @endforeach
    <div class="content-backdrop fade"></div>
  </div>
</div>
<div class="modal fade" id="tambahPeriode" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('addPeriode')}}" method="post">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="newPeiode">Tambah periode Reward</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <label for="html5-month-input" class="col-md-6 col-form-label">Dari bulan sampai bulan ..</label>
        <div class="mb-3 row">
          <div class="col-md-6">
            <input class="form-control" type="month" placeholder="Dari bulan .." id="awalBulan" onchange="changePeiodeAwal(this, document.getElementById('periodeText'))">
          </div>
          <div class="col-md-6">
            <input class="form-control" type="month" placeholder="Sampai bulan .." id="akhirBulan" onchange="changePeiodeAkhir(this,document.getElementById('periodeText'))">
          </div>
        </div>
        <div class="mb-3">
          <label for="defaultInput" class="form-label">Periode</label>
          <input id="periodeText" name="periode" class="form-control" type="text">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color:#1A4980;">
          Tutup
        </button>
        <input type="submit" class="btn btn-primary" value="Tambahkan">
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
@foreach($periodeReward as $pr)
<div class="modal fade" id="editPeriode-{{$pr->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('editPeriode',$pr->id)}}" method="post">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="newPeiode">Edit periode Reward</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <label for="html5-month-input" class="col-md-6 col-form-label">Dari bulan sampai bulan ..</label>
        <div class="mb-3 row">
          <div class="col-md-6">
            <input class="form-control" type="month" placeholder="Dari bulan .." id="awalBulan" onchange="changePeiodeAwal(this, document.getElementById('periodeText-{{$pr->id}}'))">
          </div>
          <div class="col-md-6">
            <input class="form-control" type="month" placeholder="Sampai bulan .." id="akhirBulan" onchange="changePeiodeAkhir(this,document.getElementById('periodeText-{{$pr->id}}'))">
          </div>
        </div>
        <div class="mb-3">
          <label for="defaultInput" class="form-label">Periode</label>
          <input id="periodeText-{{$pr->id}}" name="periode" class="form-control" type="text" value="{{$pr->periode}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="color:#1A4980;">
          Tutup
        </button>
        <input type="submit" class="btn btn-primary" value="Tambahkan">
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<script>
  function changeInput(thisText,destinationId) {
    textDestination = document.getElementsByClassName(destinationId);
    for (let index = 0; index < textDestination.length; index++) {
      textDestination[index].value = thisText.value; 
    }
  }
  function submitForm(form,id) {
    // Get the hidden input element
    const rewardInput = document.getElementById('rewardsName-'+id);
    const deskripsiInput = document.getElementById('deskripsiRewards-'+id);
    
    // Check if the hidden input is not empty
    if ((rewardInput.value.trim() !== '')&&(deskripsiInput.value.trim() !== '')) {
        document.getElementById(form).submit();
        return true;
    } else {
        alert('Isi data reward terlebih dahulu');
        event.preventDefault(); 
        return false;
    }
  }
  function changePeiodeAwal(elem,target) {
    console.log(elem)
    target.value = formatDate(elem.value)+" -> "
  }
  function changePeiodeAkhir(elem,target) {
    target.value += elem.value
    target.value = replaceStringAfterSymbol(target.value,">"," "+formatDate(elem.value))
  }
  function replaceStringAfterSymbol(originalString, symbol, replacement) {
    // Use the split method to divide the string into parts based on the symbol
    const parts = originalString.split(symbol);

    // Check if the symbol is present in the string
    if (parts.length > 1) {
      // Replace the part after the symbol with the replacement
      parts[1] = replacement;
    }

    // Join the parts back together using the join method
    return parts.join(symbol);
  }
  function formatDate(inputDate) {
    const date = new Date(inputDate);
    const year = date.getFullYear();
    const month = date.toLocaleString('default', { month: 'long' });
    return `${month} ${year}`;
  }

  function recountVisit(bulanAwal, bulanAkhir, tableId, periodeId, dataTable) {
    const startDate = new Date(bulanAwal);
    const endDate = new Date(bulanAkhir);

    // Clear the table body, but keep the form row intact
    $(tableId).find('tbody').empty();
    $(tableId).dataTable().api().clear()
    users.forEach(user => {
      user.totalVisit = 0;
      user.bulan.forEach(bulan => {
        const tanggal = new Date(bulan.bulan);
        if (tanggal >= startDate && tanggal <= endDate) {
          user.totalVisit += bulan.pivot.visit;
        }
      });

      // Create the data row for the table
      const tableRow = `
        <tr> 
          <td>${user.name}</td>
          <td>${user.email}</td>
          <td>${user.totalVisit}</td>
          <td>
            <button class="btn btn-primary" onclick="submitForm('formInput-${user.id}-${periodeId}', ${periodeId})">
              <i class="fas fa-plus"></i>Tambah
            </button>
          </td>
        </tr>
      `;

      // Append the form and data rows to the table body
      $(tableId).find('tbody').append(tableRow);
      $(tableId).DataTable().row.add([user.name,user.email,user.totalVisit,`<button class="btn btn-primary" onclick="submitForm('formInput-${user.id}-${periodeId}', ${periodeId})"><i class="fas fa-plus"></i>Tambah</button>`]);
    });
    $(tableId).dataTable().api().draw();
  }

</script>
@endsection

