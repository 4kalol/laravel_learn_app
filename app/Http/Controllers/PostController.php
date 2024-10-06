<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        // ->with('posts', $posts)でも渡せる
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = new Post();
        $result = $post->createPost($request->all());

        if ($request->hasFile('image')) {
            $postImageController = new PostImageController();
            $postImageController->store($request, $result->id);
        }

        return redirect()->route('posts.index');
    }

    // // 通常のSQLを使用するケース
    // public function indexNormalSql()
    // {
    //     return Post::getPostsWithNormalSql();
    // }

    // public function createPostWithNormalSql(Request $request)
    // {
    //     $dummy = (object) [
    //         'user_id' => 1,
    //         'title' => 'normal sql test title',
    //         'body' => 'normal sql test body'
    //     ];
    //     return Post::createPostWithNormalSql($dummy);
    // }

    // public function updatePostWithNormalSql(Request $request)
    // {
    //     $dummy = (object) [
    //         'id' => 9,
    //         'title' => 'normal sql test title updated',
    //         'body' => 'normal sql test body updated'
    //     ];
    //     return Post::updatePostWithNormalSql($dummy);
    // }

    // public function deletePostWithNormalSql(Request $request)
    // {
    //     $dummy = (object) [
    //         'id' => 9,
    //     ];
    //     return Post::deletePostWithNormalSql($dummy);
    // }

    // // クエリビルダを使用するケース
    // public function getPostsWithQueryBuilder()
    // {
    //     return Post::getPostsWithQueryBuilder();
    // }
    // public function createPostWithQueryBuilder(Request $request)
    // {
    //     $dummy = (object) [
    //         'user_id' => 1,
    //         'title' => 'query builder test title',
    //         'body' => 'query builder test body'
    //     ];
    //     return Post::createPostWithQueryBuilder($dummy);
    // }
    // public function updatePostWithQueryBuilder(Request $request)
    // {
    //     $dummy = (object) [
    //         'id' => 9,
    //         'title' => 'query builder test title updated',
    //         'body' => 'query builder test body updated'
    //     ];
    //     return Post::updatePostWithQueryBuilder($dummy);
    // }
    // public function getPostAndUserWithQueryBuilder()
    // {
    //     return Post::getPostAndUserWithQueryBuilder();
    // }
    // public function getPostWithQueryBuilderBySubQuery()
    // {
    //     return Post::getPostWithQueryBuilderBySubQuery();
    // }

    // // Eloquentを使用するケース
    // public function getPostsWithEloquent()
    // {
    //     return Post::getPostsWithEloquent();
    // }
    // public function getPostsWithEloquentById()
    // {
    //     $id = 1;
    //     return Post::getPostsWithEloquentById($id);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     return Post::createPost($request);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Post $post)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Post $post)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Post $post)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Post $post)
    // {
    //     //
    // }
}
