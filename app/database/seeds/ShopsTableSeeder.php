<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'name'=>'coffeeshop',
            'address'=>'東京都渋谷区神宮前xxx',
            'comment'=>'美味しいコーヒーショップ',
            'image'=>storage_path('app/public/images/coffee.png'),
            'user_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
