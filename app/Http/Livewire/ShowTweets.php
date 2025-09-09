<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{

    public $message = 'Hello, World!';
    public $text = '';
    public $count = 0;

    public function render()
    {
        $this->count = $this->count + 1;
        return view('livewire.show-tweets');
    }

    public function mount(){
        $this->text = 'Texto inicial';


    }

     public function save(){


    }
}
