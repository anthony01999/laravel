<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;
    protected $model1 = Category::class;
    protected $model2 = Product::class;
    protected $model3 = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>$faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'verified'=>$verified=$faker->randomElement([User::VERIFIED_USER, User::UNVERIFIED_USER]),
            'verification_token'=>$verified == User::VERIFIED_USER ? null : User::generateVerificationCode(),
            'admin'=>$verified=$faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),
        ];
    }

    //for category
    public function definition1()
    {
        return [
            'name' => $faker->word,
            'description' => $faker->paragraph(1),
        ];
    }

    
    //for product
    public function definition2()
    {
        return [
            'name' => $faker->word,
            'description' => $faker->paragraph(1),
            'quantity'=>$faker->numberBetween(1,10),
            'status'=> $faker->randomElement([Product::AVAILABLE_PRODUCT, Product::UNAVAILABLE_PRODUCT]),
            'image'=> $faker->randomElement(['1.jpg', '2.jpg', '3.jpg']),
            'seller_id'=>$faker->User::all()->random()->id,
        ];
    }

    //for transaction
    public function definition3()
    {
        $seller=Seller::has('products')->get()->random();
        $buyer=User::all()->except($seller->id)->random();
        return [
            'quantity'=>$faker->numberBetween(1,3),
            'buyer_id'=>$buyer->id,
            'product_id'=>$seller->products->random()->id,
        ];
    }



    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
