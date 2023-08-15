<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = ['Administrator','Moderator','Driver','Client'];

        foreach ($designations as $value){
            $designation = new Designation;

            $designation->name = $value;

            $designation->save();
        }
    }
}
