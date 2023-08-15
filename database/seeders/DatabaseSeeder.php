<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DesignationSeeder::class
        ]);

        $Admin = User::create([
            'first_name'=>"Admin",
            'last_name'=>"Admin",
            'email'=>"admin@email.local",
            'phone'=>"0000000000",
            'password'=>bcrypt("password"),
            'national_id'=>"00000000"
        ]);

        $admin_designation = Designation::where('name','Administrator')->first();

        $Admin->designation()->attach($admin_designation);
    }
}
