@extends('layout.app')
@section('content')
<a href="{{url()->previous()}}" class="btn btn-secondary mb-3">Back</a>


    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-8 col-md-6">
                    <h3 class="mb-0 text-truncated">{{$user->name}}</h3>

                        <p class="mt-1">
                            {{$user->user_descript}}
                        </p>
                        <p>
                        <p class="card-text"><small class="text-muted">Naposledy aktualizované {{date('d.m.Y H:i', strtotime($user->updated_at))}} </small></p>

                        </p>
                        <p> <span class="badge badge-info tags">Autor</span>
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6 text-center">
                    <img src="/storage/profile_pics/{{$user->profile_pic}}" alt="" class="mx-auto rounded-circle img-fluid">
                        <br>
                        <ul class="list-inline ratings text-center" title="Ratings">
                            <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-4">
                    <p>Počet článkov: {{count($user_posts)}}</p>


                    </div>

                    </div>
                    <!--/col-->
                </div>
                <!--/row-->
            </div>
            <!--/card-block-->
        </div>



<div class="d-flex flex-row flex-wrap align-content-center mt-3">


    @if (count($user_posts) > 0)
    @foreach ($user_posts as $post)

    <a href="/posts/{{$post->slug}}" class="post-redirect">
        <div class="card ml-2 mb-2 article" style="width: 15rem;">
            <img style=" width: 100%;" src="/storage/cover_images/{{$post->cover_image}}" class="card-img-top" alt="Obrázok článku">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}} </h5>
                @if ($post->post_description)
                    <p class="card-text">{{$post->post_description}}</p>
                    <p>autor ‣ <a href="/users/{{$post->user->id}}">{{$post->user_name}}</a></p>
                @else
                    <p class="card-text">Napísané {{$post->created_at}} autor ‣ <a href="/users/{{$post->user->name}}">{{$post->user_name}}</a></p>

            @endif
            </div>
          </div>

    @endforeach
@else
</div>
<p>No posts found...</p>
</div>
@endif

@endsection
