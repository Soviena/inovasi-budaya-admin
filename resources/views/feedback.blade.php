@extends('layout.layout')
@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h3 class="fw-bold py-3 mb-4 text-center">Feedback User</h3>
    
    <div class="card">
      <div class="table">
        <table class="table" id="tableFeedback">
          <thead>
            <tr>
              <th >Timestamp</th>
              <th >Nama User</th>
              <th >Judul Feedback</th>
              <th >Deskripsi Feedback</th>
              <th >Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach ($feedbacks as $feedback)
            @php
            $editedTimestamp = new \DateTime($feedback->updated_at);
            $currentTime = new \DateTime();
            $timeDifference = $currentTime->diff($editedTimestamp);
            if($timeDifference->y >= 1 || $timeDifference->m >= 1 || $timeDifference->d >= 1 || $timeDifference->h >= 1 || $timeDifference->i >= 1){
              $new = false;
            }else{
              $new = true;
            }
            @endphp
            <tr class="@if($new) table-primary @endif">  
              <td>{{ $feedback->created_at }}</td>
              <td>{{ $feedback->user->name }}</td>
              <td>{{ $feedback->judul }}</td>
              <td style="max-width: 20vw; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><a class="text-muted"  data-bs-toggle="modal" data-bs-target="#previewForm{{ $feedback->id }}" href="#">{{ $feedback->deskripsi }}</a></td>
              <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('previewFeedback', $feedback->id) }}" data-bs-toggle="modal" data-bs-target="#previewForm{{ $feedback->id }}">
                    <i class='bx bx-book-open'></i> Lihat
                </a>
                  <a class="dropdown-item" href="{{ route('deleteFeedback', $feedback->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>   
            </td>       
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="content-backdrop fade"></div>
</div>

  @foreach ($feedbacks as $feedback)
  <div class="modal fade" id="previewForm{{ $feedback->id }}" tabindex="-1" role="dialog" aria-labelledby="previewFeedback" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Preview Feedback</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mx-0" style="width: 15rem; font-weight: bold;">{{ $feedback->judul }}</p>
          <p class="w-100 mx-0" style="max-width: 120%;">{{ $feedback->deskripsi }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
  @endforeach

  <div class="content-backdrop fade"></div>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      var table = new DataTable("#tableFeedback",{order: [0,'desc']})
    });
  </script>

@endsection
