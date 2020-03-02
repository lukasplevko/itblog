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
                <a class="latest" href="/posts/{{$latest->slug}}">
                    <div class="card mb-3 mt-2">
                    <img class="card-img-top" src="/storage/cover_images/{{$latest->cover_image}}" alt="Card image cap">

                        <div class="card-body">
                        <h5 class="card-title">{{$latest->title}}</h5>
                        <p class="card-text text-dark">{{$latest->post_descript}}</p>
                        <p class="card-text text-dark"><small class="text-muted">Napísané: {{$latest->created_at}}</small></p>
                        </div>
                    </div>
                </a>
                  @else
                  <p>Nič sme nenašli</p>
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




            <section class="row container">
            <div class="shadow-pop-br">
                <a href="/posts/category/css" class="post-redirect ">
                    <div class="card ml-2 mb-2 article" style="width: 15rem;">
                        <img style=" width: 100%;" src="/storage/cover_images/css.png" class="card-img-top" alt="Obrázok článku">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title">CSS </h5>
                                <p class="card-text">Tipy a triky v CSS</p>
                        </div>

                    </div>
            </div>

            <div class="shadow-pop-br">
                <a href="/posts/category/laravel" class="post-redirect ">
                    <div class="card ml-2 mb-2 article" style="width: 15rem;">
                        <img style=" width: 100%;" src="/storage/cover_images/laravel.png" class="card-img-top" alt="Obrázok článku">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title">Laravel </h5>
                                <p class="card-text">Všetko o Laraveli</p>
                        </div>

                    </div>
            </div>

            <div class="shadow-pop-br">
                <a href="/posts/category/javascript" class="post-redirect ">
                    <div class="card ml-2 mb-2 article" style="width: 15rem;">
                        <img style=" width: 100%;" src="/storage/cover_images/js.png" class="card-img-top" alt="Obrázok článku">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title">Javascript </h5>
                                <p class="card-text">Javascript basics</p>
                        </div>

                    </div>
            </div>

            <div class="shadow-pop-br">
                <a href="/posts/category/code_blog" class="post-redirect ">
                    <div class="card ml-2 mb-2 article" style="width: 15rem;">
                        <img style=" width: 100%;" src="/storage/cover_images/code.png" class="card-img-top" alt="Obrázok článku">
                    </a>
                        <div class="card-body">
                            <h5 class="card-title">Code_blog; </h5>
                                <p class="card-text">Novinky v tech</p>
                        </div>

                    </div>
            </div>
            </section>
            <hr>
            <div class="section-heading mb-5 mt-5">
                <h2 class="display-2 ">Články</h2>
            </div>
            <section class="articles mt-5 row">

                <div class="col-lg-8">
                @if (!empty($posts))
                @foreach ($posts as $post)
                <a href="/posts/{{$post->slug}}">
                <div class="card mb-3 slide" style="max-width: 540px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                      <img src="storage/cover_images/{{$post->cover_image}}" class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body text-dark">
                        <h5 class="card-title">{{$post->title}}</h5>
                        @if ($post->post_descript)
                        <p class="card-text">{{$post->post_descript}}</p>
                        @endif

                        <p class="card-text"><small class="text-muted">{{$post->created_at}}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                @endforeach
                @else
                <h3>Doteraz nikto nepublikoval žiaden článok</h3>
                @endif
            </div>
            <div class="col-lg-4 ">
                <h5>Aktuálne rozoberáme</h5>
                @if (!empty($bests))
                @foreach ($bests as $item)
            <a href="/posts/{{$item->slug}}">
                <div class="card bg-dark text-white mb-5">
                <img class="card-img" src="/storage/cover_images/{{$item->cover_image}}" alt="Card image">
                    <div class="card-img-overlay bg-title">
                      <p class="card-title ">{{$item->title}}</p>
                    </div>
                  </div>
                </a>
                @endforeach
                @endif

            </div>

            </section>




@endsection
