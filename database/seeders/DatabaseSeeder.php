<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Felix',
            'email' => 'felixsaver@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Vincentianus',
            'email' => 'vincentianus@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'name' => 'Web-Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::create([
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quisquam numquam animi odio nam dicta voluptatibus mollitia iusto. Praesentium dolore iste explicabo nesciunt quibusdam ipsa consectetur.',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur soluta exercitationem ad, ipsum fugit libero animi vitae! Architecto corrupti, ad expedita odit cum corporis dicta, itaque assumenda quas iure dolor?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat quia cum provident illum, voluptas aliquam vel unde voluptates nisi facere.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, dolorum! Quisquam, sequi natus fugiat illum a nesciunt aperiam, eius consectetur temporibus nostrum magni fugit impedit architecto eaque. Nisi sapiente repudiandae, beatae, esse exercitationem cumque officia natus placeat eius suscipit hic.</p>',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quisquam numquam animi odio nam dicta voluptatibus mollitia iusto. Praesentium dolore iste explicabo nesciunt quibusdam ipsa consectetur.',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur soluta exercitationem ad, ipsum fugit libero animi vitae! Architecto corrupti, ad expedita odit cum corporis dicta, itaque assumenda quas iure dolor?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat quia cum provident illum, voluptas aliquam vel unde voluptates nisi facere.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, dolorum! Quisquam, sequi natus fugiat illum a nesciunt aperiam, eius consectetur temporibus nostrum magni fugit impedit architecto eaque. Nisi sapiente repudiandae, beatae, esse exercitationem cumque officia natus placeat eius suscipit hic.</p>',
            'category_id' => 1,
            'user_id' => 2
        ]);

        Post::create([
            'title' => 'Judul Ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quisquam numquam animi odio nam dicta voluptatibus mollitia iusto. Praesentium dolore iste explicabo nesciunt quibusdam ipsa consectetur.',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur soluta exercitationem ad, ipsum fugit libero animi vitae! Architecto corrupti, ad expedita odit cum corporis dicta, itaque assumenda quas iure dolor?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat quia cum provident illum, voluptas aliquam vel unde voluptates nisi facere.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, dolorum! Quisquam, sequi natus fugiat illum a nesciunt aperiam, eius consectetur temporibus nostrum magni fugit impedit architecto eaque. Nisi sapiente repudiandae, beatae, esse exercitationem cumque officia natus placeat eius suscipit hic.</p>',
            'category_id' => 1,
            'user_id' => 2
        ]);
    }
}
