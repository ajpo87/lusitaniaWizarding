@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="profile-user">
				@if($user->image)
					<div class="container-avatar">
						<img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" />
					</div>
				@endif
				<div class="user-info">
					<h2>{{$user->name }}</h2>
					<p>{{'Registado desde: '.\FormatTime::LongTimeFilter($user->created_at)}}</p>
				</div>
				
				<div class="clearfix"></div>
				<hr>
			</div>	
			<div class="clearfix"></div>	
            @foreach($user->images as $image)
            <div class="col-md-8 espaco">
                <div class="card" >
                        <div class="container-avatar" style="background:grey">
                            <a href="{{route('user.profile',['id'=>$image->user->id]) }}" ><img src="{{route('user.avatar' ,['filename'=>$image->user->image]  ) }}" class="avatar" />
                                {{ $image->user->name.' '.$image->user->surname}}
                            </a>
                            | Publicada  {{ \FormatTime::LongTimeFilter($image->created_at) }}
    
                        </div>
                        <div class="card-body" style="background:black">
                            <div class="image-container">
                               <a href="{{route('image.detail', ['id'=>$image->id]) }}" >  <img src="{{route('image.file',['filename' => $image->image_path])}}"></a>
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
                        </div>
                        <div class="description">
                            {{$image->description}}
                        </div>
                </div>   
            </div>
            @endforeach 
        </div>
    </div>
</div>
@endsection