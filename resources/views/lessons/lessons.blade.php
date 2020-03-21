@extends('layout.app')
@section('content')
<h1 class="display-1 ml-5">{{ucfirst($lesson)}}</h1>
<a href="/lessons" class="previous"><i class="fas fa-arrow-circle-left"></i>Kurzy</a>
<div class="ml-5 mt-5">
    @foreach ($lessons as $i=>$item)
    <div class="jumbotron jumbotron-fluid shadow p-3 mb-5 bg-white rounded">
        <div class="container">
            <h4><a href="/lessons/kurz/{{$item->slug}}">{{$i+1}}. {{$item->title}}</a></h4>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            {!! Form::open(['action'=> ['UsersController@saveProgress', $item->id, 'method'=> 'POST']]) !!}

            <div class="box">
            <input name="progress" id="{{$item->id}}" class="checkbox" type="checkbox" onChange="this.form.submit()" value="{{$item->id}}">
                <span class="check"></span>
            <input type="number" name="lesson_id"  value="{{$item->id}}" readonly hidden>
            <input type="text" name="lesson" value="{{$lesson}}" readonly hidden>
            <label for="{{$item->id}}">Hotovo</label>
        </div>
            {!! Form::close() !!}
        </div>
      </div>
    @endforeach
</div>
<script>
    let checkboxes = document.querySelectorAll('.checkbox');
    checkArr = Array.from(checkboxes);
    let progress = {!! json_encode($progress->toArray()) !!}
    const user_id = {!!json_encode(auth()->user()->id)!!}
    let lesson = {!!json_encode($lesson)!!}
    console.log({progress})
    for(let i = 0; i<progress.length; i++){
        for(let j = 0; j<checkArr.length; j++){
            if(progress[i].lesson_id == checkArr[j].value){
                checkArr[j].checked = true;
            }
        }
    }
</script>
@endsection
