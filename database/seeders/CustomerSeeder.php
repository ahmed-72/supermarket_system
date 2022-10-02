<?php

namespace Database\Seeders;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer=Customer::create([ 
            'name' => 'ahmed',
            'email' => 'customer@gmail.com',
            'phone' => '00970592659887',
            'dob' => Carbon::parse('2000-01-01'),
            'avatar'=>'uploads/avatar.png'
        ]);
    }
}
