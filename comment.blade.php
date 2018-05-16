@extends("layout")


@section("links")
    @foreach($obj as $res)
        <li><a href="/posts/{{$res->id}}">{{$res->name}}</a></li>
    @endforeach
@endsection


@section("body")
    @foreach($posts as $post)
        


    @endforeach
@endsection