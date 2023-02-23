<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use App\Models\Publisher;
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
        User::factory(100)->create();
        Book::factory(1000)->create();
        Author::factory(100)->create();
        AuthorBook::factory(1000)->create();
        Review::factory(1000)->create();
        Rental::factory(1000)->create();
        Publisher::factory(1000)->create();
    }
}
