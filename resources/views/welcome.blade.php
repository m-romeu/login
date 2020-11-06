@extends('layouts.app')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
            <form action="{{route('statuses.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <textarea class="form-control border-0" placeholder="type text" name="body"></textarea>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="create-status">Publish</button>
                </div>
            </form>
            </div>
        </div>
    </div>
 </div>
@endsection