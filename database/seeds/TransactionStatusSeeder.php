<?php

use App\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TransactionStatus::insert([
            [
                'status_name' => 'Not Purchased'
            ],
            [
                'status_name' => 'Purchased'
            ]
            ]);
    }
}
