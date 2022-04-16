<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNomeacoesAPIRequest;
use App\Http\Requests\API\UpdateNomeacoesAPIRequest;
use App\Models\Nomeacoes;
use App\Repositories\NomeacoesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NomeacoesController
 * @package App\Http\Controllers\API
 */

class NomeacoesAPIController extends AppBaseController
{
    /** @var  NomeacoesRepository */
    private $nomeacoesRepository;

    public function __construct(NomeacoesRepository $nomeacoesRepo)
    {
        $this->nomeacoesRepository = $nomeacoesRepo;
    }

    /**
     * Display a listing of the Nomeacoes.
     * GET|HEAD /nomeacoes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $nomeacoes = $this->nomeacoesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($nomeacoes->toArray(), 'Nomeacoes retrieved successfully');
    }

    /**
     * Store a newly created Nomeacoes in storage.
     * POST /nomeacoes
     *
     * @param CreateNomeacoesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNomeacoesAPIRequest $request)
    {
        $input = $request->all();

        $nomeacoes = $this->nomeacoesRepository->create($input);

        return $this->sendResponse($nomeacoes->toArray(), 'Nomeacoes saved successfully');
    }

    /**
     * Display the specified Nomeacoes.
     * GET|HEAD /nomeacoes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Nomeacoes $nomeacoes */
        $nomeacoes = $this->nomeacoesRepository->find($id);

        if (empty($nomeacoes)) {
            return $this->sendError('Nomeacoes not found');
        }

        return $this->sendResponse($nomeacoes->toArray(), 'Nomeacoes retrieved successfully');
    }

    /**
     * Update the specified Nomeacoes in storage.
     * PUT/PATCH /nomeacoes/{id}
     *
     * @param int $id
     * @param UpdateNomeacoesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNomeacoesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Nomeacoes $nomeacoes */
        $nomeacoes = $this->nomeacoesRepository->find($id);

        if (empty($nomeacoes)) {
            return $this->sendError('Nomeacoes not found');
        }

        $nomeacoes = $this->nomeacoesRepository->update($input, $id);

        return $this->sendResponse($nomeacoes->toArray(), 'Nomeacoes updated successfully');
    }

    /**
     * Remove the specified Nomeacoes from storage.
     * DELETE /nomeacoes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Nomeacoes $nomeacoes */
        $nomeacoes = $this->nomeacoesRepository->find($id);

        if (empty($nomeacoes)) {
            return $this->sendError('Nomeacoes not found');
        }

        $nomeacoes->delete();

        return $this->sendSuccess('Nomeacoes deleted successfully');
    }
}
