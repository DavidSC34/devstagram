<div>
    @if($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-5">

        @foreach ($posts as $post)

        <div>
        <a href="{{ route('posts.show',['post' => $post, 'user' => $post->user])}}">
            <img src="{{asset('uploads').'/'. $post->imagen}}" alt="Imagen del posts {{$post->titulo}}">
        </a> 
        </div>
            
        @endforeach
    </div>   
    <div class="my-10">
    {{ $posts->links() }}    
    </div> 
        
    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold cursor-pointer">No hay posts aun no sigues a nadie</p>
    @endif
</div>