<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Categories;
use App\User;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'name' => 'બારસાખ',
            ],
            [
                'name' => 'ટાંકી',
            ],
            [
                'name' => 'બારી - બ્રાઈટ',
            ],
            [
                'name' => 'સુમો - બારી',
            ],
            [
                'name' => 'સનેડો - બારી',
            ],
            [
                'name' => '૧| ફુટ ના પત્થર',
            ],
            [
                'name' => '૧|| ફુટ ના પત્થર',
            ],
            [
                'name' => '૨ ફુટ ના પત્થર',
            ],
            [
                'name' => 'બેલાખા - બાકડા',
            ],
            [
                'name' => 'પ્રેસ ના ફ્રેન્સીંગ',
            ],
            [
                'name' => 'સાદા ફ્રેન્સીંગ',
            ],
            [
                'name' => 'બીમ',
            ],
            [
                'name' => 'પથર ફુટ',
            ],
            [
                'name' => 'બારી ફુટ',
            ],
            [
                'name' => 'ડ્રેગન પોલ',
            ],
            [
                'name' => 'કુંન્ડા',
            ],
            [
                'name' => 'ફેન્સીગ  પોલ',
            ],
            [
                'name' => 'જીએબી ફેન્સીગ  પોલ',
            ],
            [
                'name' => 'કરબીન ડીવાઇડર',
            ],
            [
                'name' => 'RCC',
              
            ],
            [
                'name' => 'રોડ સ્ટોન ખૂતા',
            ],
        ];

        foreach ($categories as $categoryData) {
            Categories::create([
                'user_id' => User::first()->id,
                'name' => $categoryData['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
} 