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
                    <div class="container-avatar" style="background:#1c1c29">
                        <a href="{{route('user.profile',['id'=>$image->user->id]) }}" >
                            <img src="{{route('user.avatar' ,['filename'=>$image->user->image]  ) }}" class="avatar" />
                                {{ $image->user->name.' '.$image->user->surname}}
                        </a>       
                            | Publicada  {{ \FormatTime::LongTimeFilter($image->created_at) }}
                            @if(Auth::user() && Auth::user()->id == $image->user->id)
                            <div class="actions">
                                <a href="{{ route('image.edit', ['id' => $image->id]) }}" class="btn btn-sm btn-primary">Actualizar</a>
                                <!--<a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-sm btn-danger">Borrar</a>-->

                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                                    Eliminar
                                </button>

                                <!-- The Modal -->
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">¿Estas seguro?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Si eliminar esta imagen nunca podrás recuperarla, ¿estas seguro de querer borrarla?
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                                <a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-danger">Borrar definitivamente</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
					    @endif    

                    </div>
                    <div class="card-body" style="background:#1c1c29">
                        <div class="image-container">
                           <a href="{{route('image.detail', ['id'=>$image->id]) }}" >  <img class="img-fluid mx-auto d-block" src="{{route('image.file',['filename' => $image->image_path])}}"></a>
                        </div>
                        {{$image->description}}
                    </div>
                    <div class="likes">
                            <?php 
                                $user_like = false;
                            ?>
                            @foreach($image->likes as $like)
                                @if($like->image->user->id == Auth::user()->id)
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
                <hr style="background:goldenrod">
                @foreach($image->comments as $comment) 
                <div class="comments" style=" border-bottom: 2px solid goldenrod;">
                    <div class="container-avatar">
                        <a href="{{route('user.profile',['id'=>$comment->user->id]) }}" ><img src="{{route('user.avatar' ,['filename'=>$comment->user->image]  ) }}" class="avatar" />
                            {{ $comment->user->name.' '.$comment->user->surname}}
                        </a>    
                        | Comentado faz  {{ \FormatTime::LongTimeFilter($comment->created_at) }}
                        | <a href="{{route('commnent.delete',['id'=>$comment->id]) }}"> <span style="color:rgb(158, 231, 129)"> Obliviate </span> </a>
                            <p  class="comentario_content">{{$comment->content}} </p>
                    </div>
                </div> 
                @endforeach                          
                @endif
            </div>   
        </div>
    </div> 
    
</div>

@endsection
