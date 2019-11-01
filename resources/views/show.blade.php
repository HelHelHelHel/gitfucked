@extends('layout')

@section('content')


<div class="card" style="width: 500px; text-align: center; margin: 3rem">
    <img src="{{ '/images/'.$animal->photo_url}}" class="card-img-top" alt="...">
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
      <a href="{{ url('/')}}" class="btn btn-primary">List of Animals</a>
    </div>
  </div>

@endsection
