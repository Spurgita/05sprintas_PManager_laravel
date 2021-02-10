<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e1 = new \App\Models\Employees();
        $e1->name = "Jonas";
        $e1->surname = "Jonaitis";
        $e1->proj_id = 1;
        $e1->save();

        $e2 = new \App\Models\Employees();
        $e2->name = "Petras";
        $e2->surname = "Petraitis";
        $e2->proj_id = 2;
        $e2->save();
    }
}
