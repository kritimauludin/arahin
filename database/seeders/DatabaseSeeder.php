<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryAds;
use App\Models\Post;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'kriti',
        //     'username' => 'kriti',
        //     'email' => 'kritimauludin@gmail.com',
        //     'password' => bcrypt('121'),
        //     'role_id' => 1
        // ]);

        // User::factory(10)->create();

        // CategoryAds::create([
        //     'category_name' => 'Top Home 720px',
        //     'status' => 1
        // ]);

        // CategoryAds::create([
        //     'category_name' => 'Mid Home 720px',
        //     'status' => 1
        // ]);

        // CategoryAds::create([
        //     'category_name' => 'Foot Home 720px',
        //     'status' => 1
        // ]);
        // CategoryAds::create([
        //     'category_name' => 'Left Home 263px',
        //     'status' => 1
        // ]);
        // CategoryAds::create([
        //     'category_name' => 'Foot Home 263px',
        //     'status' => 1
        // ]);
        CategoryAds::create([
            'category_name' => 'Ads page reader 289px * 422px',
            'status' => 1
        ]);

        // Category::create([
        //     'name' => 'Teknologi',
        //     'slug' => 'teknologi',
        //     'status' => 1,
        // ]);
        // Category::create([
        //     'name' => 'Cerita',
        //     'slug' => 'cerita',
        //     'status' => 1,
        // ]);
        // Category::create([
        //     'name' => 'Tugas',
        //     'slug' => 'tugas',
        //     'status' => 1,
        // ]);

        // Post::factory(30)->create();
        // Role::create([
        //     'name' => 'founder'
        // ]);
        // Role::create([
        //     'name' => 'author'
        // ]);
        // Role::create([
        //     'name' => 'user'
        // ]);
    }
}
