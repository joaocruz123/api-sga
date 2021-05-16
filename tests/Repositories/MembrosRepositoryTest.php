<?php namespace Tests\Repositories;

use App\Models\Membros;
use App\Repositories\MembrosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MembrosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MembrosRepository
     */
    protected $membrosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->membrosRepo = \App::make(MembrosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_membros()
    {
        $membros = factory(Membros::class)->make()->toArray();

        $createdMembros = $this->membrosRepo->create($membros);

        $createdMembros = $createdMembros->toArray();
        $this->assertArrayHasKey('id', $createdMembros);
        $this->assertNotNull($createdMembros['id'], 'Created Membros must have id specified');
        $this->assertNotNull(Membros::find($createdMembros['id']), 'Membros with given id must be in DB');
        $this->assertModelData($membros, $createdMembros);
    }

    /**
     * @test read
     */
    public function test_read_membros()
    {
        $membros = factory(Membros::class)->create();

        $dbMembros = $this->membrosRepo->find($membros->id);

        $dbMembros = $dbMembros->toArray();
        $this->assertModelData($membros->toArray(), $dbMembros);
    }

    /**
     * @test update
     */
    public function test_update_membros()
    {
        $membros = factory(Membros::class)->create();
        $fakeMembros = factory(Membros::class)->make()->toArray();

        $updatedMembros = $this->membrosRepo->update($fakeMembros, $membros->id);

        $this->assertModelData($fakeMembros, $updatedMembros->toArray());
        $dbMembros = $this->membrosRepo->find($membros->id);
        $this->assertModelData($fakeMembros, $dbMembros->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_membros()
    {
        $membros = factory(Membros::class)->create();

        $resp = $this->membrosRepo->delete($membros->id);

        $this->assertTrue($resp);
        $this->assertNull(Membros::find($membros->id), 'Membros should not exist in DB');
    }
}
