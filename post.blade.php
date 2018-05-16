@extends("layout")


@section("links")
    @foreach($obj as $res)
        <li><a href="/posts/{{$res->id}}">{{$res->name}}</a></li>
    @endforeach
@endsection


@section("body")
   
        <h1>{{$post->title}}</h1>
        <p>{{$post->body}}</p>
        <img src="asset({{$post->image}})" alt="">
        @foreach($comments as $comment)
        <h6><b>{{$comment->user_name}}</b> пишет:</h6>
        <p>{{$comment->comment_body}}</p>
        <p>{{$comment->created_at->diffForHumans()}}</p>
        @endforeach
        <span style="font-size:20px">Оставить комментарий:</span>
        <form action="/comment/{{$post->id}}" method="post">
           @csrf
            <input type="text" name="user_name">
            <input type="text" name="comment_body">
            <button class="btn">Комментировать</button>
        </form>

@endsection