@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('message'))
        <div class="alert alert-sucess" style="color:rgb(158, 231, 129)"> 
            {{session('message')}} 
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10 espaco">
            <div class="card" >
                @if($image->user->image)
                    <div class="container-avatar" style="background:grey">
                            <img src="{{route('user.avatar' ,['filename'=>$image->user->image]  ) }}" class="avatar" />
                            {{ $image->user->name.' '.$image->user->surname}}
                            | Publicada  {{ \FormatTime::LongTimeFilter($image->created_at) }}
                    </div>
                    <div class="card-body" style="background:black">
                        <div class="image-container">
                            <img src="{{route('image.file',['filename' => $image->image_path])}}">
                        </div>
                    </div>
                    <div class="likes">
                            <?php 
                                $user_like = false;
                            ?>
                            @foreach($image->likes as $like)
                                @if($like->user->id == Auth::user()->id)
                                <?php 
                                    $user_like = true;
                                ?>
                                @endif
                            @endforeach
    
                            @if($user_like)
                                <img  class="img_dislike" src="{{asset('/img/heart-red.png')}}" data-id="{{$image->id}}"/>
                            @else
                                <img  class="img_like" src="{{asset('/img/heart-black.png')}}" data-id="{{$image->id}}"/>
                            @endif
                            {{count($image->likes)}} 
                            <a href="" class="btn btn-warning btn-comments">Comentários({{count($image->comments)}})</a>
                          
                        
                       <div class="comments">
                        <h2> Comentários({{count($image->comments)}}) </h2>
                        <hr> 
                        <form method="post" action="{{route('comment.store')}}">
                            @csrf
                            <input type="hidden" name="image_id" value="{{$image->id}}" />
                            <p> 
                                <textarea class="form-control" name="content" required {{$errors->has('content') ? 'is-invalid' : ''}}></textarea>
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{$errors->first('content')}} </strong> 
                                </span>
                            </p>
                            <button type="submit" class="btn btn-success">Enviar </button> 
                        </form>
                    </div>
                </div>
                <div class="description">
                    {{$image->description}}
                </div>
                <hr style="background:goldenrod">
                @foreach($image->comments as $comment) 
                <div class="comments">
                    <div class="container-avatar">
                        <img src="{{route('user.avatar' ,['filename'=>$image->user->image]  ) }}" class="avatar" />
                        {{ $image->user->name.' '.$image->user->surname}}
                        | Comentado faz  {{ \FormatTime::LongTimeFilter($comment->created_at) }}
                        | <a href="{{route('commnent.delete',['id'=>$comment->id]) }}"> <span style="color:rgb(158, 231, 129)"> Obliviate </span> </a>
                            <p  class="comentario_content">{{$comment->content}} </p>
                    </div>
                    <hr style="background:goldenrod">
                </div> 
                @endforeach                          
                @endif
            </div>   
        </div>

    </div> 
    
</div>

@endsection
