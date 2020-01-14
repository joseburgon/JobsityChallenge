<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twitter;
use Auth;

use App\Post;
use App\Category;
use App\User;
use App\Tweet;

class PageController extends Controller
{
    public function blog()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(4);

        return view('web.posts', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('web.post', compact('post'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->pluck('id')->first();
        $posts    = Post::where('category_id', $category)
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    public function tag($slug)
    {
        $posts    = Post::whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    public function user($user)
    {
        $user = User::find($user);
        $posts = Post::orderBy('id', 'DESC')
            ->where('status', 'PUBLISHED')
            ->where('user_id', $user->id)->paginate(3);

        try {
            $newTweets = Twitter::getUserTimeline(['screen_name' => $user->twitter_username, 'count' => 5]);
        } catch (Exception $e) {
            // dd(Twitter::error());
            dd(Twitter::logs());
        }

        if (count($newTweets)) {
            foreach ($newTweets as $tweet) {
                if (Tweet::where('id_str', $tweet->id_str)->count() < 1) {
                    Tweet::create([
                        'id_str' => $tweet->id_str,
                        'internal_user_id' => $user->id,
                        'profile_image_url' => $tweet->user->profile_image_url,
                        'text' => $tweet->text,
                        'user_name' => $tweet->user->name,
                        'screen_name' => $tweet->user->screen_name,
                        'created_at' => date('Y-m-d H:i:s', strtotime($tweet->created_at))
                    ]);
                }
            }
        }

        if (Auth::id() == $user->id) {
            $user->setAttribute('authUser', true);
            $tweets = Tweet::orderBy('created_at', 'DESC')
                ->where('internal_user_id', $user->id)->take(5)->get();
        } else {
            $user->setAttribute('authUser', false);
            $tweets = Tweet::orderBy('created_at', 'DESC')
                ->where('internal_user_id', $user->id)
                ->where('hidden', 0)->take(5)->get();
        }

        return view('web.user', compact('user', 'posts', 'tweets'));
    }
}
