<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'user_id' => 1,
            'supplier_id' => 1,
            'approve_id' => 1,
            'manufacturer_id' => 1,
            'product_id' => 2,
            'status_id' => 1,
            'order_status_id' => 4,
            'invoice_number' => 'INV-3942347234',
            'quantity' => 5,
            'purchase_cost' => 20,
            'srp' => 20,
            'remarks' => 'Good idea',
            'expiry_date' => '2023-09-14',
            'manufacturing_date' => '2023-09-14',
        ]);
    }
}
