@extends('layout.app')
@section('content')
<a href="/posts" class="btn btn-secondary mb-3">Back</a>
<h1>{{$user->name}} <a href="/posts" class="btn btn-info mb-3">Follow</a></h1>
<div class="d-flex flex-row flex-wrap align-content-center">
    @if (count($user_posts) > 0)
    @foreach ($user_posts as $post)


        <div class="card ml-2 mb-2" style="width: 15rem;">
            <img style=" width: 100%;" src="/storage/cover_images/{{$post->cover_image}}" class="card-img-top" alt="Obrázok článku">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}} </h5>
              @if ($post->post_description)
                <p class="card-text">{{$post->post_description}}</p>
                <p>autor ‣ {{$post->user->name}}</p>
              @else
            <p class="card-text">Napísané {{$post->created_at}} autor ‣ {{$post->user->name}}</p>

              @endif

              <a href="/posts/{{$post->id}}" class="btn btn-primary">Prečítať článok</a>
            </div>
          </div>

    @endforeach
@else
</div>
<p>No posts found...</p>
</div>
@endif




@endsection
