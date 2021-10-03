<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Product::truncate();
        Category::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $usersQuantity=200;
        $categoriesQuantity=30;
        $productsQuantity=1000;
        $transactionsQuantity=1000;

        factory(User::class, $usersQuantity)->create();
        factory(Product::class, $productsQuantity)->create()->each(
            function ($product){
                $categories=category::all()->random(mt_rand(1,5))->pluck('id');
                $product->categories()->attach($categories);
            }
        );
        factory(Category::class, $categoriesQuantity)->create();
        factory(Transaction::class, $transactionsQuantity)->create();

    }
}
