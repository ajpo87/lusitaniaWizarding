<style>
    .container {
  position: relative;
  text-align: center;
  color: white;
}


/* Centered text */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 20px;
  font-weight: bold;
  transform: translate(-50%, -50%);
}
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if(session('message'))
            <!--<div class="card">
                <img src="/images/chapeu_selecionador.gif">
             </div>
            <div class="alert alert-sucess"> 
               
                <h2> O Chapeu-Selecionador decidiu </h2>
               
            </div>-->
            <div class="container">
                <h1> Bem-vindos a Hogwarts</h1>
                <img src="/public/images/chapeu_selecionador.gif" alt="Snow" style="width:100%;">
                <div class="centered"><span style="text-transform: uppercase; color:goldenrod"> {{session('message')}} </span> </div>
              </div>
        @endif
        </div>
    </div>
</div>
@endsection
