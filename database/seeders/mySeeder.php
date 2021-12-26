<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class mySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            $name="project_".$i;
            \App\Models\Project::create([
                "name" => $name,
                "db" => "db".$name,
                "url" => "http://localhost/".$name."/public",
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            $name="table_".$i;
            \App\Models\Tbl::create([
                "name" => $name,
                "project_id" => $i,
               
            ]);
        }
        \App\Models\User::create([
            "name" => 'name',
            "email" => 'dzamor72@gmail.com',
            'password' => Hash::make('12345678'),
          
           
        ]);
    }
}
