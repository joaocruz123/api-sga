<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMembrosAPIRequest;
use App\Http\Requests\API\UpdateMembrosAPIRequest;
use App\Models\Membros;
use App\Repositories\MembrosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MembrosController
 * @package App\Http\Controllers\API
 */

class MembrosAPIController extends AppBaseController
{
    /** @var  MembrosRepository */
    private $membrosRepository;

    public function __construct(MembrosRepository $membrosRepo)
    {
        $this->membrosRepository = $membrosRepo;
    }

    /**
     * Display a listing of the Membros.
     * GET|HEAD /membros
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $membros = $this->membrosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($membros->toArray(), 'Membros retrieved successfully');
    }

    /**
     * Store a newly created Membros in storage.
     * POST /membros
     *
     * @param CreateMembrosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMembrosAPIRequest $request)
    {
        $input = $request->all();

        $membros = $this->membrosRepository->create($input);

        return $this->sendResponse($membros->toArray(), 'Membros saved successfully');
    }

    /**
     * Display the specified Membros.
     * GET|HEAD /membros/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Membros $membros */
        $membros = $this->membrosRepository->find($id);

        if (empty($membros)) {
            return $this->sendError('Membros not found');
        }

        return $this->sendResponse($membros->toArray(), 'Membros retrieved successfully');
    }

    /**
     * Update the specified Membros in storage.
     * PUT/PATCH /membros/{id}
     *
     * @param int $id
     * @param UpdateMembrosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMembrosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Membros $membros */
        $membros = $this->membrosRepository->find($id);

        if (empty($membros)) {
            return $this->sendError('Membros not found');
        }

        $membros = $this->membrosRepository->update($input, $id);

        return $this->sendResponse($membros->toArray(), 'Membros updated successfully');
    }

    /**
     * Remove the specified Membros from storage.
     * DELETE /membros/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Membros $membros */
        $membros = $this->membrosRepository->find($id);

        if (empty($membros)) {
            return $this->sendError('Membros not found');
        }

        $membros->delete();

        return $this->sendSuccess('Membros deleted successfully');
    }
}
