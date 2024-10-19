<?php

namespace Tests\Feature\Morador;

use App\Livewire\Morador\CreateMorador;
use App\Models\Morador;
use App\Models\Ong;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
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
            ->assertSeeLivewire(CreateMorador::class);
    }

    /**
     * Teste nos níveis de permissão com Middleware
     *
     * */
    public function test_comum_users_canot_access_create(): void
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
    public function test_moradores_can_be_created(): void
    {
        $user = User::factory()->admin()->create();
        $ong = Ong::factory()->create(['id_usuario' => $user->id])->value('id');

        $authUser = Auth::loginUsingId($user);
        $componente = Livewire::actingAs($authUser)
            ->test(CreateMorador::class)
            ->set('nome_completo', 'Nome Teste')
            ->set('data_nasc', date('d/M/Y', strtotime('01/01/1990')))
            ->set('cidade_natal', 'Cidade teste')
            ->set('cidade_atual', 'Cidade Teste')
            ->set('nome_familiar_proximo', 'Nome teste')
            ->set('grau_parentesco', 'Pai')
            ->set('id_ong', $ong);

        $componente->call('create');

        $morador = Morador::latest('id')->first();

        $componente->assertStatus(200)->assertRedirect("/moradores/show/{$morador->id}");
    }

    /*
     * Teste para determinar se um morador pode ser editado
     */
    public function test_morador_can_be_editated(): void
    {
        $user = User::factory()->admin()->create()->value('id');
        $ong = Ong::factory()->create(['id_usuario' => $user])->value('id');
        $morador = Morador::factory()->create(['id_ong' => $ong])->value('id');

        $authUser = Auth::loginUsingId($user);
        $componente = Livewire::actingAs($authUser)
            ->test(CreateMorador::class, ['id' => $morador])
            ->set('nome_completo', 'Nome Update')
            ->set('data_nasc', date('d/M/Y', strtotime('01/01/1990')))
            ->set('cidade_natal', 'Cidade Update')
            ->set('cidade_atual', 'Cidade Update')
            ->set('nome_familiar_proximo', 'Nome Update')
            ->set('grau_parentesco', 'Pai')
            ->set('id_ong', $ong);

        $componente->call('update');

        $morador = Morador::latest('id')->first();

        $componente->assertRedirect("/moradores/show/$morador->id");
    }
}
