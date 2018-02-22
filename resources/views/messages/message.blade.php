<img class="img-thumbnail" src="{{$message->image}}" alt="">
<p class="card-text">
    <div class="text-muted"> 
        Escrito por <a href="/{{$message->user->username}}">{{ $message->user->name }} </a> 
    </div>
    <div class="card-text text-muted">
            {{$message->created_at}}
    </div>
    {{$message->content}}
    @if (!isset($no_more))
        <a href="/messages/{{$message->id}}">Leer más...</a>        
    @endif
</p>
    