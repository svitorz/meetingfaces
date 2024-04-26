<!-- component -->
<body class="bg-gray-100">
  <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-5">
    <img class="w-32 h-32 rounded-full mx-auto" src="" alt="Profile picture">
    <h2 class="text-center text-2xl font-semibold mt-3">{{$morador->nome_completo}}</h2>
    <p class="text-center text-gray-600 mt-1">Lorem</p>
    <div class="flex justify-center mt-5">
      <p class="text-gray-500 hover:text-gray-700 mx-3">Cidade atual: {{$morador->cidade_atual}}</a>
      <p class="text-gray-500 hover:text-gray-700 mx-3">Cidade natal: {{$morador->cidade_natal}}</a>
      <p class="text-gray-500 hover:text-gray-700 mx-3">Nome de um familiar e grau de parentesco: {{$morador->nome_familiar_proximo}}, {{$morador->grau_parentesco}}</p>
    </div>
    <div class="mt-5">
      <h3 class="text-xl font-semibold">Bio</h3>
      <p class="text-gray-600 mt-2">John is a software engineer with over 10 years of experience in developing web and mobile applications. He is skilled in JavaScript, React, and Node.js.</p>
    </div>
  </div>
</body>