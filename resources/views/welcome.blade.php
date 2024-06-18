<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <title>{{config('APP_NAME','Meeting Faces')}}</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    .ly {
      font-family: 'Bitter', cursive;
      font-size: large;
    }

    .bloco:hover {
      background-color: gray;
      color: white;
    }

    .ti {
      transform: translate(-50px, 0px);
      transition: .3s all ease;
    }
    
  </style>
</head> 
<body class="ly">
  <livewire:layout.navigation />

  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://www.ipea.gov.br/portal/images/noticias/2022/2022-12-7_populacao_de_rua_1.jpg"
          class="bd-placeholder-img" width="100%" height="550px" alt="" aria-hidden="true"
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
  <div class=" mt-3 bg-white p-5 text-dark " style=" height: 100%; width:100%">
    <h2 class="animate__animated animate__slideInLeft   mt-5 text-center">
      O que é o Meeting Faces?
    </h2>

    <div class=" mt-3  mx-auto d-block" style="width: 850px;">
      <p class="animate__animated animate__slideInRight fs-5 text-center mt-5 ">O Meeting Faces é um sistema tem como
        objetivo principal <b> criar uma conexão entre moradores de rua e
          seus familiares. </b> Isso deve-se por uma aplicação de busca que se dá dentro do banco de dados que o sistema
        terá
        e que possibilitará o usuário realizar pesquisas da pessoas que se encontram em situação de rua
        através de filtros. Ademais, o projeto possui outros objetivos, como tornar esse problema social <b> mais
          visível </b>,
        fazendo com que mais pessoas contribuam para essa causa <b> realizando doações </b>.</p>
    </div>
  </div>



  <div class=" d-flex justify-content-around bg-white align-items-center" style="height: 400px">
    <div class=" float-start bg-white border bg-white w-25 rounded text-center p-2" style="height: 300px;">
      <h3>Sobre nós</h3>
      <img class="p-3" style="width: 200px; height: 170px;" src="{{asset('img/logo2.png')}}" alt="Meeting Faces">
      <br>
      <br>

      <a href="sobre-nos.php" class=" btn btn-outline-dark border border-dark me-2 py-2 px-4">
        Leia mais
      </a>
    </div>

    <div class="bloco float-end bg-white border bg-white w-25 rounded text-center p-2 " style="height: 300px;">
      <h3>ONG, some a nós</h3>
      <img class="p-3" style="width: 150px; height: 170px;" src="{{asset('img/trabalho-em-equipe.png')}}"
        alt="4 mãos: uma segurando a outra formando o ciclo">
      <br>
      <br>
      <a href="some-nos.php" class="btn btn-outline-dark border border-dark me-2 py-2 px-4">
        Leia mais
      </a>
    </div>

    <div class=" float-end bg-white border bg-white w-25 rounded text-center p-2 " style="height: 300px;"">
      <h3> Doe às Instituições</h3>
      <img class=" p-3" style="width: 150px; height: 170px;" src="{{asset('img/coracao-de-maos-dadas.png')}}"
      alt="uma mão recebendo um coração ">
      <br>
      <br>
      <a href="doacao.php" class="btn btn-outline-dark border border-dark me-2 py-2 px-4">
        Leia mais
      </a>
    </div>
  </div>
</body>
</html>