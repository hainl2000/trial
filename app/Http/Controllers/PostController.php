<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

use App\Transformers\PostTransformer;
use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Spatie\Fractal\Fractal;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::paginate(5);

        $listPosts = \fractal()->collection($posts)->transformWith(new PostTransformer())
            ->parseIncludes('user')
            ->paginateWith(new IlluminatePaginatorAdapter($posts))
            ->toArray();
        return \response()->json([
             $listPosts
        ],200);
    }
}
