<?php namespace Tests\Repositories;

use App\Models\Nomeacao;
use App\Repositories\NomeacaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NomeacaoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NomeacaoRepository
     */
    protected $nomeacaoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nomeacaoRepo = \App::make(NomeacaoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_nomeacao()
    {
        $nomeacao = factory(Nomeacao::class)->make()->toArray();

        $createdNomeacao = $this->nomeacaoRepo->create($nomeacao);

        $createdNomeacao = $createdNomeacao->toArray();
        $this->assertArrayHasKey('id', $createdNomeacao);
        $this->assertNotNull($createdNomeacao['id'], 'Created Nomeacao must have id specified');
        $this->assertNotNull(Nomeacao::find($createdNomeacao['id']), 'Nomeacao with given id must be in DB');
        $this->assertModelData($nomeacao, $createdNomeacao);
    }

    /**
     * @test read
     */
    public function test_read_nomeacao()
    {
        $nomeacao = factory(Nomeacao::class)->create();

        $dbNomeacao = $this->nomeacaoRepo->find($nomeacao->id);

        $dbNomeacao = $dbNomeacao->toArray();
        $this->assertModelData($nomeacao->toArray(), $dbNomeacao);
    }

    /**
     * @test update
     */
    public function test_update_nomeacao()
    {
        $nomeacao = factory(Nomeacao::class)->create();
        $fakeNomeacao = factory(Nomeacao::class)->make()->toArray();

        $updatedNomeacao = $this->nomeacaoRepo->update($fakeNomeacao, $nomeacao->id);

        $this->assertModelData($fakeNomeacao, $updatedNomeacao->toArray());
        $dbNomeacao = $this->nomeacaoRepo->find($nomeacao->id);
        $this->assertModelData($fakeNomeacao, $dbNomeacao->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_nomeacao()
    {
        $nomeacao = factory(Nomeacao::class)->create();

        $resp = $this->nomeacaoRepo->delete($nomeacao->id);

        $this->assertTrue($resp);
        $this->assertNull(Nomeacao::find($nomeacao->id), 'Nomeacao should not exist in DB');
    }
}
