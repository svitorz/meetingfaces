<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>{{config('APP_NAME','Meeting Faces')}}</title>
  @vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js'])
  <style>
    .ly {
      font-family: 'Bitter', cursive;
      font-size: large;
    }
  </style>
</head>

<body class="ly">
  <livewire:layout.navigation />
  <div id="myCarousel" class="carousel slide my-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://www.ipea.gov.br/portal/images/noticias/2022/2022-12-7_populacao_de_rua_1.jpg"
          class="bd-placeholder-img" width="100%" height="34rem" alt="" aria-hidden="true"
          preserveAspectRatio="xMidYMid slice" focusable="false">
        <div class="container">
          <div class="carousel-caption">
            <h2>População em situação de rua supera 281,4 mil pessoas no Brasil</h2>
            <p>Estimativa divulgada pelo Ipea aponta crescimento de 38% desse segmento, durante a pandemia de Covid-19
            </p>
            <p><a class="btn btn-lg btn-light" href="#" target="_blank">Leia mais</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img
          src="https://imagens.ebc.com.br/Iv3zq0M_KXC2PiXq8QI8w5r1KY0=/1170x700/smart/https://agenciabrasil.ebc.com.br/sites/default/files/thumbnails/image/pzzb2014_1.jpg?itok=7yZ6F0Wv"
          class="bd-placeholder-img" width="100%" height="550px" alt="" aria-hidden="true"
          preserveAspectRatio="xMidYMid slice" focusable="false">
        <div class="container">
          <div class="carousel-caption">
            <h2>Ipea: população em situação de rua no Brasil supera 281 mil</h2>
            <p>Em dez anos, esse segmento vulnerável cresceu 211%</p>
            <p><a class="btn btn-lg btn-light"
                href="https://agenciabrasil.ebc.com.br/direitos-humanos/noticia/2023-02/ipea-populacao-em-situacao-de-rua-no-brasil-supera-281-mil#:~:text=A%20popula%C3%A7%C3%A3o%20de%20rua%20superou"
                target="_blank">Leia mais</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img
          src="https://cdn.vox-cdn.com/thumbor/RHcuJ05WfJiv7Vgkwz0P_zB0ctM=/0x0:3782x2602/920x613/filters:focal(1800x879:2404x1483):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/67694963/canada_homeless_GettyImages_96726662.0.jpg"
          class="bd-placeholder-img" width="100%" height="550px" alt="" aria-hidden="true"
          preserveAspectRatio="xMidYMid slice" focusable="false">
        <div class="container">
          <div class="carousel-caption ">
            <h2>Um estudo canadense doou US$ 7.500 para moradores de rua</h2>
            <p>Os resultados mostram o poder das transferências monetárias na redução dos sem-abrigo.</p>
            <p><a class="btn btn-lg btn-light"
                href="https://www.vox.com/future-perfect/21528569/homeless-poverty-cash-transfer-canada-new-leaf-project"
                target="_blank">Leia mais</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <script>
    const throttle = _.throttle;
    const players =
      Array.from(document.querySelectorAll('.js-play-on-screen'));
    function isOnScreen(el) {
      let rect = el.getBoundingClientRect()
      return rect.top > 0 && rect.bottom < window.innerHeight;
    }
    function playAnimation(el) {
      if (isOnScreen(el)) el.style.animationPlayState = 'running';
    }
    const render = throttle(() => players.forEach(playAnimation), 150);
    render();
    window.addEventListener('scroll', render);
  </script>
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
