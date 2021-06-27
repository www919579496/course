<?php

use Illuminate\Database\Seeder;
use App\Models\Farmer_product;
class Farmer_productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farmer_product::truncate();  // 先清理表数据
        factory(Farmer_product::class, 20)->create();  // 一次填充20篇文章
    }
}
