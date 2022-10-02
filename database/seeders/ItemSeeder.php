<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([ 
            'name' => 'shirt',
            'barcode' => '00000000',
            'category_id' => '1',
            'image' => 'uploads/item.png',
            'price' => '100',
            'quantity' => '10',
            'outOfStockSelling' => 0,
        ]);
    }
}
