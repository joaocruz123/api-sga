<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cargos;

class CargosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cargos()
    {
        $cargos = factory(Cargos::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cargos', $cargos
        );

        $this->assertApiResponse($cargos);
    }

    /**
     * @test
     */
    public function test_read_cargos()
    {
        $cargos = factory(Cargos::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/cargos/'.$cargos->id
        );

        $this->assertApiResponse($cargos->toArray());
    }

    /**
     * @test
     */
    public function test_update_cargos()
    {
        $cargos = factory(Cargos::class)->create();
        $editedCargos = factory(Cargos::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cargos/'.$cargos->id,
            $editedCargos
        );

        $this->assertApiResponse($editedCargos);
    }

    /**
     * @test
     */
    public function test_delete_cargos()
    {
        $cargos = factory(Cargos::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cargos/'.$cargos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cargos/'.$cargos->id
        );

        $this->response->assertStatus(404);
    }
}
