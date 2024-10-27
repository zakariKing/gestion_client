<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Assuming you want to create 2 comptes per client
        $clients = DB::table('clients')->pluck('id')->toArray();

        foreach ($clients as $clientId) {
                DB::table('comptes')->insert([
                    'rib' => $this->generateRIB(),
                    'solde' => rand(100, 12399), // Random balance between 100 and 12399
                    'client_id' => $clientId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
    }

    // Helper function to generate a random RIB
    private function generateRIB()
    {
        // Example RIB generation logic, you can customize it
//        return 'RIB-' . Str::random(10);
        return 'RIB-' . rand(1000, 9999);

    }
}
