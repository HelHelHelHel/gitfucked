@extends('layout')

@section('content')

    @if($errors->count())
    
    @foreach($errors->all() as $error)
        <div class="alert-danger">{{ $error }}</div>
    @endforeach

    @endif

    <form action="{{ route('animals.store') }}" method="post">
        @csrf

    <div class="form-group">
        <label for="">Client ID</label><br>
        <input class="form-control" type="text" name="client_id" value="{{ old('client_id') }}">
    </div>

    <div class="form-group">
        <label for="">Name</label><br>
        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="">Breed</label><br>
        <input class="form-control" type="text" name="breed" value="">
    </div>

    <div class="form-group">
        <label for="">Weight</label><br>
        <input class="form-control" type="text" name="weight" value="">
    </div>

    <div class="form-group">
        <label for="">Age</label><br>
        <input class="form-control" type="number" name="age" value="">
    </div>

    <div class="form-group">
        <label for="">Photo URL</label><br>
        <input class="form-control" type="text" name="photo_url" value="">
    </div>

    <button type="submit" class="btn btn-primary">Sign up</button>

    </form>

    
@endsection