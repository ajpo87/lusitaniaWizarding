@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 espaco">
            <h1> As minhas imagens Favoritas</h1>
            @foreach ($likes as $like)
            <div class="container-avatar" style="background:grey">
                <img src="{{route('user.avatar' ,['filename'=>$like->image->user->image]  ) }}" class="avatar" />
                {{ $like->image->user->name.' '.$like->image->user->surname}}
                | Publicada  {{ \FormatTime::LongTimeFilter($like->image->created_at) }}

        </div>
            <div class="card-body" style="background:black">
                <div class="image-container">
                   <a href="{{route('image.detail', ['id'=>$like->image_id]) }}" >  <img src="{{route('image.file',['filename' => $like->image->image_path])}}"></a>
                </div>
            </div>
        
                <hr>
            @endforeach
        </div>
    </div>      
</div>

@endsection
