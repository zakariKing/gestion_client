<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $clients = [
            ['prenom' => 'abdellah', 'nom' => 'khabla','created_at' => now()],
            ['prenom' => 'haitham', 'nom' => 'taous','created_at' => now()],
            ['prenom' => 'Aya', 'nom' => 'jamil','created_at' => now()],
            ['prenom' => 'Habiba', 'nom' => 'el mahfoudi','created_at' => now()],
            ['prenom' => 'oussama', 'nom' => 'benjelloun','created_at' => now()],
            ['prenom' => 'Iqbal', 'nom' => 'hadeq','created_at' => now()],
            ['prenom' => 'soukaina', 'nom' => 'Bounouar','created_at' => now()],
            ['prenom' => 'malak', 'nom' => 'dakka','created_at' => now()],
            ['prenom' => 'Zineb', 'nom' => 'Mabrouk','created_at' => now()],
            ['prenom' => 'Yassine', 'nom' => 'El Abbaoui','created_at' => now()],
            ['prenom' => 'amine', 'nom' => 'baadi','created_at' => now()],
            ['prenom' => 'ismail', 'nom' => 'ourdou','created_at' => now()],
            ['prenom' => 'yousra', 'nom' => 'benrhalem','created_at' => now()],
            ['prenom' => 'salma', 'nom' => 'oulgarga','created_at' => now()],
            ['prenom' => 'meriem', 'nom' => 'elbabidi','created_at' => now()],
            ['prenom' => 'oumaima', 'nom' => 'jaboune','created_at' => now()],
            ['prenom' => 'Othmane', 'nom' => 'chetoui','created_at' => now()],
            ['prenom' => 'abderahman', 'nom' => 'bendahman','created_at' => now()],
            ['prenom' => 'Hiba', 'nom' => 'kaiwach','created_at' => now()],
            ['prenom' => 'manar', 'nom' => 'lefdaoui','created_at' => now()],
            ['prenom' => 'Nour El Houda', 'nom' => 'laksiouer','created_at' => now()],
            ['prenom' => 'Imane', 'nom' => 'Talmoust','created_at' => now()],
            ['prenom' => 'oumaima', 'nom' => 'habbou','created_at' => now()],
            ['prenom' => 'ahlame', 'nom' => 'mehra','created_at' => now()],
            ['prenom' => 'Rania', 'nom' => 'Benzaouagh','created_at' => now()],
            ['prenom' => 'Rania', 'nom' => 'Erradi','created_at' => now()],
            ['prenom' => 'yassir', 'nom' => 'bjarho','created_at' => now()],
            ['prenom' => 'anas', 'nom' => 'louniri','created_at' => now()],
            ['prenom' => 'siham', 'nom' => 'el mouden','created_at' => now()],
            ['prenom' => 'khawla', 'nom' => 'khibri','created_at' => now()],
            ['prenom' => 'saad', 'nom' => 'afkir','created_at' => now()],
            ['prenom' => 'akram', 'nom' => 'blial','created_at' => now()],
            ['prenom' => 'safia', 'nom' => 'el fekak','created_at' => now()],
            ['prenom' => 'chorouk', 'nom' => 'khatabi','created_at' => now()],
            ['prenom' => 'yassir', 'nom' => 'guartaoui','created_at' => now()],
            ['prenom' => 'amine', 'nom' => 'goubraim','created_at' => now()],
            ['prenom' => 'Benomar', 'nom' => 'wijdane','created_at' => now()],
            ['prenom' => 'Sofia', 'nom' => 'al attrasi','created_at' => now()],
            ['prenom' => 'abdelali', 'nom' => 'agrou','created_at' => now()],
            ['prenom' => 'hamza', 'nom' => 'aboumlik','created_at' => now()],
            ['prenom' => 'Najoua', 'nom' => 'arabi','created_at' => now()],
            ['prenom' => 'kaouter', 'nom' => 'elbouhiri','created_at' => now()],
            ['prenom' => 'aya', 'nom' => 'el mouslih','created_at' => now()],
            ['prenom' => 'salma', 'nom' => 'ezzorouti','created_at' => now()],
            ['prenom' => 'Ahmed Boumehraze', 'nom' => 'Benabdellah','created_at' => now()],
            ['prenom' => 'Haitham', 'nom' => 'El younssi','created_at' => now()],
            ['prenom' => 'zakariae', 'nom' => 'bakkari','created_at' => now()],
            ['prenom' => 'adam', 'nom' => 'el aouni','created_at' => now()],
            ['prenom' => 'Khawla', 'nom' => 'Abarane','created_at' => now()],
            ['prenom' => 'ilyass', 'nom' => 'el harrak','created_at' => now()],
            ['prenom' => 'salah', 'nom' => 'el hachimi','created_at' => now()],
            ['prenom' => 'taha', 'nom' => 'bargaoui','created_at' => now()],
            ['prenom' => 'Meryem', 'nom' => 'elaaraby','created_at' => now()],
            ['prenom' => 'wissal', 'nom' => 'ait nacer','created_at' => now()],
        ];

        // Insert each client
        foreach ($clients as $client) {
            DB::table('clients')->insert($client);
        }
    }

}
