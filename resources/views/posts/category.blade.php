@extends('layout.app')
@section('content')
@if (!empty($posts))

    <h1 class="display-3">

   </h1>
<div class="ml-auto">
<div class="row">

        @foreach ($posts as $post)

        <a href="/posts/{{$post->slug}}" class="post-redirect">
            <div class="card ml-2 mb-2" style="width: 15rem;">
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
<h3>Nič som nenašiel</h3>


</div>
@endif
@endsection

