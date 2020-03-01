<div style="width: 100%">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
<div class="form-group">
    <input type="text" class="form-control " placeholder="Vyhľadaj článok" wire:model="searchTerm" />
    {{ csrf_field() }}
</div>



    <div class="d-flex flex-row flex-wrap align-content-center" >
        @if (count($posts) > 0)
            @foreach ($posts as $post)

            <a href="/posts/{{$post->slug}}" class="post-redirect">
                <div class="card ml-2 mb-2 article" style="width: 15rem;">
                    <img style=" width: 100%;" src="/storage/cover_images/{{$post->cover_image}}" class="card-img-top" alt="Obrázok článku">
                </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}} </h5>
                        @if ($post->post_description)
                            <p class="card-text">{{$post->post_description}}</p>
                            <p>autor ‣ <a href="/users/{{$post->user->id}}">{{$post->user_name}}</a></p>
                        @else
                            <p class="card-text">Napísané {{$post->created_at}} autor ‣ <a href="/users/{{$post->user->name}}">{{$post->user_name}}</a></p>
                            <a href="/posts/{{$post->slug}}" class="btn btn-info">Prečítať</a>

                        @endif
                    </div>

                </div>


            @endforeach


    </div>
</div>
<div class="ml-3">
    {{$posts->links()}}
</div>
@else
    <h3 class="display-4">Nič som nenašiel :(</h3>

    @endif

</div>
