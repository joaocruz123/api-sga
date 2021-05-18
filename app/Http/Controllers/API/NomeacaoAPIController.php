<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNomeacaoAPIRequest;
use App\Http\Requests\API\UpdateNomeacaoAPIRequest;
use App\Models\Nomeacao;
use App\Repositories\NomeacaoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NomeacaoController
 * @package App\Http\Controllers\API
 */

class NomeacaoAPIController extends AppBaseController
{
    /** @var  NomeacaoRepository */
    private $nomeacaoRepository;

    public function __construct(NomeacaoRepository $nomeacaoRepo)
    {
        $this->nomeacaoRepository = $nomeacaoRepo;
    }

    /**
     * Display a listing of the Nomeacao.
     * GET|HEAD /nomeacaos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $nomeacaos = $this->nomeacaoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($nomeacaos->toArray(), 'Nomeacaos retrieved successfully');
    }

    /**
     * Store a newly created Nomeacao in storage.
     * POST /nomeacaos
     *
     * @param CreateNomeacaoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNomeacaoAPIRequest $request)
    {
        $input = $request->all();

        $nomeacao = $this->nomeacaoRepository->create($input);

        return $this->sendResponse($nomeacao->toArray(), 'Nomeacao saved successfully');
    }

    /**
     * Display the specified Nomeacao.
     * GET|HEAD /nomeacaos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Nomeacao $nomeacao */
        $nomeacao = $this->nomeacaoRepository->find($id);

        if (empty($nomeacao)) {
            return $this->sendError('Nomeacao not found');
        }

        return $this->sendResponse($nomeacao->toArray(), 'Nomeacao retrieved successfully');
    }

    /**
     * Update the specified Nomeacao in storage.
     * PUT/PATCH /nomeacaos/{id}
     *
     * @param int $id
     * @param UpdateNomeacaoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNomeacaoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Nomeacao $nomeacao */
        $nomeacao = $this->nomeacaoRepository->find($id);

        if (empty($nomeacao)) {
            return $this->sendError('Nomeacao not found');
        }

        $nomeacao = $this->nomeacaoRepository->update($input, $id);

        return $this->sendResponse($nomeacao->toArray(), 'Nomeacao updated successfully');
    }

    /**
     * Remove the specified Nomeacao from storage.
     * DELETE /nomeacaos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Nomeacao $nomeacao */
        $nomeacao = $this->nomeacaoRepository->find($id);

        if (empty($nomeacao)) {
            return $this->sendError('Nomeacao not found');
        }

        $nomeacao->delete();

        return $this->sendSuccess('Nomeacao deleted successfully');
    }
}
