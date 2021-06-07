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
            <div class="card" style="background:black">
                @if($image->user->image)
                    <div class="container-avatar">
                            <img src="{{route('user.avatar' ,['filename'=>$image->user->image]  ) }}" class="avatar" />
                            {{ $image->user->name.' '.$image->user->surname}}
                    </div>
                    <div class="card-body">
                        <div class="image-container">
                            <img src="{{route('image.file',['filename' => $image->image_path])}}">
                        </div>
                    </div>
                    <div class="likes">

                    </div>
                    <div class="description">
                        {{$image->description}}
                    </div>

                   
                @endif
            </div>
                    
         
        </div>
        @endforeach
    </div>
</div>
@endsection
