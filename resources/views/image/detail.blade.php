@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 espaco">
            <div class="card" >
                @if($image->user->image)
                    <div class="container-avatar" style="background:grey">
                            <img src="{{route('user.avatar' ,['filename'=>$image->user->image]  ) }}" class="avatar" />
                            {{ $image->user->name.' '.$image->user->surname}}
                    </div>
                    <div class="card-body" style="background:black">
                        <div class="image-container">
                            <img src="{{route('image.file',['filename' => $image->image_path])}}">
                        </div>
                    </div>
                    <div class="likes">
                        <img  class ="img_like" src="{{asset('/img/heart-black.png')}}"/>
                        <a href="" class="btn btn-warning btn-comments" > Comentários({{count($image->comments)}}) </a>
                    </div>
                    <div class="description">
                        {{$image->description}}
                    </div>                            
                @endif
            </div>   
        </div>

    </div> 
    
</div>

@endsection
