<div class="container-fluid p-10 m-10" wire:ignore>
<x-auth-session-status class="mb-4" :status="session('status')" />
     <form x-data="{ formStep: 1 }" class="space-y-2" wire:submit="create">
        <div x-cloak x-show="formStep === 1">
            <div>
                <x-input-label for="nome_completo" :value="__('Nome completo')"/>
                <x-text-input wire:model="nome_completo" id="nome_completo" class="block mt-1 w-full" type="text" name="nome_completo" required />
                <x-input-error :messages="$errors->get('nome_completo')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="sigla" :value="__('Sigla')"/>
                <x-text-input wire:model="sigla" id="sigla" class="block mt-1 w-full" type="text" name="sigla" required />
                <x-input-error :messages="$errors->get('sigla')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="data_fundacao" :value="__('Data de fundação')"/>
                <x-text-input wire:model="data_fundacao" id="data_fundacao" class="block mt-1 w-full" type="date" name="data_fundacao" required />
                <x-input-error :messages="$errors->get('data_fundacao')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="parcerias" :value="__('Parcerias')"/>
                <textarea name="parcerias" id="parcerias" class="block mt-1 w-full" wire:model="parcerias"></textarea>
                <x-input-error :messages="$errors->get('parcerias')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="tipo_organizacao" :value="__('Tipo de organização')"/>
                <select name="tipo_organizacao" id="tipo_organizacao" wire:model="tipo_organizacao">
                    <option selected>Selecione um tipo</option>
                    <option value="ONG">Ong</option>
                    <option value="Instituição">Instituição</option>
                </select>
                <x-input-error :messages="$errors->get('tipo_organizacao')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="descricao" :value="__('Descrição')"/>
                <textarea wire:model="descricao" name="descricao" id="descricao" class="block mt-1 w-full" required></textarea>
                <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
            </div>
        </div>
        <div x-cloak x-show="formStep === 2">
            <div>
                <x-input-label for="cnpj" :value="__('Cnpj')"/>
                <x-text-input wire:model="cnpj" id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" x-mask="99.999.999/9999-99" required />
                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="telefone" :value="__('Telefone')"/>
                <x-text-input wire:model="telefone" id="telefone" class="block mt-1 w-full" type="text" x-mask="(99)99999-9999" name="telefone" required />
                <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="url" :value="__('Url do site (se houver)')"/>
                <x-text-input wire:model="url" id="url" class="block mt-1 w-full" type="url" name="url" />
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>
        </div>
        <div x-cloak x-show="formStep === 3">
            <div>
                <x-input-label for="cep" :value="__('Cep')"/>
                <x-text-input wire:model="cep" id="cep" class="block mt-1 w-full" type="text" x-mask="99999-999" name="cep" />
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="numero" :value="__('Número')"/>
                <x-text-input wire:model="numero" id="numero" class="block mt-1 w-full" type="text" name="numero" />
                <x-input-error :messages="$errors->get('numero')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="rua" :value="__('Rua')"/>
                <x-text-input wire:model="rua" id="rua" class="block mt-1 w-full" type="text" name="rua" />
                <x-input-error :messages="$errors->get('rua')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="cidade" :value="__('Cidade')"/>
                <x-text-input wire:model="cidade" id="cidade" class="block mt-1 w-full" type="text" name="cidade" />
                <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
            </div>
            <!-- FIXME: Verificar para que serve esse id_usuario -->
            <input type="hidden" name="id_usuario" value="">
            <div>
                <x-input-label for="bairro" :value="__('Bairro')"/>
                <x-text-input wire:model="bairro" id="bairro" class="block mt-1 w-full" type="text" name="bairro" />
                <x-input-error :messages="$errors->get('bairro')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="estado" :value="__('Estado')"/>
                <x-text-input wire:model="estado" id="estado" class="block mt-1 w-full" type="text" name="estado" />
                <x-input-error :messages="$errors->get('estado')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="pais" :value="__('Pais')"/>
                <x-text-input wire:model="pais" id="pais" class="block mt-1 w-full" type="text" name="pais" />
                <x-input-error :messages="$errors->get('pais')" class="mt-2" />
            </div>
        </div>
        <button x-cloak x-show="formStep > 1" @click="formStep -= 1" type="button" class="bg-yellow-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
            Voltar
        </button>   
        <button x-cloak x-show="formStep < 3" @click="formStep += 1" type="button" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
            Próximo passo
        </button>
        <button x-cloak x-show="formStep>2" type="submit" class="bg-green-700 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
            Enviar
        </button>
    </form>
</div>