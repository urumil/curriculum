<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ConsumersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('consumers')->insert([
            'name' => '山田太郎',
            'email' => 'test@test.co.jp',
            'password' => 'test',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
