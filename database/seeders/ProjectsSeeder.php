<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = new \App\Models\Projects();
        $p1->title = "Pirmas projektas";
        $p1->save();

        $p2 = new \App\Models\Projects();
        $p2->title = "Antras projektas";
        $p2->save();

        $p3 = new \App\Models\Projects();
        $p3->title = "Trečias projektas";
        $p3->save();
    }
}
