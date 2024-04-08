<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sales')->insert([
            'name' => 'カバン',
            'price' => 1000,
            'comment' => 'テスト１',
            'picture' => 1,
            'quality' => 1,
            'del_flg' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
