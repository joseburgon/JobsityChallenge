<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\TweetStoreRequest;
use App\Http\Requests\TweetUpdateRequest;

use App\Tweet;
use Twitter;

class TweetController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Something
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(TweetUpdateRequest $request, $id_str)
    {
        $tweet = Tweet::where('id_str', $id_str)->first();
        $tweet->fill(['hidden' => $request->hidden, 'class' => $request->class])->save();

        return response()->json(['success'=>'Tweet updated']);
    }

    public function store(TweetStoreRequest $request)
    {
        $tweet = Tweet::create($request->all());

        return response()->json(['success'=>'Tweet stored']);
    }

    public function loadTweets($user, $twitter_username)
    {
        $tweets = Twitter::getUserTimeline(['screen_name' => $twitter_username, 'count' => 5]);

        foreach ($tweets as $tweet)
        {
            if (!Tweet::find($tweet->id_str))
            {
                Tweet::create([
                    'id_str' => $tweet->id_str,
                    'internal_user_id' => $user->id,
                    'profile_image_url' => $tweet->user->profile_image_url,
                    'text' => $tweet->text,
                    'user_name' => $tweet->user->name,
                    'screen_name' => $tweet->user->screen_name,
                    'hidden' => false,
                    'created_at' => $tweet->created_at
                ]);
            }
        }
    }

    // 1. Edita el modelo (base de datos) de los tweets para que tengan todos los campos necesarios a mostrar.
    // 2. crea un metodo que cargue los tweets del usuario.
    // 3. ahora lo que voy a mandar a la vista son los tweets almecenados en mi base de datos.
}
 