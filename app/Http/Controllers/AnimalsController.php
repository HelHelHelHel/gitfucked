<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Client;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::with('client')->paginate(21);
        return view('welcome', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal = new Animal;
        return view('create', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'name' => 'required|max:127',
            'breed' => 'required|max:127',
            'weight' => 'required'
        ]);

        $animal = Animal::create($request->except(['_token']));
        
        return redirect(action('AnimalsController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);

       return view('edit', compact('animal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id)->update($request->except(['_token']));

        //$animal->save();
        
        return redirect(action('AnimalsController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Animal::destroy($id); 
        
        return redirect(action('AnimalsController@index'));
        
    }
    public function search(Request $request) 
    {
        $surname = $request->get('surname');
        
        $client = Client::with('animals')->where('surname', "{$surname}")->first();
        
        $animals = $client->animals;
        
        return view('welcome', compact('animals'));
        
    }
}
