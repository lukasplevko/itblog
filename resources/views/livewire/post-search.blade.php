<div style="width: 100%">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
<div class="form-group">
    <input type="text" class="form-control " placeholder="Vyhľadaj článok" wire:model="searchTerm" />
    {{ csrf_field() }}
</div>



    <div class="d-flex flex-row flex-wrap align-content-center" >
        @if (count($posts) > 0)
            @foreach ($posts as $post)


                <div class="card ml-2 mb-2" style="width: 15rem;">
                    <img style=" width: 100%;" src="/storage/cover_images/{{$post->cover_image}}" class="card-img-top" alt="Obrázok článku">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}} </h5>
                        @if ($post->post_description)
                            <p class="card-text">{{$post->post_description}}</p>
                            <p>autor ‣ <a href="/users/{{$post->user->id}}">{{$post->user_name}}</a></p>
                        @else
                            <p class="card-text">Napísané {{$post->created_at}} autor ‣ <a href="/users/{{$post->user->id}}">{{$post->user_name}}</a></p>

                    @endif

                    <a href="/posts/{{$post->id}}" class="btn btn-primary">Prečítať článok</a>
                    </div>
                </div>

            @endforeach

    </div>
</div>
@else
    <p>No posts found...</p>

    @endif

</div>
