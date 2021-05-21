@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"  >
                    <div class="carousel-inner">
                      <div class="carousel-item active" >
                        <img src="/images/portugal/livraria_lello.jpg" class="d-block w-100" alt="..." style="opacity: 0.4;">
                        <div class="carousel-caption d-none d-md-block" style="color:black">
                          <h5>Livraria Lello - Porto</h5>
                          <p>Uma das livrarias mais maravilhosas do mundo, a Livraria Lello, inaugurada em 1906, possui arquitetura que mistura elementos dos estilos Neo-gótico, Art Deco e Art Nouveau. Muito provavelmente, foi ela que inspirou não só a livraria do Beco Diagonal, onde os Harry e outros alunos compravam seus livros de magia.</p>
                            <p>A livraria Lello, também situada em porto, possui uma escadaria lindíssima, que começa como uma só, depois abre uma bifurcação, une-se novamente e então, divide-se numa nova bifurcação. Veja nas fotos como tem muito a ver também com as escadarias de Hogwarts, que se movimentam o tempo todo..</p>
                        </div>
                      </div>
                      <div class="carousel-item" >
                        <img src="/images/portugal/universidade_coimbra.jpg" class="d-block w-100" alt="..."style="opacity: 0.4;">
                        <div class="carousel-caption d-none d-md-block" style="color:black">
                          <h5>Universidade de Coimbra</h5>
                          <p>Sabe o uniforme de Hogwarts, usados pelos estudantes bruxos e bruxas? Então, são praticamente idênticos aos utilizados pelos estudantes da Universidade de Coimbra! A universidade, que é a mais antiga em operação do mundo, mantém a tradição dos uniformes com casacos pretos, gravatas e capas há 728 anos.</p>
                        </div>
                      </div>
                      <div class="carousel-item" >
                        <img src="/images/portugal/fonte_dos_leoes.jpg" class="d-block w-100" alt="..."style="opacity: 0.4;">
                        <div class="carousel-caption d-none d-md-block" style="color:black">
                          <h5>Fonte dos Leões - Porto</h5>
                          <p>É curiosa a semelhança entre o leão da Fonte dos Leões, de Porto, com o símbolo da casa de Grinfinória, da qual faziam parte Harry Potter, Hermione Granger, Rony Wesley e boa parte dos demais amigos do bruxo. Assim como no leão do brasão dos Grynfindor, o animal da fonte também possui asas.</p>
                        </div>
                      </div>
                      <div class="carousel-item" >
                        <img src="/images/portugal/biblioteca_joanina.jpg" class="d-block w-100" alt="..."style="opacity: 0.4;">
                        <div class="carousel-caption d-none d-md-block" style="color:black">
                          <h5>Biblioteca Joanina - Universidade de Coimbra</h5>
                          <p>Harry Potter e seus amigos passaram muito tempo na Biblioteca Hogwarts estudando para provas, pesquisando sobre bruxos e descobrindo magias secretas. O estilo da biblioteca fictícia, como os muitos andares, afresco no teto, grandes janelas em arcos, acentos de madeira e as centenas de livros, lembram muito o da Biblioteca Joanina, que fica na Universidade de Coimbra. </p>
                          <p>São tantas semelhanças, que fica difícil acreditar que o local não tenha sido a fonte de inspiração para a autora.</p>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection