<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // maakt 1 admin aan
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@pasopjedier.nl',
            'is_admin' => true,
        ]);

        //maakt 5 oppassers aan
        \App\Models\User::factory(5)->create(['is_sitter' => true])->each(function ($user){
            $user->sitterProfile()->create
            ([
                'description' => 'Ik ben een ervaren oppasser en een echte dierenvriend.',
                'hourly_rate' => rand(5, 20),
            ]);
        });

        //maakt 10 eigenaren aan
        \App\Models\OppasRequest::factory(10)->create();
    }
}
