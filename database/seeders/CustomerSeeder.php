<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Customers;
use App\User;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the first user or create one if none exists
        $user = User::first();
        
        if (!$user) {
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        $customers = [
            [
                'name' => 'John Doe',
                'mobile_no' => '9876543210',
                'gst_no' => 'GST123456789',
                'city' => 'Mumbai',
                'address' => '123 Main Street, Mumbai, Maharashtra',
            ],
            [
                'name' => 'Jane Smith',
                'mobile_no' => '8765432109',
                'gst_no' => 'GST987654321',
                'city' => 'Delhi',
                'address' => '456 Park Avenue, Delhi, NCR',
            ],
            [
                'name' => 'Bob Johnson',
                'mobile_no' => '7654321098',
                'gst_no' => null,
                'city' => 'Bangalore',
                'address' => '789 Tech Park, Bangalore, Karnataka',
            ],
            [
                'name' => 'Alice Brown',
                'mobile_no' => '6543210987',
                'gst_no' => 'GST456789123',
                'city' => 'Chennai',
                'address' => '321 Marina Beach Road, Chennai, Tamil Nadu',
            ],
            [
                'name' => 'Charlie Wilson',
                'mobile_no' => '5432109876',
                'gst_no' => null,
                'city' => 'Kolkata',
                'address' => '654 Howrah Bridge Road, Kolkata, West Bengal',
            ],
        ];

        foreach ($customers as $customerData) {
            Customers::create([
                'user_id' => $user->id,
                'name' => $customerData['name'],
                'mobile_no' => $customerData['mobile_no'],
                'gst_no' => $customerData['gst_no'],
                'city' => $customerData['city'],
                'address' => $customerData['address'],
            ]);
        }
    }
} 