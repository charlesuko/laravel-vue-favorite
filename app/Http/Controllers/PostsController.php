<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;

class PostsController extends Controller
{
    public function index()
		{
		    $posts = Post::paginate(5);

		    return view('posts.index', compact('posts'));
		}

		public function favoritePost(Post $post)
		{
		    Auth::user()->favorites()->attach($post->id);

		    return back();
		}

		/**
		 * Unfavorite a particular post
		 *
		 * @param  Post $post
		 * @return Response
		 */
		public function unFavoritePost(Post $post)
		{
		    Auth::user()->favorites()->detach($post->id);

		    return back();
		}

}
