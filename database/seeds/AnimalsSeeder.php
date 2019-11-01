<?php

use Illuminate\Database\Seeder;
use App\Animal;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->truncate();

        $data = json_decode(file_get_contents(storage_path('clients.json'))); // change "clients.json" if your file is called something else

        // dd($data[0]->pets[0]);
        foreach($data as $i => $client) {
            foreach($client->pets as $pet){
                Animal::insert([
                    'client_id' => $i+1,
                    'name' => $pet->name,
                    'breed' => $pet->breed,
                    'weight' => $pet->weight,
                    'age' => $pet->age,
                    'photo_url' => $pet->photo
                ]);
                // var_dump($pet);
            }
        }
    }
}
