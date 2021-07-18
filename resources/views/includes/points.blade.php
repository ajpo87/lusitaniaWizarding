
<a href="">
    <div class="container">
        <div class="row justify-content-center"  style="color:white;font-weight: bold;">
        @foreach($teams as $team)
                <div class="col-sm-2 {{$team->background}}"><img src="{{$team->imagem}}" class=" mx-auto " style="height: 85px;"><span style="margin:5Px">{{$team->pontos_equipa}} Points</span></div>
        @endforeach
        </div>
    </div>
</a>