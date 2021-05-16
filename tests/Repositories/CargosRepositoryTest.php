<?php namespace Tests\Repositories;

use App\Models\Cargos;
use App\Repositories\CargosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CargosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CargosRepository
     */
    protected $cargosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cargosRepo = \App::make(CargosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cargos()
    {
        $cargos = factory(Cargos::class)->make()->toArray();

        $createdCargos = $this->cargosRepo->create($cargos);

        $createdCargos = $createdCargos->toArray();
        $this->assertArrayHasKey('id', $createdCargos);
        $this->assertNotNull($createdCargos['id'], 'Created Cargos must have id specified');
        $this->assertNotNull(Cargos::find($createdCargos['id']), 'Cargos with given id must be in DB');
        $this->assertModelData($cargos, $createdCargos);
    }

    /**
     * @test read
     */
    public function test_read_cargos()
    {
        $cargos = factory(Cargos::class)->create();

        $dbCargos = $this->cargosRepo->find($cargos->id);

        $dbCargos = $dbCargos->toArray();
        $this->assertModelData($cargos->toArray(), $dbCargos);
    }

    /**
     * @test update
     */
    public function test_update_cargos()
    {
        $cargos = factory(Cargos::class)->create();
        $fakeCargos = factory(Cargos::class)->make()->toArray();

        $updatedCargos = $this->cargosRepo->update($fakeCargos, $cargos->id);

        $this->assertModelData($fakeCargos, $updatedCargos->toArray());
        $dbCargos = $this->cargosRepo->find($cargos->id);
        $this->assertModelData($fakeCargos, $dbCargos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cargos()
    {
        $cargos = factory(Cargos::class)->create();

        $resp = $this->cargosRepo->delete($cargos->id);

        $this->assertTrue($resp);
        $this->assertNull(Cargos::find($cargos->id), 'Cargos should not exist in DB');
    }
}
