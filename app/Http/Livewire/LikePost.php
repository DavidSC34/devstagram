<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked; //--< propiedad reactiva
    public $likes;//--< propiedad reactiva para contar numero de likes

    public function mount($post)
    {
        $this->isLiked = $post->checkLike(auth()->user() );//-> al momento de cargar el componente carga el valor booleano de esta propiedad reactiva
        $this->likes =   $post->likes->count();
    }

    public function like()
    {
        // return "dessde la fn dce like";
        if( $this->post->checkLike(auth()->user() )){
            $this->post->likes()->where('post_id',$this->post->id)->delete();//post->likes() del modelo de post usa eloquent para verificar
            $this->isLiked = false;
            $this->likes--;
        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
