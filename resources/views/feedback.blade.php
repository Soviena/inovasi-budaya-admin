@extends('layout.layout')
@section('content')
<div class="content-wrapper">
    <div class="card">
      <h5 class="card-header text-center">Feedback User</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr class="text-nowrap">
              <th>ID User</th>
              <th>Nama User</th>
              <th>Judul Feedback</th>
              <th>Deskripsi Feedback</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->user_id }}</td> 
                <td>{{ $feedback->name }}</td>                    
                <td>{{ $feedback->judul }}</td> 
                <td>{{ $feedback->deskripsi }}</td> 
                <td>{{ $feedback->created_at }}</td> 
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>          
</div>
@endsection
