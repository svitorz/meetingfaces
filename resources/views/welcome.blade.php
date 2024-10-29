<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
  <title>{{config('APP_NAME','Meeting Faces')}}</title>
  @vite([
            'resources/sass/app.scss',
            'resources/css/app.css',
            'resources/js/app.js',
        ])
  <style>
    .ly {
      font-family: 'Bitter', cursive;
      font-size: large;
    }
  </style>
</head>

<body class="ly">
  <livewire:layout.navigation />
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="{{ asset('img/man_in_brazil.jpg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>População em situação de rua supera 281,4 mil pessoas no Brasil</h2>
                <p>Estimativa divulgada pelo Ipea aponta crescimento de 38% desse segmento, durante a pandemia de Covid-19
            </div>
    </div>
    <div class="carousel-item">
        <img src="{{ asset('img/homeless.webp')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Ipea: população em situação de rua no Brasil supera 281 mil</h2>
                <p>Em dez anos, esse segmento vulnerável cresceu 211%</p>
            </div>
    </div>
    <div class="carousel-item">
       <img src="{{asset('img/canada_homeless.webp')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Um estudo canadense doou US$ 7.500 para moradores de rua</h2>
                <p>Os resultados mostram o poder das transferências monetárias na redução dos sem-abrigo.</p>
            </div>
    </div>
    </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
  <div class="container-fluidbg-white text-dark p-5 mt-3 ">
    <h2 class="animate__animated animate__slideInLeft mt-5 text-center">
      O que é o Meeting Faces?
    </h2>

    <div class="mt-3 mx-auto d-block container-fluid">
      <p class="animate__animated animate__slideInRight fs-5 text-center mt-5 ">
        O Meeting Faces é um sistema tem como objetivo principal <strong> criar uma conexão entre moradores de rua e
          seus familiares.
        </strong> Isso deve-se por uma aplicação de busca que se dá dentro do banco de dados que o sistema terá
        e que possibilitará o usuário realizar pesquisas da pessoas que se encontram em situação de rua através de
        filtros. Ademais, o projeto possui outros objetivos, como tornar esse problema social
        <strong> mais visível
        </strong>,
        fazendo com que mais pessoas contribuam para essa causa <strong> realizando doações </strong>.
      </p>
    </div>
  </div>
  <div class="container-fluid flex justify-content-center align-items-center ">
    <div class="row gx-6">
      <div class="col-lg-4 col-md-12 mx-auto">
        <div class="card" style="width: 18rem;">
          <h3 class="card-title text-center pb-3">Sobre nós</h3>
          <img class="card-img-top img-fluid " src="{{asset('img/logo2.png')}}" alt="Logo do projeto Meeting Faces" />
          <a href="{{route('sobre_nos')}}" class="btn btn-outline-dark border border-dark me-2 py-2 px-4">
            Leia mais
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-12 mx-auto">
        <div class="card" style="width: 18rem;">
          <h3 class="card-title text-center pb-3">ONG, some a nós</h3>
          <img class="card-img-top img-fluid " src="{{asset('img/trabalho-em-equipe.png')}}"
            alt="4 mãos: uma segurando a outra formando o ciclo" />
          <a href="{{ route('some_nos')}}" class="btn btn-outline-dark border border-dark me-2 py-2 px-4">
            Leia mais
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-12 mx-auto">
        <div class="card" style="width: 18rem;">
          <h3 class="card-title text-center pb-3">Doe às Instituições</h3>
          <img class="card-img-top img-fluid " src="{{asset('img/coracao-de-maos-dadas.png')}}"
            alt="uma mão recebendo um coração" />
          <a href="{{route('ongs.doacao')}}" class="btn btn-outline-dark border border-dark me-2 py-2 px-4">
            Leia mais
          </a>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="flex justify-content-center align-items-center">
      <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024</p>

      <a href="/"
        class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap" />
        </svg>
      </a>
      <ul class="nav col-md-3  justify-content-end">
        <li class="nav-item"><a href="{{ route('welcome') }}" class="nav-link px-2 text-body-secondary">Início</a></li>
        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link px-2 text-body-secondary">Encontros</a>
        </li>
        <li class="nav-item"><a href="{{ route('ongs.doacao') }}" class="nav-link px-2 text-body-secondary">Doações</a>
        </li>
        <li class="nav-item"><a href="{{ route('sobre_nos') }}" class="nav-link px-2 text-body-secondary">Sobre nós</a>
        </li>
        <li class="nav-item"><a href="{{ route('some_nos') }}" class="nav-link px-2 text-body-secondary">Some a nós</a>
        </li>
      </ul>
    </div>
  </footer>
</body>

</html>
