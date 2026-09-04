<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnterpriseRequest;
use App\Http\Requests\UpdateEnterpriseRequest;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 5);
        $page = $request->query('page', 0);
        $offset = $page * $perPage;

        $enterprises = Enterprise::skip($offset)->take($perPage)->get();

        return $this->successResponse($enterprises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnterpriseRequest $request)
    {
        $enterprise = Enterprise::create($request->validated());

        return $this->successResponse($enterprise, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Enterprise $enterprise)
    {
        return $this->successResponse($enterprise);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnterpriseRequest $request, Enterprise $enterprise)
    {
        $enterprise->update($request->validated());

        return $this->successResponse($enterprise);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enterprise $enterprise)
    {
        $enterprise->delete();

        return $this->successResponse([], Response::HTTP_NO_CONTENT);
    }
}
