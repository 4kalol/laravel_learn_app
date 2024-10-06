<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    public function store(Request $request, int $postId)
    {
        $request->validate([
            'image.*' => 'required|file|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        $post = Post::findOrFail($postId);

        $postImage = new PostImage();

        $image = $request->file('image');
        $postImage->saveImage($image, $postId);

        return redirect()->route('posts.index');
    }
}
