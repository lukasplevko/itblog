@extends('layout.app')

@section('content')
    <h1 class="h1">Uverejnené články</h1>
    <div class="d-flex flex-row flex-wrap align-content-center">


    @if (count($posts) > 0)
        @foreach ($posts as $post)


            <div class="card ml-2 mb-2" style="width: 15rem;">
                <img style=" width: 100%;" src="/storage/cover_images/{{$post->cover_image}}" class="card-img-top" alt="Obrázok článku">
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}} </h5>
                  @if ($post->post_description)
                    <p class="card-text">{{$post->post_description}}</p>
                  @else
                <p class="card-text">Napísané {{$post->created_at}} autorom ‣ {{$post->user->name}}</p>

                  @endif

                  <a href="/posts/{{$post->id}}" class="btn btn-primary">Prečítať článok</a>
                </div>
              </div>

        @endforeach
    @else
</div>
    <p>No posts found...</p>

    @endif
@endsection
