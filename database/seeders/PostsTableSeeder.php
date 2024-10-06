<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::insert([
            'user_id' => 1,
            'title' => 'Hello World',
            'body' => 'This is my first post',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
