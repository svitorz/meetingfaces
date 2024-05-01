<?php

namespace Tests\Feature;

use App\Livewire\Morador\Create;
use App\Models\Morador;
use App\Models\User;
use App\Models\Ong;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class MoradorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Testar se um administrador pode ver o component de criação do morador
     */
    public function test_admin_can_see_component(): void
    {
        $user = User::factory()->admin()->create();
        Ong::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/moradores/create');

        $response
            ->assertOK()  
            ->assertSeeVolt('morador.create');
    }

    /**
     * Teste nos níveis de permissão com Middleware
     *   
     * */
    public function test_comum_users_canot_access_create():void
    {
        $user = User::factory()->comum()->create();

        $this->actingAs($user);

        $response = $this->get('/moradores/create');
        $response
            ->assertUnauthorized();
    }

    /**
     * teste para saber se moradores podem ser criados
     *  */
    public function test_moradores_can_be_created():void
    {
        $user = User::factory()->admin()->create();
        $ong = Ong::factory()->create();
        
        $componente = Livewire::
                    actingAs($user)
                    ->test(create::class)
                    ->set('nome_completo','Nome Teste')
                    ->set('data_nasc',date('d/M/Y',strtotime('01/01/1990')))
                    ->set('cidade_natal','Cidade teste')
                    ->set('cidade_atual','Cidade Teste')
                    ->set('nome_familiar_proximo','Nome teste')
                    ->set('grau_parentesco','Pai')
                    ->set('id_ong',$ong->id);

        $componente->call('create');

        $morador = Morador::latest('id')->first();
        
        $componente->assertRedirect("/moradores/show/$morador->id");
    }
}