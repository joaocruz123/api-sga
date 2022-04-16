<?php namespace Tests\Repositories;

use App\Models\Nomeacoes;
use App\Repositories\NomeacoesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NomeacoesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NomeacoesRepository
     */
    protected $nomeacoesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nomeacoesRepo = \App::make(NomeacoesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_nomeacoes()
    {
        $nomeacoes = factory(Nomeacoes::class)->make()->toArray();

        $createdNomeacoes = $this->nomeacoesRepo->create($nomeacoes);

        $createdNomeacoes = $createdNomeacoes->toArray();
        $this->assertArrayHasKey('id', $createdNomeacoes);
        $this->assertNotNull($createdNomeacoes['id'], 'Created Nomeacoes must have id specified');
        $this->assertNotNull(Nomeacoes::find($createdNomeacoes['id']), 'Nomeacoes with given id must be in DB');
        $this->assertModelData($nomeacoes, $createdNomeacoes);
    }

    /**
     * @test read
     */
    public function test_read_nomeacoes()
    {
        $nomeacoes = factory(Nomeacoes::class)->create();

        $dbNomeacoes = $this->nomeacoesRepo->find($nomeacoes->id);

        $dbNomeacoes = $dbNomeacoes->toArray();
        $this->assertModelData($nomeacoes->toArray(), $dbNomeacoes);
    }

    /**
     * @test update
     */
    public function test_update_nomeacoes()
    {
        $nomeacoes = factory(Nomeacoes::class)->create();
        $fakeNomeacoes = factory(Nomeacoes::class)->make()->toArray();

        $updatedNomeacoes = $this->nomeacoesRepo->update($fakeNomeacoes, $nomeacoes->id);

        $this->assertModelData($fakeNomeacoes, $updatedNomeacoes->toArray());
        $dbNomeacoes = $this->nomeacoesRepo->find($nomeacoes->id);
        $this->assertModelData($fakeNomeacoes, $dbNomeacoes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_nomeacoes()
    {
        $nomeacoes = factory(Nomeacoes::class)->create();

        $resp = $this->nomeacoesRepo->delete($nomeacoes->id);

        $this->assertTrue($resp);
        $this->assertNull(Nomeacoes::find($nomeacoes->id), 'Nomeacoes should not exist in DB');
    }
}
