<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{

    use WithPagination;

    public $content = 'Apenas um teste';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];


    public function render()
    {
        // $this->count = $this->count + 1;

        $tweets = Tweet::with('user')->latest()->paginate(10);
        return view('livewire.show-tweets', ['tweets' => $tweets]);
    }


    public function create()
    {
        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
    }

    public function like($idTweet)
    {
        $tweet = Tweet::find($idTweet);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

     public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }

    public function delete(Tweet $tweet)
    {
        // $tweet = Tweet::where('id', '=', $tweetId)->first();
        // $tweet = Tweet::find($tweetId);
        // $like = Like::where('tweet_id', $tweetId)->where('user_id',auth()->user()->id) ->get();
        // dd($tweet, $like);
        $tweet->likes()->delete();
        $tweet->delete();
    }
}
