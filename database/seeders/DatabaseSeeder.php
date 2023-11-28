<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i = 0; $i < 5; $i++) {
            DB::table('khat_types')->insert([
                'khat_name' => 'sector' . $i
            ]);
        }
        DB::table('transaction_types')->insert([
            'transaction_types_name' => 'income'
        ]);
        DB::table('transaction_types')->insert([
            'transaction_types_name' => 'expense'
        ]);
    }
}