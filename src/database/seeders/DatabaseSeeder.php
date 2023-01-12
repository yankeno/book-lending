<?php

namespace Database\Seeders;

use App\Models\AuthorBook;
use App\Models\Book;
use App\Models\Rental;
use App\Models\Review;
use App\Models\User;
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
        $this->call([
            UserSeeder::class,
            PublisherSeeder::class,
            ParentCategorySeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            AuthorBookSeeder::class,
            AdminSeeder::class,
            RentalSeeder::class,
        ]);
        User::factory(98)->create();
        Book::factory(97)->create();
        AuthorBook::factory(100)->create();
        Review::factory(1000)->create();
        Rental::factory(1000)->create();
    }
}
