<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCargosAPIRequest;
use App\Http\Requests\API\UpdateCargosAPIRequest;
use App\Models\Cargos;
use App\Repositories\CargosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CargosController
 * @package App\Http\Controllers\API
 */

class CargosAPIController extends AppBaseController
{
    /** @var  CargosRepository */
    private $cargosRepository;

    public function __construct(CargosRepository $cargosRepo)
    {
        $this->cargosRepository = $cargosRepo;
    }

    /**
     * Display a listing of the Cargos.
     * GET|HEAD /cargos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cargos = $this->cargosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cargos->toArray(), 'Cargos retrieved successfully');
    }

    /**
     * Store a newly created Cargos in storage.
     * POST /cargos
     *
     * @param CreateCargosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCargosAPIRequest $request)
    {
        $input = $request->all();

        $cargos = $this->cargosRepository->create($input);

        return $this->sendResponse($cargos->toArray(), 'Cargos saved successfully');
    }

    /**
     * Display the specified Cargos.
     * GET|HEAD /cargos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cargos $cargos */
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            return $this->sendError('Cargos not found');
        }

        return $this->sendResponse($cargos->toArray(), 'Cargos retrieved successfully');
    }

    /**
     * Update the specified Cargos in storage.
     * PUT/PATCH /cargos/{id}
     *
     * @param int $id
     * @param UpdateCargosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cargos $cargos */
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            return $this->sendError('Cargos not found');
        }

        $cargos = $this->cargosRepository->update($input, $id);

        return $this->sendResponse($cargos->toArray(), 'Cargos updated successfully');
    }

    /**
     * Remove the specified Cargos from storage.
     * DELETE /cargos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cargos $cargos */
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            return $this->sendError('Cargos not found');
        }

        $cargos->delete();

        return $this->sendSuccess('Cargos deleted successfully');
    }
}
