<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Nomeacao;

class NomeacaoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_nomeacao()
    {
        $nomeacao = factory(Nomeacao::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/nomeacaos', $nomeacao
        );

        $this->assertApiResponse($nomeacao);
    }

    /**
     * @test
     */
    public function test_read_nomeacao()
    {
        $nomeacao = factory(Nomeacao::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/nomeacaos/'.$nomeacao->id
        );

        $this->assertApiResponse($nomeacao->toArray());
    }

    /**
     * @test
     */
    public function test_update_nomeacao()
    {
        $nomeacao = factory(Nomeacao::class)->create();
        $editedNomeacao = factory(Nomeacao::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/nomeacaos/'.$nomeacao->id,
            $editedNomeacao
        );

        $this->assertApiResponse($editedNomeacao);
    }

    /**
     * @test
     */
    public function test_delete_nomeacao()
    {
        $nomeacao = factory(Nomeacao::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/nomeacaos/'.$nomeacao->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/nomeacaos/'.$nomeacao->id
        );

        $this->response->assertStatus(404);
    }
}
