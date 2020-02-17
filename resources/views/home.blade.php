@extends('layout.app')
@section('content')





            <div class="row top-content">
              <div class="col-sm">
                <div class="timeline">
                    <h3>Chronológia</h3>
                    @if(!empty($posts_chron))
                       @foreach ($posts_chron as $post_chron)
                        <p>
                        <a class="timeline-links" href="/posts/{{$post_chron->slug}}">{{$post_chron->title}}</a><br>
                        <small>{{$post_chron->created_at}}</small>
                        </p>

                       @endforeach
                    @endif
                    <a class="btn mt-3 mb-3 btn-light" href="/posts">Ďalšie články</a>
                    </div>
              </div>
              <div class="col-sm latest">
                  <h3 class="display-4">Najnovší</h3>
                @isset($latest)

                <div class="card mb-3 mt-2">
                <img class="card-img-top" src="/storage/cover_images/{{$latest->cover_image}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$latest->title}}</h5>
                      <p class="card-text">{{$latest->post_descript}}</p>
                      <p class="card-text"><small class="text-muted">Napísané: {{$latest->created_at}}</small></p>
                    </div>
                  </div>
                  @else
                  <h1 class="display-4">Haló.... nope, tu sme skončili:(</h1>
                  @endisset


              </div>
              <div class="col-sm">
                <div class="timeline">
                    <h3>Najčítanejšie</h3>
                    @if(!empty($posts_chron))
                       @foreach ($posts_chron as $post_chron)
                        <p>
                        <a class="timeline-links" href="">{{$post_chron->title}}</a><br>
                        <small>{{$post_chron->created_at}}</small>
                        </p>

                       @endforeach
                    @endif
                    </div>
              </div>
            </div>
            <hr>

            <section class="articles">



                <h3 class="display-4 ml-3 ">Všeobecné články <a href="/posts/category/article" class="btn btn-sm btn-success">Čítať viac</a></h3>

                <div class="d-flex flex-row">
                    <div class=" p-2 col-8">
                        <div class="preview">
                            <a href="">
                            <img class="d-block w-100 " src="/storage/cover_images/{{$article->cover_image}}">
                            </a>

                        </div>
                    </div>
                    <div class="flex-column">
                        <div class="preview p-2">
                        <img class=" w-100 " src="/storage/cover_images/{{$article->cover_image}}">

                        </div>

                        <div class="preview p-2">
                            <img class=" w-100 " src="/storage/cover_images/{{$article->cover_image}}">

                        </div>
                    </div>

                </div>

                <hr class="mb-5">
                <h3 class="display-4 ml-3 ">#Návody Laravel <a href="/posts/category/laravel" class="btn btn-sm btn-success">Čítať viac</a></h3>

                <div class="d-flex flex-row">
                    <div class=" p-2 col-8">
                        <div class="preview">
                            <a href="">
                            <img class="d-block w-100 " src="/storage/cover_images/{{$article->cover_image}}">
                            </a>

                        </div>
                    </div>
                    <div class="flex-column">
                        <div class="preview p-2">
                        <img class=" w-100 " src="/storage/cover_images/{{$article->cover_image}}">

                        </div>

                        <div class="preview p-2">
                            <img class=" w-100 " src="/storage/cover_images/{{$article->cover_image}}">

                        </div>
                    </div>

                </div>

                <hr class="mb-5">
                <h3 class="display-4 ml-3 ">#Návody Javascript <a href="/posts/category/js" class="btn btn-sm btn-success">Čítať viac</a></h3>

                <div class="d-flex flex-row">
                    <div class=" p-2 col-8">
                        <div class="preview">
                            <a href="">
                            <img class="d-block w-100 " src="/storage/cover_images/{{$article->cover_image}}">
                            </a>

                        </div>
                    </div>
                    <div class="flex-column">
                        <div class="preview p-2">
                        <img class=" w-100 " src="/storage/cover_images/{{$article->cover_image}}">

                        </div>

                        <div class="preview p-2">
                            <img class=" w-100 " src="/storage/cover_images/{{$article->cover_image}}">

                        </div>
                    </div>

                </div>

                <hr class="mb-5">
                <h3 class="display-4 ml-3 ">#Návody CSS <a href="/posts/category/css" class="btn btn-sm btn-success">Čítať viac</a></h3>

                <div class="d-flex flex-row">
                    <div class=" p-2 col-8">
                        <div class="preview">
                            <a href="">
                            <img class="d-block w-100 " src="/storage/cover_images/{{$article->cover_image}}">
                            </a>

                        </div>
                    </div>
                    <div class="flex-column">
                        <div class="preview p-2">
                        <img class=" w-100 " src="/storage/cover_images/{{$article->cover_image}}">

                        </div>

                        <div class="preview p-2">
                            <img class=" w-100 " src="/storage/cover_images/{{$article->cover_image}}">

                        </div>
                    </div>

                </div>


        </section>




@endsection
