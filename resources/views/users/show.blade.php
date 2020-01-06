@extends('layout.app')
@section('content')
<a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Back</a>

<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img style="width:100%"  src="/storage/profile_pics/{{$user->profile_pic}}" alt="">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$user->name}}</h5>
        <p class="card-text">{{$user->user_descript}}</p>
          <p class="card-text"><small class="text-muted">Naposledy aktualizované {{date('d.m.Y H:i', strtotime($user->updated_at))}}</small></p>
          @if (Auth::guest())
          <a href="/login" class="btn btn-info ">+</a>

          @else
          <a href="#" class="btn btn-info ">+</a>
          @endif
        </div>
      </div>
    </div>
  </div>





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
