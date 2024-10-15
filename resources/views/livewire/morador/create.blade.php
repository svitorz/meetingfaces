  <div class="">
      <img class="mx-auto d-block mt-5" src="{{asset('img/logo2.png')}}" alt="dois rostos encostados" />

      <form @if ($this->editing == false) wire:submit="create"
        @else
        wire:submit="update" @endif
          method="post" class="col-12 p-5 mx-auto d-block border rounded shadow-lg bg-body-teriary mt-5"
          style="width: 62.5em;height:auto;">
          <div class="row">
              @if ($this->editing)
                  <div class="mb-3 col-6">
                      <x-text-input type="text" type="hidden" name="id_morador" value="{{ $this->id_morador }}" />
                  </div>
              @endif

              <div class="mb-3 col-6">
                  <x-input-label for="nome_completo" :value="__('Nome completo')" />
                  <x-text-input wire:model="nome_completo" id="nome_completo" class="block mt-1 w-full" type="text"
                      name="nome_completo" />
                  <x-input-error :messages="$errors->get('nome_completo')" class="mt-2" />
              </div>
              <div class="mb-3 col-6">
                  <x-input-label for="data_nasc" :value="__('Data de Nascimento')" />
                  <x-text-input wire:model="data_nasc" id="data_nasc" class="block mt-1 w-full" type="date"
                      name="data_nasc" />
                  <x-input-error :messages="$errors->get('data_nasc')" class="mt-2" />
              </div>
              <div class="mb-3 col-6">
                  <x-input-label for="cidade_atual" :value="__('Cidade Atual')" />
                  <x-text-input wire:model="cidade_atual" id="cidade_atual" class="block mt-1 w-full" type="text"
                      name="cidade_atual" />
                  <x-input-error :messages="$errors->get('cidade_atual')" class="mt-2" />
              </div>
              <div class="mb-3 col-6">
                  <x-input-label for="cidade_natal" :value="__('Cidade Natal')" />
                  <x-text-input wire:model="cidade_natal" id="cidade_natal" class="block mt-1 w-full" type="text"
                      name="cidade_natal" />
                  <x-input-error :messages="$errors->get('cidade_natal')" class="mt-2" />
              </div>
              <div class="mb-3 col-6">
                  <x-input-label for="nome_familiar_proximo" :value="__('Nome de um familiar próximo')" />
                  <x-text-input wire:model="nome_familiar_proximo" id="nome_familiar_proximo" class="block mt-1 w-full"
                      type="text" name="nome_familiar_proximo" />
                  <x-input-error :messages="$errors->get('nome_familiar_proximo')" class="mt-2" />
              </div>
              <div class="mb-3 col-6">
                  <x-input-label for="grau_parentesco" :value="__('Grau de parentesco')" />
                  <select wire:model="grau_parentesco" id="grau_parentesco" class="block mt-1 w-full"
                      name="grau_parentesco">
                      <option selected>Selecione uma opção</option>
                      <option value="Pai">Pai</option>
                      <option value="Mãe">Mãe</option>
                      <option value="Irmão">Irmão</option>
                      <option value="Tio(a)">Tio(a)</option>
                      <option value="Avô(ó)">Avô(ó)</option>
                      <option value="Primo(a)">Primo(a)</option>
                      <option value="Filho(a)">Filho(a)</option>
                      <option value="Sobrinho(a)">Sobrinho(a)</option>
                      <option value="Outros">Outros</option>

                  </select>
                  <x-input-error :messages="$errors->get('grau_parentesco')" class="mt-2" />
              </div>
              <div class="col-12">
                <x-input-label for="profile_picture" :value="__('Foto para perfil')" />
                    <x-text-input wire:model="profile_picture" id="profile_picture" class="block mt-1 w-full" type="file"
                      name="profile_picture" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                <x-input-error :messages="$errors->get('cidade_atual')" class="mt-2" />
                    <div wire:loading wire:target="photo" class="text-sm text-gray-500 italic">Uploading...</div>
              </div>
              <button type="submit" class="mt-3 btn btn-outline-dark mx-auto d-block col-5">
                  @if ($this->editing == false)
                      Cadastrar
                  @else
                      Salvar
                  @endif
              </button>
          </div>

      </form>
  </div>
