@extends("layout")


@section("links")
    @foreach($obj as $res)
        <li><a href="/posts/{{$res->id}}">{{$res->name}}</a></li>
    @endforeach
@endsection


@section("body")
    <form action="/addpost" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title">
        <input type="text" name="body">
        <input type="file" name="image">
        <button class="btn">Запостить</button>
    </form>
@endsection