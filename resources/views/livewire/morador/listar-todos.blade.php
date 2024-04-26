<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th>Nome</th>
                <th>Cidade Atual</th>
                <th>Cidade Natal</th>
                <th>Nome familiar proximo</th>
                <th>Grau parentesco</th>
                <th>Data de nascimento</th>
            </tr>
        </thead>
  <tbody>
    @foreach($moradores as $morador)
    <tr class="bg-white border-b">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
            <a href="{{route('morador.show',['id'=>$morador->id])}}" class="hover:text-cyan-700">
                {{$morador->nome_completo}}
            </a>
            </th>
            <td>{{$morador->cidade_atual}}</td>
            <td>{{$morador->cidade_natal}}</td>
            <td>{{$morador->nome_familiar_proximo}}</td>
            <td>{{$morador->grau_parentesco}}</td>
            <td>{{$morador->data_nasc}}</td>
        </tr>
    @endforeach
  </tbody>
    </table>
</div>