@extends("layout")


@section("links")
    @foreach($obj as $res)
        <li><a href="/posts/{{$res->id}}">{{$res->name}}</a></li>
    @endforeach
@endsection


@section("body")
    @foreach($posts as $post)

            <div class="col s12 m6">
              <div class="card">
                <div class="card-content">
                  <h1 class="card-title">{{$post->title}}</h1>
                  <p>{{str_limit($post->body, 200)}}</p>
                </div>
                <div class="card-action">
                    <a href="/post/{{$post->id}}">Читать продолжение...</a>
                </div>
              </div>
            </div>
    @endforeach
@endsection