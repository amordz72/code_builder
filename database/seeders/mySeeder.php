<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
    }
}
