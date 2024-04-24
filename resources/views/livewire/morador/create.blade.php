<form wire:submit="create" method="post" class="p-10 m-10">
    <div>
        <x-input-label for="nome_completo" :value="__('Nome completo')"/>
        <x-text-input wire:model="nome_completo" id="nome_completo" class="block mt-1 w-full" type="text" name="nome_completo" />
        <x-input-error :messages="$errors->get('nome_completo')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="data_nasc" :value="__('Data de Nascimento')"/>
        <x-text-input wire:model="data_nasc" id="data_nasc" class="block mt-1 w-full" type="date" name="data_nasc" />
        <x-input-error :messages="$errors->get('data_nasc')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="cidade_atual" :value="__('Cidade Atual')"/>
        <x-text-input wire:model="cidade_atual" id="cidade_atual" class="block mt-1 w-full" type="text" name="cidade_atual" />
        <x-input-error :messages="$errors->get('cidade_atual')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="cidade_natal" :value="__('Cidade Natal')"/>
        <x-text-input wire:model="cidade_natal" id="cidade_natal" class="block mt-1 w-full" type="text" name="cidade_natal" />
        <x-input-error :messages="$errors->get('cidade_natal')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="nome_familiar_proximo" :value="__('Nome de um familiar próximo')"/>
        <x-text-input wire:model="nome_familiar_proximo" id="nome_familiar_proximo" class="block mt-1 w-full" type="text" name="nome_familiar_proximo" />
        <x-input-error :messages="$errors->get('nome_familiar_proximo')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="grau_parentesco" :value="__('Grau de parentesco')"/>
        <select wire:model="grau_parentesco" id="grau_parentesco" class="block mt-1 w-full" name="grau_parentesco">
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
    <x-primary-button type="submit" class="mt-4">
        Cadastrar
    </x-primary-button>
</form>