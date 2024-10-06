<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function createPost($data)
    {
        $data = (object) $data;
        $user_id = 1;
        $post = new Post();
        $post->user_id = $user_id;
        $post->title = $data->title;
        $post->body = $data->body;
        $post->save();
        return $post;
    }

    // public static function createPost($data)
    // {
    //     $post = new Post();
    //     $post->title = $data->title;
    //     $post->content = $data->content;
    //     $post->save();
    //     return $post;
    // }

    // // 通常のSQLを使用するケース
    // public static function getPostsWithNormalSql()
    // {
    //     $posts = DB::select('SELECT * FROM posts');
    //     return $posts;
    // }
    // public static function createPostWithNormalSql($data)
    // {
    //     $post = DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)', [1, $data->title, $data->body]);
    //     return $post;
    // }
    // public static function updatePostWithNormalSql($data)
    // {
    //     $post = DB::update('UPDATE posts SET title = ?, body = ?, updated_at = ? WHERE id = ?', [$data->title, $data->body, now(), $data->id]);
    //     return $post;
    // }
    // public static function deletePostWithNormalSql($data)
    // {
    //     $post = DB::delete('DELETE FROM posts WHERE id = ?', [$data->id]);
    //     return $post;
    // }

    // // クエリビルダを使用するケース
    // public static function getPostsWithQueryBuilder()
    // {
    //     $posts = DB::table('posts')->where('user_id', 1)->get();
    //     // dd($posts);
    //     return $posts;
    // }
    // public static function createPostWithQueryBuilder($data)
    // {
    //     $post = DB::table('posts')->insert([
    //         'user_id' => 1,
    //         'title' => $data->title,
    //         'body' => $data->body,
    //     ]);
    //     return $post;
    // }
    // public static function updatePostWithQueryBuilder($data)
    // {
    //     $post = DB::table('posts')->where('id', $data->id)->update([
    //         'title' => $data->title,
    //         'body' => $data->body,
    //     ]);
    //     return $post;
    // }
    // public static function getPostAndUserWithQueryBuilder()
    // {
    //     $posts = DB::table('posts')
    //         ->join('users', 'posts.user_id', '=', 'users.id')
    //         ->select('posts.*', 'users.name')
    //         ->get();
    //     // dd($posts);
    //     return $posts;
    // }
    // public static function getPostWithQueryBuilderBySubQuery()
    // {
    //     $subQuery = DB::table('posts')->select(DB::raw('Max(id)'))->groupBy('user_id');
    //     $posts = DB::table('posts')
    //         ->whereIn('id', $subQuery)
    //         ->get();
    //     // dd($posts);
    //     return $posts;
    // }

    // // Eloquentを使用するケース
    // public static function getPostsWithEloquent()
    // {
    //     $posts = Post::where('user_id', 1)->get();
    //     // dd($posts);
    //     return $posts;
    // }
    // public static function getPostsWithEloquentById($id)
    // {
    //     $post = Post::find($id);
    //     dd($post->tags);
    //     return $post;
    // }


    // public static function createBulkPostWithQueryBuilder()
    // {
    //     DB::transaction(function () {
    //         DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)', [1, 'title1', 'body1']);
    //         DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)', [1, 'title2', 'body2']);
    //         DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)', [1, 'title3', 'body3']);
    //         DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)', [1, 'title4', 'body4']);
    //         DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)', [1, 'title5', 'body5']);
    //     });
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
