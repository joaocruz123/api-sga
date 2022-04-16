<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Nomeacoes;

class NomeacoesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_nomeacoes()
    {
        $nomeacoes = factory(Nomeacoes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/nomeacoes', $nomeacoes
        );

        $this->assertApiResponse($nomeacoes);
    }

    /**
     * @test
     */
    public function test_read_nomeacoes()
    {
        $nomeacoes = factory(Nomeacoes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/nomeacoes/'.$nomeacoes->id
        );

        $this->assertApiResponse($nomeacoes->toArray());
    }

    /**
     * @test
     */
    public function test_update_nomeacoes()
    {
        $nomeacoes = factory(Nomeacoes::class)->create();
        $editedNomeacoes = factory(Nomeacoes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/nomeacoes/'.$nomeacoes->id,
            $editedNomeacoes
        );

        $this->assertApiResponse($editedNomeacoes);
    }

    /**
     * @test
     */
    public function test_delete_nomeacoes()
    {
        $nomeacoes = factory(Nomeacoes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/nomeacoes/'.$nomeacoes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/nomeacoes/'.$nomeacoes->id
        );

        $this->response->assertStatus(404);
    }
}
