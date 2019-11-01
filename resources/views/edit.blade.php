@extends('layout')

@section('content')


    @if($errors->count())
        
    @foreach($errors->all() as $error)
        <div class="alert-danger">{{ $error }}</div>
    @endforeach

    @endif

    <form action="{{ route('animals.update', [$animal->id]) }}" method="post">
        @method("put")
        @csrf

    <div class="form-group">
        <label for="">Client ID</label><br>
        <input class="form-control" type="text" name="client_id" value="{{ old('client_id', $animal->client_id) }}">
    </div>
   

    <div class="form-group">
        <label for="">Name</label><br>
        <input class="form-control" type="text" name="name" value="{{ old('name', $animal->name) }}">
    </div>

    <div class="form-group">
        <label for="">Breed</label><br>
        <input class="form-control" type="text" name="breed" value="{{ old('breed', $animal->breed) }}">
    </div>

    <div class="form-group">
        <label for="">Weight</label><br>
        <input class="form-control" type="text" name="weight" value="{{ old('weight', $animal->weight) }}">
    </div>

    <div class="form-group">
        <label for="">Age</label><br>
        <input class="form-control" type="number" name="age" value="{{ old('age', $animal->age) }}">
    </div>

    <div class="form-group">
        <label for="">Photo URL</label><br>
        <input class="form-control" type="text" name="photo_url" value="{{ old('photo_url', $animal->photo_url) }}">
    </div>

    <button type="submit" class="btn btn-success">submit</button>


    </form>

    <form action="{{ route('animals.destroy', [$animal->id]) }}" method="post">
        @method("delete")
        @csrf

        <button type="submit" class="btn btn-danger" > Delete</button>

    </form>

    
    <a href="{{ action('AnimalsController@index')}}" class="btn btn-primary">Back to Animals</a>



@endsection