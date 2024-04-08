<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('purchases')->insert([
            'good' => 'カバン',
            'name' => 'テスト1',
            'tel' => '08000000000',
            'postcard' => 'テスト1',
            'address' => 'テスト1',
            'sales_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
