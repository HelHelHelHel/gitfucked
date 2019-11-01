<?php

use Illuminate\Database\Seeder;
use App\Client;
class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('clients')->truncate();

        $data = json_decode(file_get_contents(storage_path('clients.json'))); // change "clients.json" if your file is called something else

        //dd($data[0]); put this and run php artisan db:seed --class=name of the seeder to see it in the c
        foreach($data as $i => $client) {
            
                Client::insert([
                    'id' => $i+1,
                    'first_name' => $client->first_name,
                    'surname' => $client->surname,
                    
                    
                ]);
                // var_dump($pet);
            
        }
    
    }
}
