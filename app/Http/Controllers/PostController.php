<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

use App\Transformers\PostTransformers;
use Illuminate\Http\Request;
use Spatie\Fractal\Fractal;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::all();

        $data = \fractal()->collection($posts)->transformWith(new PostTransformers())->parseIncludes('user')->toArray();
        return \response()->json([
            'data' => $data
        ],200);
    }
}
