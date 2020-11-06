@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="card-body">
                     <div class="form-group">
                     <label>Email:</label>
                         <input class="form-control" type="email" name="email">
                     </div>
                     <div class="form-group">
                     <label>Password:</label>
                     <input class="form-control" type="password" name="password">
                     </div>
                    <button class="btn btn-primary" id="login-btn">Login</button>
                 </div>
                </form>
            </div>
        </div>
    </div>
 </div>
@endsection