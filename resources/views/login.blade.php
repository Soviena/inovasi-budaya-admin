@extends('layout.layout')
@section('content')

<div class="container p-5 rounded-4" style="color:white;max-width: 400px; margin-top: 25vh; background-color: #1A4980; border: 5px solid #FA830F; border-radius: 66px;">
    <h2 style="margin-bottom: 20px; text-align: center;">Login</h2>
    <form>
        <div class="my-5">
            <label for="email" style="font-weight: bold;">Email</label>
            <input type="email" id="email" class="form-control" style="height: 40px;" placeholder="Enter your email">
        </div>
        <div class="my-3">
            <label for="password" style="font-weight: bold;">Password</label>
            <input type="password" id="password" class="form-control" style="height: 40px;" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn p-2 mt-5" style="width: 100%; font-weight: bold;
        --bs-btn-color:#fff;
        --bs-btn-bg: #FA830F;    
        --bs-btn-hover-color: #fff;
        --bs-btn-hover-bg: #FA830F;
        --bs-btn-active-color: #fff;
        --bs-btn-active-bg: #FA830F;">Login</button>
    </form>
</div>
@endsection