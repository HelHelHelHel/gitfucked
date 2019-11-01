@extends('layout')
@section('content')
    
<h1 style="text-align:center; margin-top:1rem">Pets R Us Hospital</h1>

<form style="text-align:center" action="{{ 'search' }}" method="get" role="search">
        
        @csrf
        <input type="text" name="surname" placeholder="surname"/>
        <button type="submit" class="btn btn-primary" > Search </button>

</form>

<div class="row">
@foreach ($animals as $animal)

    <div class="card col-md-3" style="margin: 2rem; margin-left: 4rem; text-align: center">
        <img style="height: 17rem; width: 20rem " src="{{ '/images/'.$animal->photo_url}}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">{{ $animal->name }}</h5>
          <ul>
              <li style="list-style:none" class="card-text"> Breed: {{ $animal->breed }}</li>
              <li style="list-style:none" class="card-text"> Weight: {{ $animal->weight }}</li>
              <li style="list-style:none" class="card-text"> Age: {{ $animal->age }}</li>
              <li style="list-style:none" class="card-text"> Client: {{ $animal->client->first_name}}  
              {{ $animal->client->surname }}</li>
            </ul>
          <a href="{{ action('AnimalsController@edit', $animal->id)}}" class="btn btn-primary">Edit</a>
          <a href="{{ action('AnimalsController@show', $animal->id)}}" class="btn btn-primary">Details</a>
        </div>
      </div>

    
@endforeach
    </div>
@endsection