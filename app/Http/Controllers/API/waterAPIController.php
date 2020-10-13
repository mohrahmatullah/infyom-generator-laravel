<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatewaterAPIRequest;
use App\Http\Requests\API\UpdatewaterAPIRequest;
use App\Models\water;
use App\Repositories\waterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class waterController
 * @package App\Http\Controllers\API
 */

class waterAPIController extends AppBaseController
{
    /** @var  waterRepository */
    private $waterRepository;

    public function __construct(waterRepository $waterRepo)
    {
        $this->waterRepository = $waterRepo;
    }

    /**
     * Display a listing of the water.
     * GET|HEAD /waters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $waters = $this->waterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($waters->toArray(), 'Waters retrieved successfully');
    }

    /**
     * Store a newly created water in storage.
     * POST /waters
     *
     * @param CreatewaterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatewaterAPIRequest $request)
    {
        $input = $request->all();

        $water = $this->waterRepository->create($input);

        return $this->sendResponse($water->toArray(), 'Water saved successfully');
    }

    /**
     * Display the specified water.
     * GET|HEAD /waters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var water $water */
        $water = $this->waterRepository->find($id);

        if (empty($water)) {
            return $this->sendError('Water not found');
        }

        return $this->sendResponse($water->toArray(), 'Water retrieved successfully');
    }

    /**
     * Update the specified water in storage.
     * PUT/PATCH /waters/{id}
     *
     * @param int $id
     * @param UpdatewaterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatewaterAPIRequest $request)
    {
        $input = $request->all();

        /** @var water $water */
        $water = $this->waterRepository->find($id);

        if (empty($water)) {
            return $this->sendError('Water not found');
        }

        $water = $this->waterRepository->update($input, $id);

        return $this->sendResponse($water->toArray(), 'water updated successfully');
    }

    /**
     * Remove the specified water from storage.
     * DELETE /waters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var water $water */
        $water = $this->waterRepository->find($id);

        if (empty($water)) {
            return $this->sendError('Water not found');
        }

        $water->delete();

        return $this->sendResponse($id, 'Water deleted successfully');
    }
}
