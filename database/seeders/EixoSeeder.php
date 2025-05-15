<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EixoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('eixos')->insert([
            'nome' => 'Informática',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
