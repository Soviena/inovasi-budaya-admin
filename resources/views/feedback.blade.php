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
              <th >User ID</th>
              <th >Judul Feedback</th>
              <th >Deskripsi Feedback</th>
              <th >Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach ($feedback as $feedbacks)
            <tr>  
              <td>{{ $feedbacks->user_id }}</td>
              <td>{{ $feedbacks->judul }}</td>
              <td>{{ $feedbacks->deskripsi }}</td>
              <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('previewFeedback', $feedbacks->id) }}" data-bs-toggle="modal" data-bs-target="#previewForm{{ $feedbacks->id }}">
                    <i class='bx bx-book-open'></i> Preview
                </a>
                  <a class="dropdown-item" href="{{ route('deleteFeedback', $feedbacks->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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

  @foreach ($feedback as $feedbacks)
  <div class="modal fade" id="previewForm{{ $feedbacks->id }}" tabindex="-1" role="dialog" aria-labelledby="previewFeedback" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Preview Feedback</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mx-0" style="width: 15rem; font-weight: bold;">{{ $feedbacks->judul }}</p>
          <p class="w-100 mx-0" style="max-width: 120%;">{{ $feedbacks->deskripsi }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
  @endforeach

  <div class="content-backdrop fade"></div>

@endsection
