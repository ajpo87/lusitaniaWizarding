@extends('layouts.app')

@section('content')
<div class="container">
<!-- TO DO TEAM POINTS
        <div class="row">
          <div class="col bg-success">.col-3</div>
          <div class="col bg-warning">.col-3</div>
          <div class="col bg-success">.col-3</div>
          <div class="col bg-warning">.col-3</div>
          <div class="col bg-success">.col-3</div>
        </div>
    -->
    <div class="row justify-content-center">
        @foreach($images  as $image)
        <div class="col-md-8 espaco">
            <div class="card" >
                @if($image->user->image)
                    <div class="container-avatar" style="background:#1c1c29">
                        <a href="{{route('user.profile',['id'=>$image->user->id]) }}" ><img src="{{route('user.avatar' ,['filename'=>$image->user->image]  ) }}" class="avatar" />
                            {{ $image->user->name.' '.$image->user->surname}}
                        </a>
                        | Publicada  {{ \FormatTime::LongTimeFilter($image->created_at) }}

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
                        <a href="{{route('image.detail', ['id'=>$image->id]) }}" class="btn btn-warning btn-comments">Comentários({{count($image->comments)}})</a>
                      
                    </div>
                   
                                     
                @endif
            </div>   
        </div>
        @endforeach 
    </div> 
    <div class="clearfix"></div>
    <div class="row justify-content-center" style = "margin-top:15px;">
        {{$images->links()}} 
    </div>
</div>

@endsection
